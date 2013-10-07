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

    protected function initiateWorkflowExecutions()
    {

                // Set up database connection.
        $db =& Yii::app()->ezc->db;

                // Set up workflow definition storage (database).
                $definition = new ezcWorkflowDatabaseDefinitionStorage($db);

                // Authoring workflow
                if (is_null($this->authoring_workflow_execution_id)) {
                    // todo

                }

                // Translation workflows
                foreach (Yii::app()->langHandler->languages as $lang) {

                    $attribute = "translation_workflow_execution_id_" . $lang;

                    if (!is_null($this->$attribute)) {
                        continue;
                    }

                    // todo - come up with nifty way of updating workflows when necessary
                    try {

                        // Load latest version of the relevant workflow
                        $workflow = $definition->loadByName('VideoFileTranslationWorkflow');

                    } catch (ezcWorkflowDefinitionStorageException $e) {

                        // Get workflow definition
                        $workflow = $this->buildTranslationWorkflow('VideoFileTranslationWorkflow');

                        // Save workflow definition to database.
                        $definition->save($workflow);

                        // Load latest version of workflow
                        $workflow = $definition->loadByName('VideoFileTranslationWorkflow');

                    }

                    // Set up database-based workflow executer.
                    $execution = new ezcWorkflowDatabaseExecution($db);

                    // Pass workflow object to workflow executer.
                    $execution->workflow = $workflow;

                    // Set metadata in translation workflow execution marking who created the object
                    // todo

                    // Start workflow execution.
                    $id = $execution->start();

                    // Store the workflow id in the current item
                    $this->$attribute = $id;

                }
            }

    protected function beforeSave()
    {
        if (parent::beforeSave()) {

            // todo - better check to only load workflow db definition when necessary
            if (true) {

                $this->initiateWorkflowExecutions();


            }
            return true;
        } else {
            return false;
        }
    }

    public function buildTranslationWorkflow($name)
    {

        Yii::import('application.workflows.' . $name);
        $definition = new $name();
        return $definition->buildWorkflow($name);

    }

}

