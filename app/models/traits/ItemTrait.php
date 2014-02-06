<?php

trait ItemTrait
{
    public $itemDescription;

    public function saveWithChangeSet()
    {

        $model = $this;

        // refresh qa state (to be sure that we have the most actual state)
        $model->refreshQaState();

        // start transaction
        $transaction = Yii::app()->db->beginTransaction();

        try {

            $qsStates = array();
            $qsStates["before"] = $model->qaState()->attributes;

            // save
            if (!$model->save()) {
                throw new SaveException($model);
            }

            // refresh qa state
            $model->refreshQaState();
            $qsStates["after"] = $model->qaState()->attributes;

            // calculate difference
            $qsStates["diff"] = array_diff_assoc($qsStates["before"], $qsStates["after"]);

            // log for dev purposes
            Yii::log("Changeset: " . print_r($qsStates, true), "flow", __METHOD__);

            // save changeset
            $changeset = new Changeset();
            $changeset->contents = json_encode($qsStates);
            $changeset->user_id = Yii::app()->user->id;
            $changeset->node_id = $model->node()->id;
            if (!$changeset->save()) {
                throw new SaveException($changeset);
            }

            // commit transaction
            $transaction->commit();

        } catch (Exception $e) {
            $model->addError('id', $e->getMessage());
            $transaction->rollback();
        }

    }

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

        // Manual fields that are required
        $statusRules[] = array('status', 'validStatusPreview', 'on' => 'status_preview');
        $statusRules[] = array('status', 'validStatusPublic', 'on' => 'status_public');

        return $statusRules;
    }

    public function validStatusPreview($attribute, $params)
    {
        if ($this->qaState()->previewing_welcome != 1) {
            $this->addError($attribute, Yii::t('app', 'Not marked as testable'));
        }
    }

    public function validStatusPublic($attribute, $params)
    {
        if ($this->qaState()->candidate_for_public_status != 1) {
            $this->addError($attribute, Yii::t('app', 'Not marked as candidate'));
        }
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

        // If there is nothing to translate, then the translation progress should equal 0%
        if (empty($currentlyTranslatableAttributes)) {

            // Add an always invalid status requirement for each language
            $i18nRules = array();
            foreach (Yii::app()->params["languages"] as $language => $label) {
                $i18nRules[] = array('id', 'compare', 'compareValue' => -1, 'on' => 'translate_into_' . $language);
            }

            return $i18nRules;

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
                    $i18nRules[] = array($sourceLanguageContentAttribute . '_' . $lang, 'required', 'on' => "translate_into_$lang");
                }
            }
        }

        return $i18nRules;
    }
}
