<?php

class DataModel
{

    /**
     * Model classes that represent top level visitable items through the go-page
     * @return array
     */
    static public function goItemModels()
    {

        return array(
            'Snapshot' => 'snapshot',
            'VideoFile' => 'video_file',
        );

    }

    static public function educationalItemModels()
    {

        return array(
            'Chapter' => 'chapter',
            'Exercise' => 'exercise',
            'ExamQuestion' => 'exam_question',
            'ExamQuestionAlternative' => 'exam_question_alternative',
            'SlideshowFile' => 'slideshow_file',
            'SpreadsheetFile' => 'spreadsheet_file',
            'TextDoc' => 'text_doc',
            'VectorGraphic' => 'vector_graphic',
            'DataArticle' => 'data_article',
            'DataSource' => 'data_source',
        );

    }

    static public function internalItemModels()
    {

        return array(
            'I18nCatalog' => 'i18n_catalog',
            'Tool' => 'tool',
            'GuiSection' => 'gui_section',
        );

    }

    static public function websiteContentItemModels()
    {

        return array(
            'Menu' => 'menu',
            'Page' => 'page',
            'Section' => 'section',
            'DownloadLink' => 'download_link',
            'HtmlChunk' => 'html_chunk',
        );

    }

    static public function waffleItemModels()
    {

        return array(
            'Waffle' => 'waffle',
            'WaffleCategory' => 'waffle_category',
            'WaffleCategoryElement' => 'waffle_category_element',
            'WaffleIndicator' => 'waffle_indicator',
            'WaffleUnit' => 'waffle_unit',
            'WaffleTag' => 'waffle_tag',
            'WaffleDataSource' => 'waffle_data_source'
            //'WaffleRole' => 'waffle_role',
        );

    }

    static public function memberItemModels()
    {

        return array(
            'Account' => 'account',
            'Profile' => 'profile',
            'Group' => 'group',
            'GroupHasAccount' => 'group_has_account',
            'NodeHasGroup' => 'node_has_group',
        );

    }

    /**
     * Model classes that will have CRUD generated through gii/giic
     * @return array
     */
    static public function crudModels()
    {

        return array_merge(
            self::goItemModels(),
            self::educationalItemModels(),
            self::internalItemModels(),
            self::websiteContentItemModels(),
            self::waffleItemModels(),
            self::memberItemModels(),
            array(
                // Misc
                'Changeset' => 'changeset',
                'Comment' => 'comment',
                'Node' => 'node',
                'Edge' => 'edge',
                // Translations
                'Message' => 'Message',
                'SourceMessage' => 'SourceMessage',
                // Fixture-based
                'Action' => 'action',
                'Role' => 'role',
                // Database views
                'Item' => 'item',
            )
        );

    }

    /**
     * Model classes that will use the yii-qa-state extensions
     * @return array
     */
    static public function qaModels()
    {

        return array_merge(
            self::goItemModels(),
            self::educationalItemModels(),
            self::internalItemModels(),
            self::websiteContentItemModels(),
            self::waffleItemModels()
        );

    }

    /**
     * The corresponding qa state models used by yii-qa-state
     * @return array
     */
    static public function qaStateModels()
    {

        $qaStateModels = array();
        foreach (self::qaModels() as $model => $table) {
            $qaStateModels[$model . "QaState"] = $table . "_qa_state";
        }
        return $qaStateModels;

    }

    /**
     * Model classes that have a Node relation and thus can be related to each other freely
     * @return array
     */
    static public function graphModels()
    {

        return array_merge(self::qaModels(), array());

    }

    /**
     * Model classes that use the wrest extension
     * @return array
     */
    static public function restModels()
    {

        return array_merge(
            self::goItemModels(),
            self::educationalItemModels(),
            self::waffleItemModels(),
            array(
                'Comment' => 'comment',
                'Item' => 'item',
            )
        );

    }

    /**
     * Model classes that are generated internally or by user interaction and
     * thus never expected to be created manually in the backend
     * @return array
     */
    static public function internalModels()
    {

        return array_merge(
            self::qaStateModels(),
            array(
                "Node" => "node",
                "EzcExecution" => "ezc_execution",
                "Account" => "account",
            )
        );

    }

