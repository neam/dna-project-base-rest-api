<?php

class I18nCatalogController extends AppRestController
{

    protected $_modelName = "I18nCatalog"; //model to be used as resource

    public function actions() //determine which of the standard actions will support the controller
    {
        return array(
            'list' => array( //use for get list of objects
                'class' => 'WRestListAction',
                'filterBy' => array( //this param user in `where` expression when forming an db query
                    'name_in_table' => 'request_param_name', // 'name_in_table' => 'request_param_name'
                ),
                'limit' => 'limit', //request parameter name, which will contain limit of object
                'page' => 'page', //request parameter name, which will contain requested page num
                'order' => 'order', //request parameter name, which will contain ordering for sort
            ),
            'delete' => 'WRestDeleteAction',
            'get' => 'WRestGetAction',
            'create' => 'WRestCreateAction', //provide 'scenario' param
            'update' => array(
                'class' => 'WRestUpdateAction',
                'scenario' => 'update', //as well as in WRestCreateAction optional param
            )
        );
    }

    /**
     * @param string $format 'raw' or 'jed'
     */
    public function actionPoJson($format = 'raw')
    {
        $model = $this->getModel();
        $result = \neam\po2json\Po2Json::parseVariable($model->po_contents, null, $format);
        $this->sendResponse(200, $result);
    }

}