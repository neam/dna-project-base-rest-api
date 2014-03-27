<?php

class AppRestController extends WRestController
{

    public function init()
    {
        ini_set('html_errors', 0);
        $this->_responseFormat = 'json';
        return parent::init();
    }

    public function loadModel($id)
    {
        if (is_null($id)) {
            $id = Yii::app()->user->id;
        }
        $modelName = $this->_modelName;
        $model = $modelName::model()->findByPk($id);
        if ($model === null) {
            $this->sendResponse(404);
        }
        return $model;
    }

    private function _getStatusCodeMessage($status)
    {
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    public function actionPreflight()
    {
        $content_type = 'application/json';
        $status = 200;

        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept");
        header('Content-type: ' . $content_type);
    }

    public function sendResponse($status = 200, $bodyParams = array(), $options = array())
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept");
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

}