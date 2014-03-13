<?php

class WaffleController extends AppRestController
{

    protected $_modelName = "Waffle"; //model to be used as resource

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

    public function actionJson()
    {
        $model = $this->getModel();

        $response = new stdClass();
        $response->info = new stdClass();
        $response->info->title = $model->title;
        /*
         * TODO: add to data model:
        $response->info->short_title = $model->short_title;
        $response->info->description = $model->description;
        */
        $response->definitions = new stdClass();

        // waffleCategories
        $response->definitions->categories = array();
        foreach ($model->waffleCategories as $category) {
            $translatedCategory = new stdClass();
            $translatedCategory->id = $category->ref;
            $translatedCategory->name = $category->name;
            $translatedCategory->description = $category->description;
            $translatedCategory->things = array();
            foreach ($category->waffleCategoryElements as $categoryElement) {
                $translatedCategoryElement = new stdClass();
                $translatedCategoryElement->id = $categoryElement->ref;
                $translatedCategoryElement->name = $categoryElement->name;
                $translatedCategory->things[] = $translatedCategoryElement;
            }
            $response->definitions->categories[] = $translatedCategory;
        }

        // waffleIndicators
        $response->definitions->indicators = array();
        foreach ($model->waffleIndicators as $indicator) {
            $translatedIndicator = new stdClass();
            $translatedIndicator->id = $indicator->ref;
            $translatedIndicator->name = $indicator->name;
            $response->definitions->indicators[] = $translatedIndicator;
        }

        // waffleUnits
        $response->definitions->units = array();
        foreach ($model->waffleUnits as $unit) {
            $translatedUnit = new stdClass();
            $translatedUnit->id = $unit->ref;
            $translatedUnit->name = $unit->name;
            $translatedUnit->description = $unit->description;
            $response->definitions->units[] = $translatedUnit;
        }

        // waffleTags
        $response->definitions->tags = array();
        foreach ($model->waffleTags as $tag) {
            $translatedTag = new stdClass();
            $translatedTag->id = $tag->ref;
            $translatedTag->name = $tag->name;
            $translatedTag->description = $tag->description;
            $response->definitions->tags[] = $translatedTag;
        }

        // waffleDataSources
        $response->sources = new stdClass();
        foreach ($model->waffleDataSources as $dataSource) {
            $translatedDataSource = new stdClass();
            throw new CException("TODO");
            $response->sources[] = $translatedDataSource;
        }

        $this->sendResponse(200, $response);
    }

}