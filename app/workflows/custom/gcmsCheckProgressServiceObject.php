<?php

class gcmsCheckProgressServiceObject implements ezcWorkflowServiceObject
{

    public function __construct()
    {
    }

    public function execute(ezcWorkflowExecution $execution)
    {

        // Load model
        $modelClass = $execution->getVariable('modelClass');
        $id = $execution->getVariable('id');

        // Check draft progress

        // Check preview progress

        // Check publish progress

        //$execution->setVariable('draft', true);

        Yii::log("modelClass {$modelClass}, id {$id}", 'flow', __METHOD__);
        Yii::log(print_r($execution->getWaitingFor(), true), 'flow', __METHOD__);
        Yii::log(print_r($execution->getVariables(), true), 'flow', __METHOD__);

        // Return true to signal that the service object has finished executing.
        return true;
    }

    public function __toString()
    {
        return "gcmsCheckProgressServiceObject";
    }
}

?>