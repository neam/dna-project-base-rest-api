<?php

class ActiveRecord extends CActiveRecord
{

    public function behaviors()
    {

        $behaviors = array();

        if (!in_array(get_class($this), array("Workflow")) && strpos(get_class($this), "QaState") === false) {
            $behaviors['CTimestampBehavior'] = array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'modified',
            );
        }

        // List of models using qa attributes behavior
        $qaModels = array(
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

        if (isset($qaModels[get_class($this)])) {
            $behaviors['qa-attributes'] = array(
                'class' => 'QaAttributesBehavior',
            );
        }

        // List of model attributes to translate
        $translateMap = array(
            'Chapter' => array('slug', 'title', 'about', 'chapter_qa_state_id'),
            'DataChunk' => array('slug', 'title', 'about', 'data_chunk_qa_state_id'),
            'DataSource' => array('slug', 'title', 'about', 'data_source_qa_state_id'),
            'DownloadLink' => array('title'),
            'ExamQuestion' => array('slug', 'question', 'exam_question_qa_state_id'),
            'ExamQuestionAlternative' => array('markup'),
            'Exercise' => array('slug', 'title', 'question', 'description', 'exercise_qa_state_id'),
            'HtmlChunk' => array('markup'),
            'PoFile' => array('processed_media_id', 'po_file_qa_state_id'),
            'Section' => array('slug', 'title', 'menu_label'),
            'SlideshowFile' => array('slug', 'title', 'about', 'processed_media_id', 'slideshow_file_qa_state_id'),
            'Snapshot' => array('slug', 'title', 'about', 'snapshot_qa_state_id'),
            'SpreadsheetFile' => array('title', 'processed_media_id'),
            'TeachersGuide' => array('title'),
            'TextDoc' => array('slug', 'title', 'about', 'processed_media_id', 'text_doc_qa_state_id'),
            'Tool' => array('slug', 'title', 'about'),
            'VectorGraphic' => array('slug', 'title', 'about', 'processed_media_id', 'vector_graphic_qa_state_id'),
            'VideoFile' => array('slug', 'title', 'about', 'subtitles', 'processed_media_id', 'video_file_qa_state_id'),
        );

        $multilingualRelationsMap = array(
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

        );

        if (isset($translateMap[get_class($this)])) {
            $behaviors['i18n-columns'] = array(
                'class' => 'I18nColumnsBehavior',
                'translationAttributes' => $translateMap[get_class($this)],
            );
        }

        if (isset($multilingualRelationsMap[get_class($this)])) {
            $behaviors['i18n-columns']['multilingualRelations'] = $multilingualRelationsMap[get_class($this)];
        }

        return array_merge(parent::behaviors(), $behaviors);
    }

}