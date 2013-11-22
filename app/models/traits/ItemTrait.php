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
                if (!empty($onStatuses)) {
                    $flowStepRules[] = array($field, 'required', 'on' => implode("-step_$step,", $onStatuses) . "-step_$step,step_$step");
                }
                $flowStepRules[] = array($field, 'required', 'on' => "step_$step-total_progress");
            }

        }

        return $flowStepRules;

    }

    /**
     * Translations are required if their source content counterpart is a string with some contents
     * @return array
     */
    public function i18nRules()
    {
        $behaviors = $this->behaviors();

        $currentlyTranslatableAttributes = array();

        // i18n-attribute-messages
        if (isset($behaviors['i18n-attribute-messages'])) {
            foreach ($behaviors['i18n-attribute-messages']['translationAttributes'] as $translationAttribute) {

                $sourceLanguageContentAttribute = "_" . $translationAttribute;
                $valid = !is_null($this->$sourceLanguageContentAttribute);
                if ($valid) {
                    $currentlyTranslatableAttributes[] = $translationAttribute;
                }

            }
        }

        // i18n-columns
        if (isset($behaviors['i18n-columns'])) {
            foreach ($behaviors['i18n-columns']['translationAttributes'] as $translationAttribute) {

                $sourceLanguageContentAttribute = $translationAttribute . "_" . $this->source_language;
                $valid = !is_null($this->$sourceLanguageContentAttribute);
                if ($valid) {
                    $currentlyTranslatableAttributes[] = $translationAttribute;
                }

            }
        }

        if (empty($currentlyTranslatableAttributes)) {
            return array();
        }

        $i18nRules = array();

        foreach ($this->flowSteps() as $step => $fields) {
            foreach ($fields as $field) {
                $sourceLanguageContentAttribute = str_replace('_' . $this->source_language, '', $field);
                if (!in_array($sourceLanguageContentAttribute, $currentlyTranslatableAttributes)) {
                    continue;
                }
                foreach (Yii::app()->params["languages"] as $lang => $label) {
                    $i18nRules[] = array($sourceLanguageContentAttribute . '_' . $lang, 'safe', 'on' => "into_$lang-step_$step");
                    $i18nRules[] = array($sourceLanguageContentAttribute . '_' . $this->source_language, 'safe', 'on' => "into_$lang-step_$step");
                    $i18nRules[] = array($sourceLanguageContentAttribute . '_' . $lang, 'required', 'on' => "into_$lang-total_progress");
                }
            }
        }

        return $i18nRules;
    }

} 