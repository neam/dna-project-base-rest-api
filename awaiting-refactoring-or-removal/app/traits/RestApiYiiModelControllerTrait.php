<?php

trait RestApiYiiModelControllerTrait
{

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

        /*
        $reverse = Yii::app()->request->getParam('reverse');
        if ($reverse == 1) {
            $c->order .= " DESC";
        } else {
            $c->order .= " ASC";
        }
        */

        return $c;
    }

    protected function getCountCriteria($model)
    {
        $c = $this->getListCriteria($model);
        return $c;
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

        // Invoke hook for controller to modify the response, for instance in order to specify additional metadata about the collection
        $this->beforeReturningPaginatedListActionResults($result, $dataProvider, $criteria, $countCriteria);

        return $result;

    }

    /**
     * Hook for controller to override in order to modify the response, for instance in order to specify additional metadata about the collection
     * @return null
     */
    protected function beforeReturningPaginatedListActionResults(
        &$result,
        CActiveDataProvider &$dataProvider,
        CDbCriteria &$criteria,
        CDbCriteria &$countCriteria
    ) {

    }

}