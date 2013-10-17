<?php

class ItemWorkflow
{
    private $workflow;
    private $process_steps = array();

    function buildWorkflow($name, $inMemory = false)
    {
        $this->workflow = new ezcWorkflow($name);
        $this->buildProcessSteps($inMemory);
        $this->connectProcessSteps();

        return $this->workflow;
    }

    function buildProcessSteps($inMemory)
    {
        // Do not store custom classes if not in memory only
        $nodeInputClass = $inMemory ? "gcmsLabeledWorkflowNodeInput" : "ezcWorkflowNodeInput";

        $split = new ezcWorkflowNodeParallelSplit();

        $this->process_steps['construct'] = new $nodeInputClass(array(
            'modelClass' => new ezcWorkflowConditionIsAnything(),
            'id' => new ezcWorkflowConditionIsAnything(),
        ));

        /*
        $this->process_steps['split'] = new ezcWorkflowNodeParallelSplit();

        // Check-progress-loop
        $this->process_steps['merge'] = new ezcWorkflowNodeSimpleMerge();
        $this->process_steps['do_check_progress'] = new $nodeInputClass(array(
            'do_check_progress' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['check_progress'] = new ezcWorkflowNodeAction(array(
            'class' => 'gcmsCheckProgressServiceObject',
            'arguments' => array()
        ));
        */

        // Authoring workflow
        $this->process_steps['new'] = new $nodeInputClass(array(
            'draft' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['draft'] = new $nodeInputClass(array(
            'previewable' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['preview'] = new $nodeInputClass(array(
            'publishable' => new ezcWorkflowConditionIsTrue(),
            'candidate' => new ezcWorkflowConditionIsTrue(),
            'approved' => new ezcWorkflowConditionIsTrue(),
            'proofed' => new ezcWorkflowConditionIsTrue(),
            'translated' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['public'] = new $nodeInputClass(array(
            'replaced' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['replaced'] = new $nodeInputClass(array(
            'stayhere' => new ezcWorkflowConditionIsFalse(),
        ));
    }

    function connectProcessSteps()
    {
        $this->workflow->startNode->addOutNode($this->process_steps['construct']);

        $this->process_steps['construct']->addOutNode($this->process_steps['new']);

        /*
        $this->process_steps['construct']->addOutNode($this->process_steps['split']);
        $this->process_steps['split']->addOutNode($this->process_steps['merge']);

        // Check-progress action loop
        $this->process_steps['merge']->addOutNode($this->process_steps['do_check_progress']);
        $this->process_steps['do_check_progress']->addOutNode($this->process_steps['check_progress']);
        $this->process_steps['check_progress']->addOutNode($this->process_steps['merge']);


        $this->process_steps['split']->addOutNode($this->process_steps['new']);
        */

        // Authoring workflow
        $this->process_steps['new']->addOutNode($this->process_steps['draft']);
        $this->process_steps['draft']->addOutNode($this->process_steps['preview']);
        $this->process_steps['preview']->addOutNode($this->process_steps['public']);
        $this->process_steps['public']->addOutNode($this->process_steps['replaced']);

        $this->workflow->endNode->addInNode($this->process_steps['replaced']);
    }

}

