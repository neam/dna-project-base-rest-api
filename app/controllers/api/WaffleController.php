<?php

class WaffleController extends AppRestController
{
    /**
     * @var string the model class used as resource.
     */
    protected $_modelName = "Waffle";

    /**
     * Returns the standard actions the controller supports.
     *
     * @return array the action definitions.
     */
    public function actions()
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
     * @param string $lang
     * @see actionJsonByActiveRecord() the non-optimized version of this method
     */
    public function actionJson($lang)
    {
        /** @var Waffle $model */
        $model = $this->getModel();

        $response = new stdClass();

        // waffle metadata
        $response->file_format = (object) json_decode($model->file_format);

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

        if ($model->wafflePublisher !== null) {
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
        // Prevent double-escaping ("The method will automatically quote the column names unless a column contains some parenthesis (which means the column contains a DB expression).")
        $command = Yii::app()->db->createCommand()
            ->select("waffle_category.ref AS `waffle_category.ref`, waffle_category_thing.ref AS `waffle_category_thing.ref`, (-1) AS prevent_double_escaping_yii_workaround")
            ->from("waffle_category")
            ->leftJoin("waffle_category_thing", "waffle_category_thing.waffle_category_id = waffle_category.id")
            ->where("waffle_category.waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);
        $translatedCommand = U::translatedDbCommand($command, $lang, array('waffle_category' => array('list_name', 'property_name', 'possessive', 'choice_format', 'description'), 'waffle_category_thing' => array('name', 'short_name')));
        $records = $translatedCommand->queryAll();
        // Groups the category things under their respective categories.
        $formatWaffleCategories = function ($records) use ($lang) {
            $categories = array();
            if (is_array($records)) {
                foreach ($records as $r) {
                    if (!isset($categories[$r['waffle_category.ref']])) {
                        $category = new stdClass();
                        $category->id = $r['waffle_category.ref'];
                        $category->list_name = $r['waffle_category.list_name'];
                        $category->property_name = $r['waffle_category.property_name'];
                        $category->possessive = $r['waffle_category.possessive'];
                        $category->expanded_choice_format = (object) array_values(ChoiceFormatHelper::toArray($r['waffle_category.choice_format'], $lang));
                        $category->description = $r['waffle_category.description'];
                        $category->things = array();
                        $categories[$r['waffle_category.ref']] = $category;
                    }
                    if ($r['waffle_category_thing.ref'] !== null) {
                        $things =& $categories[$r['waffle_category.ref']]->things;
                        $thing = new stdClass();
                        $thing->id = $r['waffle_category_thing.ref'];
                        $thing->name = $r['waffle_category_thing.name'];
                        $thing->short_name = $r['waffle_category_thing.short_name'];
                        $things[] = $thing;
                    }
                }
            }
            return array_values($categories);
        };
        $response->definitions->categories = $formatWaffleCategories($records);

        // waffleIndicators
        $command = Yii::app()->db->createCommand()
            ->select("ref AS id")
            ->from("waffle_indicator")
            ->where("waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);
        $translatedCommand = U::translatedDbCommand($command, $lang, array('waffle_indicator' => array('name')), array(), false);
        $response->definitions->indicators = $translatedCommand->queryAll();

        // waffleUnits
        $command = Yii::app()->db->createCommand()
            ->select("ref AS id, _name AS name, _description AS description")
            ->from("waffle_unit")
            ->where("waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);
        $translatedCommand = U::translatedDbCommand($command, $lang, array('waffle_unit' => array('name', 'description')), array(), false);
        $response->definitions->units = $translatedCommand->queryAll();

        // waffleTags
        $command = Yii::app()->db->createCommand()
            ->select("ref AS id, _name AS name, _description AS description")
            ->from("waffle_tag")
            ->where("waffle_id = :waffle_id");
        $command->params = array("waffle_id" => $model->id);
        $translatedCommand = U::translatedDbCommand($command, $lang, array('waffle_tag' => array('name', 'description')), array(), false);
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

        $this->sendResponse(200, (array)$response);
    }

    /**
     * Clean but too slow.
     *
     * @param string $lang
     * @see actionJson() the optimized version of this method
     */
    public function actionJsonByActiveRecord($lang)
    {
        /** @var Waffle $model */
        $model = $this->getModel();

        $response = new stdClass();

        // waffle metadata
        $response->file_format = (object) json_decode($model->file_format);

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

        if ($model->wafflePublisher !== null) {
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
            $translatedCategory->name = $category->list_name;
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
            $this->sendResponse(501);
            $translatedDataSource = new stdClass();
            $response->sources[] = $translatedDataSource;
        }

        $this->sendResponse(200, (array)$response);
    }
}