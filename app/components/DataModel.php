<?php

class DataModel
{

    static public function crudModels()
    {

        return array(
            // Contents
            'Changeset' => 'changeset',
            'Chapter' => 'chapter',
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
        );

    }

    static public function qaModels()
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

    static public function qaStateModels()
    {

        $qaStateModels = array();
        foreach (self::qaModels() as $model => $table) {
            $qaStateModels[$model . "QaState"] = $table . "_qa_state";
        }
        return $qaStateModels;

    }

    static public function graphModels()
    {

        return array_merge(self::qaModels(), array(
            'ExamQuestionAlternative' => 'exam_question_alternative',
        ));

    }

    static public function internalModels()
    {

        return array_merge(array(
            "Node" => "node",
            "EzcExecution" => "ezc_execution",
        ), self::qaStateModels());

    }

    static public function modelLabels()
    {
        return array(
            'Chapter' => 'n==0#Chapter(s)|n==1#Chapter|n>1#Chapters',
            'DataChunk' => 'n==0#DataChunk(s)|n==1#DataChunk|n>1#DataChunks',
            'DataSource' => 'n==0#DataSource(s)|n==1#DataSource|n>1#DataSources',
            'ExamQuestion' => 'n==0#ExamQuestion(s)|n==1#ExamQuestion|n>1#ExamQuestions',
            'Exercise' => 'n==0#Exercise(s)|n==1#Exercise|n>1#Exercises',
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
                'Chapter' => array('slug', 'title', 'about', 'teachers_guide'),
                'DataChunk' => array('slug', 'title', 'about'),
                'DataSource' => array('slug', 'title', 'about'),
                'DownloadLink' => array('title'),
                'ExamQuestion' => array('slug', 'question'),
                'ExamQuestionAlternative' => array('markup'),
                'Exercise' => array('slug', 'title', 'question', 'description'),
                'HtmlChunk' => array('markup'),
                'Page' => array('slug', 'title', 'about'),
                'Section' => array('slug', 'title', 'menu_label'),
                'SlideshowFile' => array('slug', 'title', 'about'),
                'Snapshot' => array('slug', 'title', 'about'),
                'SpreadsheetFile' => array('title'),
                'TextDoc' => array('slug', 'title', 'about'),
                'Tool' => array('slug', 'title', 'about'),
                'VectorGraphic' => array('slug', 'title', 'about'),
                'VideoFile' => array('slug', 'title', 'about', 'subtitles'),
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
                'Chapter' => array('chapter_qa_state_id'),
                'DataChunk' => array('data_chunk_qa_state_id'),
                'DataSource' => array('data_source_qa_state_id'),
                'ExamQuestion' => array('exam_question_qa_state_id'),
                'Exercise' => array('exercise_qa_state_id'),
                'PoFile' => array('processed_media_id', 'po_file_qa_state_id'),
                'Profiles' => array('can_translate_to'),
                'SlideshowFile' => array('processed_media_id', 'slideshow_file_qa_state_id'),
                'Snapshot' => array('snapshot_qa_state_id'),
                'SpreadsheetFile' => array('processed_media_id'),
                'TextDoc' => array('processed_media_id', 'text_doc_qa_state_id'),
                'VectorGraphic' => array('processed_media_id', 'vector_graphic_qa_state_id'),
                'VideoFile' => array('processed_media_id', 'video_file_qa_state_id'),
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
                'TextDoc' => array('processedMedia' => 'processed_media_id', 'testDocQaState' => 'text_doc_qa_state_id'),
                'VectorGraphic' => array('processedMedia' => 'processed_media_id', 'vectorGraphicQaState' => 'vector_graphic_qa_state_id'),
                'VideoFile' => array('processedMedia' => 'processed_media_id', 'videoFileQaState' => 'video_file_qa_state_id'),
            ),
        );
    }

}

