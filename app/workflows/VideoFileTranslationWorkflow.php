<?php

class VideoFileTranslationWorkflow
{
    private $workflow;
    private $process_steps = array();

    function setWorkflow($workflow)
    {
        $this->workflow = $workflow;
        return $this;
    }

    function buildWorkflow($name)
    {
        $this->workflow = new ezcWorkflow($name);
        $this->buildProcessSteps();
        $this->connectProcessSteps();

        return $this->workflow;
    }

    function buildProcessSteps()
    {
        $this->process_steps['approved_for_translation'] = new LabeledWorkflowNodeInput(array(
            'label' => 'approved_for_translation',
            'continue_from_approved_for_translation' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['translate_subtitles'] = new LabeledWorkflowNodeInput(array(
            'label' => 'translate_subtitles',
            'continue_from_write_subtitles' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['translate_title_and_about'] = new LabeledWorkflowNodeInput(array(
            'label' => 'translate_title_and_about',
            'continue_from_create_sales_order' => new ezcWorkflowConditionIsTrue(),
        ));
        $this->process_steps['mark_as_translated'] = new LabeledWorkflowNodeInput(array(
            'label' => 'mark_as_translated',
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

