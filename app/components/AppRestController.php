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
                'accessControl - preflight',
                /*
                array(
                    'application.filters.ContentNegotiator',
                    'languages' => LanguageHelper::getCodes(),
                ),
                */
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

    public $page = 'Foo_page';
    public $limit = 'Foo_limit';
    //public $offset = 'Foo_offset';
    public $order = 'Foo_order';
    public $defaultLimit = 10;
    public $nullString = 'null';

    protected function getFilterCriteria($filterBy)
    {

        $c = new CDbCriteria();

        // Make sure the filter parameters are allowed for rest-filtering
        if (!empty($filterBy) && is_array($filterBy)) {
            foreach ($filterBy as $key => $val) {
                if (!is_null(Yii::app()->request->getParam($val))) {
                    $param = Yii::app()->request->getParam($val);
                    if ($param === $this->nullString) {
                        $c->addCondition($key . ' IS NULL');
                    } elseif ($param === "<>" . $this->nullString) {
                        $c->addCondition($key . ' IS NOT NULL');
                    } else {
                        $c->compare($key, $param);
                    }
                }
            }
        }

        return $c;

    }

    protected function getListCriteria($model)
    {

        $actions = $this->actions();
        $params = $actions["list"];

        $filterBy = $params["filterBy"];
        $c = $this->getFilterCriteria($filterBy);

        /*
        $c->limit = (int) (($limit = Yii::app()->request->getParam($this->limit)) ? $limit : $this->defaultLimit);
        $page = (int) Yii::app()->request->getParam($this->page) - 1;
        $c->offset = ($offset = $limit * $page) ? $offset : 0;
        */
        $c->order = ($order = Yii::app()->request->getParam($this->order)) ? $order : "t." . $model->getMetaData(
            )->tableSchema->primaryKey;

        $reverse = Yii::app()->request->getParam('reverse');
        if ($reverse == 1) {
            $c->order .= " DESC";
        } else {
            $c->order .= " ASC";
        }

        return $c;
    }

    protected function getCountCriteria($model)
    {
        $c = $this->getListCriteria($model);
        return $c;
    }

    /**
     * When the default wrest list action is not enough, this
     * method comes in handy since it uses controller-specific overrides (if present)
     * of getFilterCriteria($filterBy) and getListCriteria() above.
     */
    protected function getListActionResults($model)
    {

        $c = $this->getListCriteria($model);

        $models = $model->findAll($c);
        $result = array();
        if ($models) {
            foreach ($models as $item) {
                $result[] = $item->getAllAttributes();
            }
        }

        return $result;

    }

    protected function runNonPaginatedListAction()
    {

        $model = $this->getModel();
        $result = $this->getListActionResults($model);
        $this->sendResponse(200, $result);

    }

    protected function runPaginatedListAction()
    {

        $model = $this->getModel();
        $result = $this->getPaginatedListActionResults($model);
        $this->sendResponse(200, $result);

    }

    protected function getPaginatedListActionResults($model)
    {

        // Get list action configuration from controller list action configuration
        $actions = $this->actions();
        $params = $actions["list"];
        if (is_array($params)) {
            foreach ($params as $param => $value) {
                if (property_exists($this, $param)) {
                    $this->$param = $value;
                }
            }
        }

        // Compile criteria
        $criteria = $this->getListCriteria($model);
        $countCriteria = $this->getCountCriteria($model);

        // Get pagination options from request parameters
        $pageSize = (int) Yii::app()->request->getParam($this->limit);
        $page = (int) Yii::app()->request->getParam($this->page);

        // Support global (as in all item types) per-request defaults
        if (empty($pageSize)) {
            $pageSize = (int) Yii::app()->request->getParam("default_limit");
        }
        if (empty($page)) {
            $page = (int) Yii::app()->request->getParam("default_page");
        }

        // Always set a page size
        if (empty($pageSize)) {
            $pageSize = $this->defaultLimit;
        }

        // Prepare data provider
        $dataProvider = new CActiveDataProvider(
            $model, array(
                'criteria' => $criteria,
                'countCriteria' => $countCriteria,
                'pagination' => array(
                    'pageSize' => $pageSize,
                    'currentPage' => $page - 1, // CActiveDataProvider uses 0 for first page internally
                ),
            )
        );
        $models = $dataProvider->getData();

        $result = array(
            "items" => [],
            "_meta" => [
                "totalCount" => (int) $dataProvider->getTotalItemCount(),
                "pageCount" => (int) $dataProvider->getPagination()->pageCount,
                // CActiveDataProvider uses 0 for first page internally
                "currentPage" => (int) $dataProvider->getPagination()->currentPage + 1,
                "perPage" => (int) $dataProvider->getPagination()->pageSize
            ],
        );
        if ($models) {
            foreach ($models as $item) {
                $result["items"][] = $item->getAllAttributes();
            }
        }

        return $result;

    }

    /**
     * The default list-action for the REST api controllers
     */
    public function actionList()
    {

        $model = $this->getModel();
        $result = $this->getPaginatedListActionResults($model);
        $this->sendResponse(200, $result);

    }

}