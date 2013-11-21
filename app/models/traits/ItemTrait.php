<?php

trait ItemTrait
{

    /**
     * @return array Status-dependent validation rules
     */
    public function statusRequirementsRules()
    {
        $statusRequirements = $this->statusRequirements();

        $statusRules = array();
        $statusRules['draft'] = array(implode(', ', $statusRequirements['draft']), 'required', 'on' => 'draft,preview,public');
        $statusRules['preview'] = array(implode(', ', $statusRequirements['preview']), 'required', 'on' => 'preview,public');
        $statusRules['public'] = array(implode(', ', $statusRequirements['public']), 'required', 'on' => 'public');

        return $statusRules;
    }

    public function flowStepRules()
    {

        // Metadata
        $flowSteps = $this->flowSteps();
        $statusRequirements = $this->statusRequirements();

        // Combine above to flow/step-dependent validation rules
        $flowStepRules = array();
        foreach ($flowSteps as $step => $fields) {

            foreach ($fields as $field) {
                $onStatuses = array();
                $flowStepRules[] = array($field, 'safe', 'on' => implode("-step_$step,", array('draft', 'preview', 'public')) . "-step_$step,step_$step");
                if (in_array($field, $statusRequirements['draft'])) {
                    $onStatuses = array('draft', 'preview', 'public');
                }
                if (in_array($field, $statusRequirements['preview'])) {
                    $onStatuses = array('preview', 'public');
                }
                if (in_array($field, $statusRequirements['public'])) {
                    $onStatuses = array('public');
                }
                $flowStepRules[] = array($field, 'required', 'on' => implode("-step_$step,", $onStatuses) . "-step_$step,step_$step");
            }

        }

        return $flowStepRules;

    }

} 