    /**
     * Frontend UI labels for the models
     * @return array
     */
    static public function modelLabels()
    {
        return array(
            'Chapter' => 'n==0#Chapter(s)|n==1#Chapter|n>1#Chapters',
            'DataArticle' => 'n==0#Data article(s)|n==1#Data article|n>1#Data articles',
            'DataSource' => 'n==0#Data source(s)|n==1#Data source|n>1#Data sources',
            'DownloadLink' => 'n==0#Download link(s)|n==1#Download link|n>1#Download links',
            'ExamQuestion' => 'n==0#Exam question(s)|n==1#Exam question|n>1#Exam questions',
            'ExamQuestionAlternative' => 'n==0#Exam question alternative(s)|n==1#Exam question alternative|n>1#Exam question alternatives',
            'Exercise' => 'n==0#Exercise(s)|n==1#Exercise|n>1#Exercises',
            'GuiSection' => 'n==0#GUI Section(s)|n==1#GUI Section|n>1#GUI Sections',
            'HtmlChunk' => 'n==0#Html chunk(s)|n==1#Html chunk|n>1#Html chunks',
            'Menu' => 'n==0#Menu(s)|n==1#Menu|n>1#Menus',
            'Node' => 'n==0#Node(s)|n==1#Node|n>1#Nodes',
            'Page' => 'n==0#Web page(s)|n==1#Web page|n>1#Web pages',
            'I18nCatalog' => 'n==0#I18n catalog(s)|n==1#I18n catalog|n>1#I18n catalogs',
            'Section' => 'n==0#Web page section(s)|n==1#Web page section|n>1#Web page sections',
            'SlideshowFile' => 'n==0#Slideshow file(s)|n==1#Slideshow file|n>1#Slideshow files',
            'SpreadsheetFile' => 'n==0#Spreadsheet file(s)|n==1#Spreadsheet file|n>1#Spreadsheet files',
            'Snapshot' => 'n==0#Snapshot(s)|n==1#Snapshot|n>1#Snapshots',
            'TextDoc' => 'n==0#Text doc(s)|n==1#Text doc|n>1#Text docs',
            'Tool' => 'n==0#Tool(s)|n==1#Tool|n>1#Tools',
            'VectorGraphic' => 'n==0#Vector graphic(s)|n==1#Vector graphic|n>1#Vector graphics',
            'VideoFile' => 'n==0#Video(s)|n==1#Video|n>1#Videos',
            'Waffle' => 'n==0#Waffle(s)|n==1#Waffle|n>1#Waffles',
            'WaffleCategory' => 'n==0#Category(s)|n==1#Category|n>1#Categories',
            'WaffleCategoryElement' => 'n==0#Category element(s)|n==1#Category element|n>1#Category elements',
            'WaffleIndicator' => 'n==0#Indicator(s)|n==1#Indicator|n>1#Indicators',
            'WaffleUnit' => 'n==0#Unit(s)|n==1#Unit|n>1#Units',
            'WaffleTag' => 'n==0#Tag(s)|n==1#Tag|n>1#Tags',
            'WaffleDataSource' => 'n==0#Data source(s)|n==1#Data source|n>1#Data sources',
        );
    }

    /**
     * @return array List of model attributes to translate using yii-i18n-attribute-messages
     */
    static public function i18nAttributeMessages()
    {
        return array(
            'attributes' => array(
                'Chapter' => array('title', 'about', 'teachers_guide'),
                'Comment' => array('comment'), // Note: Currently set in Comment.php instead of through here
                'DataArticle' => array('title', 'about'),
                'DataSource' => array('title', 'about'),
                'DownloadLink' => array('title'),
                'Edge' => array('title'),
                'ExamQuestion' => array('question'),
                'ExamQuestionAlternative' => array('markup'),
                'Exercise' => array('title', 'question', 'description'),
                'HtmlChunk' => array('markup'),
                'Menu' => array('title'),
                'Page' => array('title', 'about'),
                'Section' => array('title', 'menu_label'),
                'SlideshowFile' => array('title', 'about'),
                'Snapshot' => array('title', 'about'),
                'SpreadsheetFile' => array('title'),
                'TextDoc' => array('title', 'about'),
                'Tool' => array('title', 'about'),
                'VectorGraphic' => array('title', 'about'),
                'VideoFile' => array('title', 'caption', 'about', 'subtitles'),
                'Waffle' => array('title'),
                'WaffleCategory' => array('name', 'short_name', 'description'),
                'WaffleCategoryElement' => array('name', 'short_name'),
                'WaffleIndicator' => array('name', 'short_name', 'description'),
                'WaffleUnit' => array('name', 'short_name', 'description'),
                'WaffleTag' => array('name', 'short_name', 'description'),
                'WaffleDataSource' => array('name', 'short_name'),
            ),
        );
    }

    /**
     * @return array List of model attributes and relations to make multilingual using yii-i18n-columns
     */
    static public function i18nColumns()
    {
        return array(
            'attributes' => array(
                'Chapter' => array('slug'),
                'DataArticle' => array('slug'),
                'DataSource' => array('slug'),
                'ExamQuestion' => array('slug'),
                'Exercise' => array('slug'),
                'Menu' => array('slug'),
                'Page' => array('slug'),
                'Section' => array('slug'),
                'SlideshowFile' => array('slug', 'processed_media_id'),
                'Snapshot' => array('slug'),
                'SpreadsheetFile' => array('processed_media_id'),
                'TextDoc' => array('slug', 'processed_media_id'),
                'Tool' => array('slug'),
                'VectorGraphic' => array('slug', 'processed_media_id'),
                'VideoFile' => array('slug'),
                'Waffle' => array('slug'),
            ),
            'relations' => array(
                'Chapter' => array(),
                'DataArticle' => array(),
                'DataSource' => array(),
                'ExamQuestion' => array(),
                'Exercise' => array(),
                'SlideshowFile' => array('processedMedia' => 'processed_media_id'),
                'Snapshot' => array(),
                'SpreadsheetFile' => array('processedMedia' => 'processed_media_id'),
                'TextDoc' => array('processedMedia' => 'processed_media_id'),
                'VectorGraphic' => array('processedMedia' => 'processed_media_id'),
                'VideoFile' => array('processedMedia' => 'processed_media_id'),
            ),
        );
    }

    /**
     * @param $modelClass
     * @return bool
     */
    static function isGoModel($modelOrModelClass)
    {
        if (is_object($modelOrModelClass)) {
            $modelClass = get_class($modelOrModelClass);
        } else {
            $modelClass = $modelOrModelClass;
        }
        return in_array($modelClass, array_keys(self::goItemModels()));
    }


}

