<?php

class VideoFileTranslationWorkflow
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
        
        $this->process_steps['approved_for_translation'] = new $nodeInputClass(array(
            'Label: approved_for_translation' => new ezcWorkflowConditionIsAnything(),
            'continue_from_approved_for_translation' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['translate_subtitles'] = new $nodeInputClass(array(
            'Label: translate_subtitles' => new ezcWorkflowConditionIsAnything(),
            'continue_from_write_subtitles' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['translate_title_and_about'] = new $nodeInputClass(array(
            'Label: translate_title_and_about' => new ezcWorkflowConditionIsAnything(),
            'continue_from_create_sales_order' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['mark_as_translated'] = new $nodeInputClass(array(
            'Label: approved_for_translation' => new ezcWorkflowConditionIsAnything(),
            'continue_from_create_invoice' => new ezcWorkflowConditionIsTrue(),
        ));
    }

    function connectProcessSteps()
    {
        $this->workflow->startNode->addOutNode($this->process_steps['approved_for_translation']);

        $this->process_steps['approved_for_translation']->addOutNode($this->process_steps['translate_subtitles']);
        $this->process_steps['translate_subtitles']->addOutNode($this->process_steps['translate_title_and_about']);
        $this->process_steps['translate_title_and_about']->addOutNode($this->process_steps['mark_as_translated']);

        $this->workflow->endNode->addInNode($this->process_steps['mark_as_translated']);
    }

    public function getGraphvizSyntax()
    {

        $visitor = new ezcWorkflowVisitorVisualization;
        $this->workflow->accept($visitor);
        $graphVizSyntax = (string) $visitor;

        return $graphVizSyntax;

    }

}

