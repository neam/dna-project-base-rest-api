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

    /**
     * @see actionJsonByActiveRecord() the non-optimized version of this method
     */
    public function actionJson($lang)
    {

        $model = $this->getModel();

        $response = new stdClass();

        // waffle metadata
        $response->file_format = new stdClass();
        $response->file_format->v = "0.1";

        // waffle i18n metadata
        $response->i18n = new stdClass();
        $response->i18n->lang = $lang;
        $response->i18n->plural_schema = new stdClass();
        // TODO: Base upon waffle choice format schema attribute
        $locale = CLocale::getInstance($lang);
        foreach ($locale->pluralRules as $k => $pluralRule) {
            $response->i18n->plural_schema->$k = $pluralRule;
        }

        // waffle info
        $response->info = new stdClass();
        $response->info->title = $model->title;
        $response->info->short_title = $model->short_title;
        $response->info->description = $model->description;
        /*
         * TODO: get p3 media:
        $response->info->image_small = $model->;
        $response->info->image_large = $model->;
        */
        $response->info->link = $model->link;
        $response->info->publishing_date = $model->publishing_date;
        $response->info->url = $model->url;
        $response->info->license = $model->license;
        $response->info->license_link = $model->license_link;

        // waffle info publisher
        $response->info->publisher = new stdClass();

        if (!is_null($model->waffle_publisher_id)) {
            $response->info->publisher->id = $model->wafflePublisher->ref;
            $response->info->publisher->name = $model->wafflePublisher->name;
            $response->info->publisher->description = $model->wafflePublisher->description;
            $response->info->publisher->url = $model->wafflePublisher->url;
            /*
             * TODO: get p3 media:
            $response->info->publisher->image_small = $model->wafflePublisher->;
            $response->info->publisher->image_large = $model->wafflePublisher->;
            */
        }

        $response->definitions = new stdClass();

        // waffleCategories
        $columns = array(
            "waffle_category" => array("ref", "_name", "_description"),
            "waffle_category_thing" => array("ref", "_name"),
        );
        $select = U::prefixed_table_fields_wildcard('waffle_category', 'waffle_category', $columns['waffle_category'])
            . "," . U::prefixed_table_fields_wildcard('waffle_category_thing', 'waffle_category_thing', $columns['waffle_category_thing']);
        // Prevent double-escaping ("The method will automatically quote the column names unless a column contains some parenthesis (which means the column contains a DB expression).")
        $select .= ", (-1) AS foo";

        $command = Yii::app()->db->createCommand()
            ->select($select)
            ->from("waffle_category_thing")
            ->join("waffle_category", "waffle_category_thing.waffle_category_id = waffle_category.id")
            ->where("waffle_category.waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);

        $formatResults = function ($records) use ($columns) {

            //var_dump(compact("records"));
            $categories = array();
            if ($records) {
                foreach ($records as $r) {

                    if (!isset($categories[$r['waffle_category.ref']])) {
                        $category = new stdClass();
                        $category->id = $r['waffle_category.ref'];
                        $category->name = $r['waffle_category._name'];
                        $category->description = $r['waffle_category._description'];
                        $category->things = array();
                        $categories[$r['waffle_category.ref']] = $category;
                    }

                    $things =& $categories[$r['waffle_category.ref']]->things;

                    $thing = new stdClass();
                    $thing->id = $r['waffle_category_thing.ref'];
                    $thing->name = $r['waffle_category_thing._name'];
                    $things[] = $thing;

                }
            }

            return array_values($categories);
        };

        //print_r($command->text);print_r($command->params);
        $translatedCommand = U::translatedDbCommand($command, $lang, array()); //'name', 'description'
        //print_r($translatedCommand->text);print_r($translatedCommand->params);
        $records = $translatedCommand->queryAll();

        $response->definitions->categories = $formatResults($records);

        // waffleIndicators
        $command = Yii::app()->db->createCommand()
            ->select("ref AS id")
            ->from("waffle_indicator")
            ->where("waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);
        $translatedCommand = U::translatedDbCommand($command, $lang, array('name'));
        $response->definitions->indicators = $translatedCommand->queryAll();

        // waffleUnits
        $command = Yii::app()->db->createCommand()
            ->select("ref AS id, _name AS name, _description AS description")
            ->from("waffle_unit")
            ->where("waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);
        $translatedCommand = U::translatedDbCommand($command, $lang);
        $response->definitions->units = $translatedCommand->queryAll();

        // waffleTags
        $command = Yii::app()->db->createCommand()
            ->select("ref AS id, _name AS name, _description AS description")
            ->from("waffle_tag")
            ->where("waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);
        $translatedCommand = U::translatedDbCommand($command, $lang);
        $response->definitions->tags = $translatedCommand->queryAll();

        // waffleDataSources - TODO
        /*
        $command = Yii::app()->db->createCommand()
            ->select("ref AS id, _name, _description")
            ->from("waffle_data_source")
            ->where("waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);
        $translatedCommand = U::translatedDbCommand($command);
        $response->sources = $translatedCommand->queryAll();
        */

        $this->sendResponse(200, $response);

    }

    /**
     * Clean but too slow.
     * @throws CException
     * @see actionJson() the optimized version of this method
     */
    public function actionJsonByActiveRecord($lang)
    {
        $model = $this->getModel();

        $response = new stdClass();

        // waffle metadata
        $response->file_format = new stdClass();
        $response->file_format->v = "0.1";

        // waffle i18n metadata
        $response->i18n = new stdClass();
        $response->i18n->lang = $lang;
        $response->i18n->plural_schema = new stdClass();
        // TODO: Base upon waffle choice format schema attribute
        $locale = CLocale::getInstance($lang);
        foreach ($locale->pluralRules as $k => $pluralRule) {
            $response->i18n->plural_schema->$k = $pluralRule;
        }

        // waffle info
        $response->info = new stdClass();
        $response->info->title = $model->title;
        $response->info->short_title = $model->short_title;
        $response->info->description = $model->description;
        /*
         * TODO: get p3 media:
        $response->info->image_small = $model->;
        $response->info->image_large = $model->;
        */
        $response->info->link = $model->link;
        $response->info->publishing_date = $model->publishing_date;
        $response->info->url = $model->url;
        $response->info->license = $model->license;
        $response->info->license_link = $model->license_link;

        // waffle info publisher
        $response->info->publisher = new stdClass();

        if (!is_null($model->waffle_publisher_id)) {
            $response->info->publisher->id = $model->wafflePublisher->ref;
            $response->info->publisher->name = $model->wafflePublisher->name;
            $response->info->publisher->description = $model->wafflePublisher->description;
            $response->info->publisher->url = $model->wafflePublisher->url;
            /*
             * TODO: get p3 media:
            $response->info->publisher->image_small = $model->wafflePublisher->;
            $response->info->publisher->image_large = $model->wafflePublisher->;
            */
        }

        $response->definitions = new stdClass();

        // waffleCategories
        $response->definitions->categories = array();
        foreach ($model->waffleCategories as $category) {
            $translatedCategory = new stdClass();
            $translatedCategory->id = $category->ref;
            $translatedCategory->name = $category->name;
            $translatedCategory->description = $category->description;
            $translatedCategory->things = array();
            foreach ($category->waffleCategoryThings as $categoryElement) {
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