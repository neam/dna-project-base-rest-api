<?php

class ActiveRecord extends CActiveRecord
{

    public function behaviors()
    {

        $behaviors = array();

        $behaviors['CTimestampBehavior'] = array(
            'class' => 'zii.behaviors.CTimestampBehavior',
            'createAttribute' => 'created',
            'updateAttribute' => 'modified',
        );

        // List of model attributes to translate
        $translateMap = array(
            'Chapter' => array('slug', 'title'),
            'DataChunk' => array('title'),
            'DataSource' => array('title'),
            'DownloadLink' => array('title'),
            'Exercise' => array('title'),
            'HtmlChunk' => array('markup'),
            'Presentation' => array('title'),
            'Section' => array('slug', 'title', 'menu_label'),
            'SlideshowFile' => array('title', 'processed_media_id'),
            'SpreadsheetFile' => array('title', 'processed_media_id'),
            'TeachersGuide' => array('title'),
            'VideoFile' => array('title', 'subtitles', 'processed_media_id', 'translation_workflow_execution_id'),
            'VizView' => array('title'),
            'WordFile' => array('title', 'processed_media_id'),
        );

        $multilingualRelationsMap = array(
            'SlideshowFile' => array('processedMedia' => 'processed_media_id'),
            'SpreadsheetFile' => array('processedMedia' => 'processed_media_id'),
            'VideoFile' => array('processedMedia' => 'processed_media_id', 'translationWorkflowExecution' => 'translation_workflow_execution_id'),
            'WordFile' => array('processedMedia' => 'processed_media_id'),
        );

        $translatedRelationsMap = array();

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