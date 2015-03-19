<?php

class AppRestController extends WRestController
{

    use RestApiControllerTrait;

    /**
     * @inheritdoc
     */
    public function filters()
    {
        return array_merge(
            parent::filters(),
            array(
                'accessControl',
                array(
                    'application.filters.ContentNegotiator',
                    'languages' => LanguageHelper::getCodes(),
                ),
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function accessRules()
    {
        return array(
            // Not logged in users can do the following actions.
            array(
                'allow',
                'actions' => array(
                    'preflight',
                    'get',
                    'list',
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything.
            array('deny', 'users' => array('*')),
        );
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        ini_set('html_errors', 0);
        $this->_responseFormat = 'json';
        return parent::init();
    }

    public function loadModel($id)
    {
        if (is_int($id) || ctype_digit($id)) {
            $model = CActiveRecord::model($this->_modelName)->findByPk($id);
        } else {
            $language = $this->request->getParam('lang', Yii::app()->getLanguage());
            $attribute = "slug_{$language}";
            $finder = CActiveRecord::model($this->_modelName);
            if ($finder->hasAttribute($attribute)) {
                // the slugs are prefixed by a ":" character, due to url rule collisions
                $slug = ltrim($id, ':');
                $model = $finder->findByattributes(array($attribute => $slug));
            } else {
                $model = null;
            }
        }
        if ($model === null) {
            $this->sendResponse(404);
        }
        return $model;
    }

    /**
     * @inheritdoc
     */
    public function getModel($scenario = '')
    {
        $id = $this->request->getParam('id');
        $modelName = ucfirst($this->_modelName);
        if (empty($this->_modelName) && class_exists($modelName)) {
            $this->sendResponse(400);
        }
        if ($id) {
            $model = $this->loadModel($id);
        } else {
            $model = new $modelName();
        }
        if ($scenario && $model) {
            $model->setScenario($scenario);
        }
        return $model;
    }

    /**
     * @inheritdoc
     */
    public function sendResponse($status = 200, $bodyParams = array(), $options = array())
    {
        $contentLanguage = Yii::app()->language;
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept");
        header("Content-Language: $contentLanguage");
        return parent::sendResponse($status, $bodyParams, $options);
    }

    public function runDefaultWrestListAction()
    {
        $actions = $this->actions();
        $params = $actions["list"];
        $action = new WRestListAction($this, "list");
        if (is_array($params)) {
            foreach ($params as $param => $value) {
                if (property_exists($action, $param)) {
                    $action->$param = $value;
                }
            }
        }
        $action->run();
    }

    public function runDefaultWrestDeleteAction()
    {
        $actions = $this->actions();
        $params = $actions["delete"];
        $action = new WRestDeleteAction($this, "delete");
        if (is_array($params)) {
            foreach ($params as $param => $value) {
                if (property_exists($action, $param)) {
                    $action->$param = $value;
                }
            }
        }
        $action->run();
    }

    public $page = 'page';
    public $limit = 'limit';
    public $offset = 'offset';
    public $order = 'order';
    public $defaultLimit = 10;

    protected function getListCriteria()
    {

        $c = new CDbCriteria();
        $model = $this->getModel();

        $actions = $this->actions();
        $params = $actions["list"];

        $filterBy = $params["filterBy"];
        $paramsList = $model->getCreateAttributes();

        foreach ($paramsList as $columnName) {
            if (isset($filterBy[$columnName])) {
                $c->compare($columnName, $filterBy[$columnName]);
            }
        }

        // Make sure the filter parameters are allowed for rest-filtering
        if (!empty($filterBy) && is_array($filterBy)) {
            foreach ($filterBy as $name_in_table => $request_param_name) {
                if (!is_null(Yii::app()->request->getParam($request_param_name))) {
                    $c->compare($name_in_table, Yii::app()->request->getParam($request_param_name));
                }
            }
        }

        $c->limit = (int) (($limit = Yii::app()->request->getParam($this->limit)) ? $limit : $this->defaultLimit);
        $page = (int) Yii::app()->request->getParam($this->page) - 1;
        $c->offset = ($offset = $limit * $page) ? $offset : 0;
        $c->order = ($order = Yii::app()->request->getParam($this->order)) ? $order : $model->tableName() . "." . $model->getMetaData()->tableSchema->primaryKey;

        $reverse = Yii::app()->request->getParam('reverse');
        if ($reverse == 1) {
            $c->order .= " DESC";
        } else {
            $c->order .= " ASC";
        }

        return $c;
    }

    /**
     * @param int|string $nodeId
     * @return Node
     * @throws CHttpException
     */
    protected function loadNodeByIdOrRoute($nodeId)
    {
        $node = null;
        if (ctype_digit($nodeId)) {
            $node = Node::model()->findByPk($nodeId);
        } else {
            /** @var Route $route */
            $route = Route::model()->with('node')->findByAttributes(array('route' => strtolower((string)$nodeId)));
            if ($route !== null) {
                $node = $route->node;
                // Set the application language to the route language.
                // This way we know which language the item and it's relations should be returned in.
                if (!empty($route->translation_route_language) && Yii::app()->language !== $route->translation_route_language) {
                    Yii::app()->language = $route->translation_route_language;
                }
            }
        }
        if ($node === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find node %s.'), $nodeId));
        }
        return $node;
    }

    /**
     * @param Node $node
     * @return ActiveRecord
     * @throws CHttpException
     */
    protected function loadItemByNode(Node $node)
    {
        try {
            $item = $node->item();
        } catch (NodeItemExistsButIsRestricted $e) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Node item %s exists but is restricted.'), $node->id));
        }
        if ($item === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find item for node %s.'), $node->id));
        }
        return $item;
    }
}