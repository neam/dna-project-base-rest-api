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
            'TextDoc' => 'text_doc',
            'VectorGraphic' => 'vector_graphic',
            'DataChunk' => 'data_chunk',
            'DataSource' => 'data_source',
        );

    }

    static public function websiteContentItemModels()
    {

        return array(
            'PoFile' => 'po_file',
            'Page' => 'page',
            'Section' => 'section',
            'DownloadLink' => 'download_link',
            'HtmlChunk' => 'html_chunk',
            'Tool' => 'tool',
        );

    }

    static public function waffleItemModels()
    {

        return array(
            'Country' => 'country',
            'Etc' => 'etc',
        );

    }

    /**
     * Model classes that will have CRUD generated through gii/giic
     * @return array
     */
    static public function crudModels()
    {

        return array(
            // Contents
            'Changeset' => 'changeset',
            'Chapter' => 'chapter',
            'Comment' => 'comment',
            'DataChunk' => 'data_chunk',
            'DataSource' => 'data_source',
            'DownloadLink' => 'download_link',
            'ExamQuestion' => 'exam_question',
            'ExamQuestionAlternative' => 'exam_question_alternative',
            'Exercise' => 'exercise',
            'HtmlChunk' => 'html_chunk',
            'Node' => 'node',
            'Edge' => 'edge',
            'Page' => 'page',
            'PoFile' => 'po_file',
            'Section' => 'section',
            'SlideshowFile' => 'slideshow_file',
            'Snapshot' => 'snapshot',
            'SpreadsheetFile' => 'spreadsheet_file',
            'TextDoc' => 'text_doc',
            'Tool' => 'tool',
            'VectorGraphic' => 'vector_graphic',
            'VideoFile' => 'video_file',
            // User management
            'Account' => 'users',
            'Profiles' => 'profiles',
            // Translations
            'Message' => 'Message',
            'SourceMessage' => 'SourceMessage',
            // Fixture-based
            'Action' => 'action',
            // Database views
            'Item' => 'item',
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
            self::websiteContentItemModels()
            //self::waffleItemModels()
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

        return array_merge(self::qaModels(), array(
            'ExamQuestionAlternative' => 'exam_question_alternative',
        ));

    }

    /**
     * Model classes that use the wrest extension
     * @return array
     */
    static public function restModels()
    {

        return array(
            'Comment' => 'comment',
        );

    }

    /**
     * Model classes that are generated internally and is never expected to be created
     * manually by a creation form
     * @return array
     */
    static public function internalModels()
    {

        return array_merge(array(
            "Node" => "node",
            "EzcExecution" => "ezc_execution",
            "Users" => "users",
        ), self::qaStateModels());

    }

    /**
     * Frontend UI labels for the models
     * @return array
     */
    static public function modelLabels()
    {
        return array(
            'Chapter' => 'n==0#Chapter(s)|n==1#Chapter|n>1#Chapters',
            'DataChunk' => 'n==0#Data chunk(s)|n==1#Data chunk|n>1#Data chunks',
            'DataSource' => 'n==0#Data source(s)|n==1#Data source|n>1#Data sources',
            'DownloadLink' => 'n==0#Download link(s)|n==1#Download link|n>1#Download links',
            'ExamQuestion' => 'n==0#Exam question(s)|n==1#Exam question|n>1#Exam questions',
            'ExamQuestionAlternative' => 'n==0#Exam question alternative(s)|n==1#Exam question alternative|n>1#Exam question alternatives',
            'Exercise' => 'n==0#Exercise(s)|n==1#Exercise|n>1#Exercises',
            'HtmlChunk' => 'n==0#Html chunk(s)|n==1#Html chunk|n>1#Html chunks',
            'Node' => 'n==0#Node(s)|n==1#Node|n>1#Nodes',
            'Page' => 'n==0#Web page(s)|n==1#Web page|n>1#Web pages',
            'PoFile' => 'n==0#.po-file(s)|n==1#.po-file|n>1#.po-files',
            'Section' => 'n==0#Web page section(s)|n==1#Web page section|n>1#Web page sections',
            'SlideshowFile' => 'n==0#Slideshow file(s)|n==1#Slideshow file|n>1#Slideshow files',
            'Snapshot' => 'n==0#Snapshot(s)|n==1#Snapshot|n>1#Snapshots',
            'TextDoc' => 'n==0#Text doc(s)|n==1#Text doc|n>1#Text docs',
            'Tool' => 'n==0#Tool(s)|n==1#Tool|n>1#Tools',
            'VectorGraphic' => 'n==0#Vector graphic(s)|n==1#Vector graphic|n>1#Vector graphics',
            'VideoFile' => 'n==0#Video(s)|n==1#Video|n>1#Videos',
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
                'DataChunk' => array('title', 'about'),
                'DataSource' => array('title', 'about'),
                'DownloadLink' => array('title'),
                'Edge' => array('title'),
                'ExamQuestion' => array('question'),
                'ExamQuestionAlternative' => array('markup'),
                'Exercise' => array('title', 'question', 'description'),
                'HtmlChunk' => array('markup'),
                'Page' => array('title', 'about'),
                'Section' => array('title', 'menu_label'),
                'SlideshowFile' => array('title', 'about'),
                'Snapshot' => array('title', 'about'),
                'SpreadsheetFile' => array('title'),
                'TextDoc' => array('title', 'about'),
                'Tool' => array('title', 'about'),
                'VectorGraphic' => array('title', 'about'),
                'VideoFile' => array('title', 'caption', 'about', 'subtitles'),
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
                'DataChunk' => array('slug'),
                'DataSource' => array('slug'),
                'ExamQuestion' => array('slug'),
                'Exercise' => array('slug'),
                'Page' => array('slug'),
                'PoFile' => array('processed_media_id'),
                'Section' => array('slug'),
                'SlideshowFile' => array('slug', 'processed_media_id'),
                'Snapshot' => array('slug'),
                'SpreadsheetFile' => array('processed_media_id'),
                'TextDoc' => array('slug', 'processed_media_id'),
                'Tool' => array('slug'),
                'VectorGraphic' => array('slug', 'processed_media_id'),
                'VideoFile' => array('slug', 'processed_media_id'),
            ),
            'relations' => array(
                'Chapter' => array('chapterQaState' => 'chapter_qa_state_id'),
                'DataChunk' => array('dataChunkQaState' => 'data_chunk_qa_state_id'),
                'DataSource' => array('dataSourceQaState' => 'data_source_qa_state_id'),
                'ExamQuestion' => array('examQuestionQaState' => 'exam_question_qa_state_id'),
                'Exercise' => array('exerciseQaState' => 'exercise_qa_state_id'),
                'PoFile' => array('processedMedia' => 'processed_media_id', 'poFileQaState' => 'po_file_qa_state_id'),
                'SlideshowFile' => array('processedMedia' => 'processed_media_id', 'slideshowFileQaState' => 'slideshow_file_qa_state_id'),
                'Snapshot' => array('snapshotQaState' => 'snapshot_qa_state_id'),
                'SpreadsheetFile' => array('processedMedia' => 'processed_media_id'),
                'TextDoc' => array('processedMedia' => 'processed_media_id', 'textDocQaState' => 'text_doc_qa_state_id'),
                'VectorGraphic' => array('processedMedia' => 'processed_media_id', 'vectorGraphicQaState' => 'vector_graphic_qa_state_id'),
                'VideoFile' => array('processedMedia' => 'processed_media_id', 'videoFileQaState' => 'video_file_qa_state_id'),
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

