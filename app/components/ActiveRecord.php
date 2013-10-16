<?php

class ActiveRecord extends CActiveRecord
{

    public function behaviors()
    {

        $behaviors = array();

        if (!in_array(get_class($this), array("Workflow"))) {
            $behaviors['CTimestampBehavior'] = array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'modified',
            );
        }

        // List of models with workflows attached
        $workflowsMap = array(
            'Chapter' => array(),
            'VideoFile' => array(),
        );

        if (isset($workflowsMap[get_class($this)])) {
            $behaviors['ezc-workflow'] = array(
                'class' => 'EzcWorkflowBehavior',
                'workflowName' => get_class($this) . 'AuthoringWorkflow',
            );
        }

        // List of model attributes to translate
        $translateMap = array(
            'Chapter' => array('slug', 'title', 'about', 'authoring_workflow_execution_id'),
            'DataChunk' => array('slug', 'title', 'about'),
            'DataSource' => array('slug', 'title', 'about'),
            'DownloadLink' => array('title'),
            'ExamQuestion' => array('slug', 'question'),
            'ExamQuestionAlternative' => array('markup'),
            'Exercise' => array('slug', 'title', 'question', 'description'),
            'HtmlChunk' => array('markup'),
            'PoFile' => array('processed_media_id'),
            'Presentation' => array('title'),
            'Section' => array('slug', 'title', 'menu_label'),
            'SlideshowFile' => array('slug', 'title', 'about', 'processed_media_id'),
            'Snapshot' => array('slug', 'title', 'about'),
            'SpreadsheetFile' => array('title', 'processed_media_id'),
            'TeachersGuide' => array('title'),
            'TextDoc' => array('slug', 'title', 'about', 'processed_media_id'),
            'Tool' => array('slug', 'title', 'about'),
            'VectorGraphic' => array('slug', 'title', 'about', 'processed_media_id'),
            'VideoFile' => array('slug', 'title', 'about', 'subtitles', 'processed_media_id', 'authoring_workflow_execution_id'),
        );

        $multilingualRelationsMap = array(
            'Chapter' => array('authoringWorkflowExecution' => 'authoring_workflow_execution_id'),
            'SlideshowFile' => array('processedMedia' => 'processed_media_id'),
            'SpreadsheetFile' => array('processedMedia' => 'processed_media_id'),
            'VideoFile' => array('processedMedia' => 'processed_media_id', 'authoringWorkflowExecution' => 'authoring_workflow_execution_id'),
            'WordFile' => array('processedMedia' => 'processed_media_id'),
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