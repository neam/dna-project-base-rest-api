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
            'Chapter' => 'chapter',
            'DataChunk' => 'data_chunk',
            'DataSource' => 'data_source',
            'ExamQuestion' => 'exam_question',
            'Exercise' => 'exercise',
            'PoFile' => 'po_file',
            'SlideshowFile' => 'slideshow_file',
            'Snapshot' => 'snapshot',
            'TextDoc' => 'text_doc',
            'Tool' => 'tool',
            'VectorGraphic' => 'vector_graphic',
            'VideoFile' => 'video_file',
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
            'SectionContent' => 'section_content',
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
            // Database views
            'GoItem' => 'go_item',
        );

    }

    /**
     * Model classes that will use the yii-qa-state extensions
     * @return array
     */
    static public function qaModels()
    {

        return array(
            'Chapter' => 'chapter',
            'DataChunk' => 'data_chunk',
            'DataSource' => 'data_source',
            'ExamQuestion' => 'exam_question',
            'ExamQuestionAlternative' => 'exam_question_alternative',
            'Exercise' => 'exercise',
            'PoFile' => 'po_file',
            'SlideshowFile' => 'slideshow_file',
            'Snapshot' => 'snapshot',
            'TextDoc' => 'text_doc',
            'Tool' => 'tool',
            'VectorGraphic' => 'vector_graphic',
            'VideoFile' => 'video_file',
            // Special pages
            'HtmlChunk' => 'html_chunk',
            'DownloadLink' => 'download_link',
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
            'DataChunk' => 'n==0#DataChunk(s)|n==1#DataChunk|n>1#DataChunks',
            'DataSource' => 'n==0#DataSource(s)|n==1#DataSource|n>1#DataSources',
            'ExamQuestion' => 'n==0#ExamQuestion(s)|n==1#ExamQuestion|n>1#ExamQuestions',
            'ExamQuestionAlternative' => 'n==0#ExamQuestionAlternative(s)|n==1#ExamQuestionAlternative|n>1#ExamQuestionAlternatives',
            'Exercise' => 'n==0#Exercise(s)|n==1#Exercise|n>1#Exercises',
            'HtmlChunk' => 'n==0#HtmlChunk(s)|n==1#HtmlChunk|n>1#HtmlChunks',
            'Node' => 'n==0#Node(s)|n==1#Node|n>1#Nodes',
            'PoFile' => 'n==0#PoFile(s)|n==1#PoFile|n>1#PoFiles',
            'SlideshowFile' => 'n==0#SlideshowFile(s)|n==1#SlideshowFile|n>1#SlideshowFiles',
            'Snapshot' => 'n==0#Snapshot(s)|n==1#Snapshot|n>1#Snapshots',
            'TextDoc' => 'n==0#TextDoc(s)|n==1#TextDoc|n>1#TextDocs',
            'Tool' => 'n==0#Tool(s)|n==1#Tool|n>1#Tools',
            'VectorGraphic' => 'n==0#VectorGraphic(s)|n==1#VectorGraphic|n>1#VectorGraphics',
            'VideoFile' => 'n==0#VideoFile(s)|n==1#VideoFile|n>1#VideoFiles',
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
                'VideoFile' => array('title', 'about', 'subtitles'),
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

}

