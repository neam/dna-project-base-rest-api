<?php

/**
 * EzcWorkflowBehavior
 *
 * @uses CActiveRecordBehavior
 * @license MIT
 * @author See https://github.com/neam/yii-ezc/graphs/contributors
 */
class EzcWorkflowBehavior extends CActiveRecordBehavior
{

    public $workflowName;

    /**
     * @param CActiveRecord $owner
     * @throws Exception
     */
    public function attach($owner)
    {
        parent::attach($owner);
        if (!($owner instanceof CActiveRecord)) {
            throw new Exception('Owner must be a CActiveRecord class');
        }
        if (empty($this->workflowName)) {
            throw new Exception('workflowName must be specified');
        }
    }

    public function beforeSave($event)
    {

        // todo - better check to only load workflow db definition when necessary
        $this->initiateWorkflowExecutions();

    }

    protected function initiateWorkflowExecutions()
    {

        // Authoring workflows - one for each language
        foreach (Yii::app()->langHandler->languages as $lang) {

            $attribute = "authoring_workflow_execution_id_" . $lang;
            $this->initiateWorkflowExecution($attribute, $this->workflowName);

        }

    }

    private function initiateWorkflowExecution($attribute, $name)
    {

        if (!is_null($this->owner->$attribute)) {
            return;
        }

        // Set up workflow definition storage (database).
        $definition = Yii::app()->ezc->getWorkflowDatabaseDefinitionStorage();

        // todo - come up with nifty way of updating workflows when necessary
        try {

            // Load latest version of the relevant workflow
            $workflow = $definition->loadByName($name);

        } catch (ezcWorkflowDefinitionStorageException $e) {

            // Build the current workflow
            $workflow = Yii::app()->ezc->buildWorkflow($name);

            // Save workflow definition to database.
            $definition->save($workflow);

            // Load latest version of workflow
            $workflow = $definition->loadByName($name);

        }

        // Set up database-based workflow executer.
        $execution = Yii::app()->ezc->getWorkflowDatabaseExecution();

        // Pass workflow object to workflow executer.
        $execution->workflow = $workflow;

        // Set metadata in workflow execution marking who created the object
        // todo

        // Start workflow execution.
        $id = $execution->start();

        /*
        // Supply modelClass
        $execution->resume(
            array(
                'modelClass' => get_class($this->owner),
            )
        );
        */

        // Store the workflow id in the current item
        $this->owner->$attribute = $id;

    }

}
