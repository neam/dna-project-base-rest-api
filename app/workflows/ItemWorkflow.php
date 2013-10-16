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
        $nodeInputClass = $inMemory ? "gscmsLabeledWorkflowNodeInput" : "ezcWorkflowNodeInput";

        $this->process_steps['new'] = new $nodeInputClass(array(
            'Label: New' => new ezcWorkflowConditionIsAnything(),
            'draft' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['draft'] = new $nodeInputClass(array(
            'Label: Draft' => new ezcWorkflowConditionIsAnything(),
            'previewable' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['preview'] = new $nodeInputClass(array(
            'Label: Preview' => new ezcWorkflowConditionIsAnything(),
            'publishable' => new ezcWorkflowConditionIsTrue(),
            'candidate' => new ezcWorkflowConditionIsTrue(),
            'approved' => new ezcWorkflowConditionIsTrue(),
            'proofed' => new ezcWorkflowConditionIsTrue(),
            'translated' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['public'] = new $nodeInputClass(array(
            'Label: Public' => new ezcWorkflowConditionIsAnything(),
            'replaced' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['replaced'] = new $nodeInputClass(array(
            'Label: Replaced' => new ezcWorkflowConditionIsAnything(),
            'stayhere' => new ezcWorkflowConditionIsFalse(),
        ));
    }

    function connectProcessSteps()
    {
        $this->workflow->startNode->addOutNode($this->process_steps['new']);

        $this->process_steps['new']->addOutNode($this->process_steps['draft']);
        $this->process_steps['draft']->addOutNode($this->process_steps['preview']);
        $this->process_steps['preview']->addOutNode($this->process_steps['public']);
        $this->process_steps['public']->addOutNode($this->process_steps['replaced']);

        $this->workflow->endNode->addInNode($this->process_steps['replaced']);
    }

}

