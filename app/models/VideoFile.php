<?php

// auto-loading
Yii::setPathOfAlias('VideoFile', dirname(__FILE__));
Yii::import('VideoFile.*');

class VideoFile extends BaseVideoFile
{

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return parent::getItemLabel();
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array());
    }

    public function rules()
    {
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }

    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord || is_null($this->workflow_id)) {

                // Set up database connection.
                $db = ezcDbFactory::create('mysql://' . YII_DB_USER . ':' . YII_DB_PASSWORD . '@' . YII_DB_HOST . '/' . YII_DB_NAME);

                // Set up workflow definition storage (database).
                $definition = new ezcWorkflowDatabaseDefinitionStorage($db);

                // Authoring workflow
                // todo

                // Translation workflows
                foreach (Yii::app()->langHandler->languages as $lang) {

                    // Get workflow definition
                    $workflow = $this->buildTranslationWorkflow($lang);

                    // Set metadata in translation workflow marking who created the object
                    // todo

                    // Save workflow definition to database.
                    $definition->save($workflow);

                    // Store the workflow id in the current item
                    $attribute = "translation_workflow_id_" . $lang;
                    $this->$attribute = $workflow->id;

                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function buildTranslationWorkflow($lang)
    {

        Yii::import('application.workflows.VideoFileTranslationWorkflow');
        $definition = new VideoFileTranslationWorkflow();
        return $definition->buildWorkflow("VideoFileTranslationWorkflow_{$lang}_" . uniqid());

    }

}

