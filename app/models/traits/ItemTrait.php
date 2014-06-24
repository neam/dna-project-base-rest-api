<?php

trait ItemTrait
{
    public $itemDescription;

    /**
     * Runtime cache for validation progress percentages.
     * @var array
     */
    public $validationProgress = array();

    public function saveWithChangeSet()
    {
        /** @var ActiveRecord|QaStateBehavior $model */
        $model = $this;

        // Refresh qa state (to be sure that we have the most actual state)
        $model->refreshQaState();

        // Start transaction
        /** @var CDbTransaction $transaction */
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
     * Checks if the item has a group.
     * @param string $group
     * @return boolean
     */
    public function belongsToGroup($group)
    {
        return PermissionHelper::nodeHasGroup(array(
            'node_id' => $this->node_id,
            'group_id' => PermissionHelper::groupNameToId($group),
        ));
    }

    /**
     * Make all related NodeHasGroup records visible.
     */
    public function makeNodeHasGroupVisible()
    {
        if (isset($this->node)) {
            $nhgs = $this->node->nodeHasGroups;

            if (!empty($nhgs)) {
                foreach ($nhgs as $nodeHasGroup) {
                    /** @var NodeHasGroup $nodeHasGroup */
                    $nodeHasGroup->makeVisible();
                }
            }
        }
    }

    /**
     * Make all related NodeHasGroup records hidden.
     */
    public function makeNodeHasGroupHidden()
    {
        if (isset($this->node)) {
            $nhgs = $this->node->nodeHasGroups;

            if (!empty($nhgs)) {
                foreach ($nhgs as $nodeHasGroup) {
                    /** @var NodeHasGroup $nodeHasGroup */
                    $nodeHasGroup->makeHidden();
                }
            }
        }
    }

    /**
     * @return array Status-dependent validation rules
     */
    public function statusRequirementsRules()
    {
        $statusRequirements = $this->statusRequirements();

        $statusRules = array();
        $statusRules['draft'] = array(implode(', ', $statusRequirements['draft']), 'required', 'on' => 'draft,reviewable,publishable');
        $statusRules['reviewable'] = array(implode(', ', $statusRequirements['reviewable']), 'required', 'on' => 'reviewable,publishable');
        $statusRules['publishable'] = array(implode(', ', $statusRequirements['publishable']), 'required', 'on' => 'publishable');

        // Manual fields that are required
        $statusRules[] = array('status', 'validStatusReviewable', 'on' => 'status_reviewable');
        $statusRules[] = array('status', 'validStatusPublishable', 'on' => 'status_publishable');

        return $statusRules;
    }

    /**
     * Checks if the item can be published.
     * @return boolean
     */
    public function isPublishable()
    {
        return $this->qaStateBehavior()->validStatus('publishable')
            && $this->belongsToAtLeastOneGroup()
            && !$this->isPublished();
    }

    /**
     * Checks if the item can be unpublished.
     * @return boolean
     */
    public function isUnpublishable()
    {
        return in_array($this->qaState()->status, array('public'))
            && $this->belongsToAtLeastOneGroup()
            && $this->isPublished();
    }

    /**
     * Checks if the item has been published.
     * @return boolean
     */
    public function isPublished()
    {
        // TODO: Improve this check.
        return $this->isVisible();
    }

    /**
     * Checks if the item is visible (to anonymous users).
     * @return boolean
     */
    public function isVisible()
    {
        $result = NodeHasGroup::model()->findAllByAttributes(array(
            'node_id' => $this->node_id,
            'visibility' => NodeHasGroup::VISIBILITY_VISIBLE,
        ));

        return !empty($result);
    }

    /**
     * Checks if the item belongs to at least one group.
     * @return boolean
     */
    public function belongsToAtLeastOneGroup()
    {
        $result = NodeHasGroup::model()->findAllByAttributes(array(
            'node_id' => $this->node_id,
        ));

        return !empty($result);
    }

    /**
     * Changes a model's QA status.
     * @param string $status
     * @throws SaveException
     */
    public function changeStatus($status)
    {
        $qaState = $this->qaState();
        $qaState->status = $status;

        if (!$qaState->save()) {
            throw new SaveException($qaState);
        }
    }

    public function validStatusReviewable($attribute, $params)
    {
        if ($this->qaState()->allow_review != 1) {
            $this->addError($attribute, Yii::t('app', 'Reviewing not marked as allowed'));
        }
    }

    public function validStatusPublishable($attribute, $params)
    {
        if ($this->qaState()->allow_publish != 1) {
            $this->addError($attribute, Yii::t('app', 'Publishing not marked as allowed'));
        }
    }

    /**
     * Returns the validation progress percentage for the given scenario (checks the runtime cache).
     * @param string $scenario
     * @return integer
     */
    public function getValidationProgress($scenario)
    {
        if (isset($this->validationProgress[$scenario])) {
            return $this->validationProgress[$scenario];
        }

        $this->validationProgress[$scenario] = $this->calculateValidationProgress($scenario);
        return $this->validationProgress[$scenario];
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
                $flowStepRules[] = array($field, 'safe', 'on' => implode("-step_$step,", array('temporary', 'draft', 'reviewable', 'publishable')) . "-step_$step,step_$step");
                if (in_array($field, $statusRequirements['draft'])) {
                    $onStatuses = array('draft', 'reviewable', 'publishable');
                }
                if (in_array($field, $statusRequirements['reviewable'])) {
                    $onStatuses = array('reviewable', 'publishable');
                }
                if (in_array($field, $statusRequirements['publishable'])) {
                    $onStatuses = array('publishable');
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
     * A currently translatable attribute is an attribute that is to be translated AND has some source contents to translate.
     * @return array
     */
    public function getCurrentlyTranslatableAttributes()
    {
        $currentlyTranslatableAttributes = array();

        $behaviors = $this->behaviors();

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
                $valid = isset($this->$sourceLanguageContentAttribute) && !is_null($this->$sourceLanguageContentAttribute);
                if ($valid) {
                    $currentlyTranslatableAttributes[] = $translationAttribute;
                }

            }
        }

        return $currentlyTranslatableAttributes;
    }

    /**
     * Translations are required if their source content counterpart is a string with some contents
     * @return array
     */
    public function i18nRules()
    {
        // Pick the first translatable attribute, if any
        $behaviors = $this->behaviors();
        $attribute = (isset($behaviors['i18n-attribute-messages']) ? $behaviors['i18n-attribute-messages']['translationAttributes'][0] :
            (isset($behaviors['i18n-columns']) ? $behaviors['i18n-columns']['translationAttributes'][0] : false)
        );

        // Do nothing if there are no attributes to translate at any time for this model
        if (!$attribute) {
            return array();
        }

        $currentlyTranslatableAttributes = $this->getCurrentlyTranslatableAttributes();

        // If there currently is nothing to translate, then the translation progress should equal 0%
        if (empty($currentlyTranslatableAttributes)) {

            // Add an always invalid status requirement for each language upon the first translatable attribute
            $i18nRules = array();
            foreach (LanguageHelper::getCodes() as $language) {
                $i18nRules[] = array($attribute, 'compare', 'compareValue' => -1, 'on' => 'translate_into_' . $language);

                foreach ($this->flowSteps() as $step => $fields) {
                    $i18nRules[] = array($attribute, 'compare', 'compareValue' => -1, 'on' => "into_$language-step_$step");
                }
            }

            // The result of the above is that there is at least one attribute in each language scenario, and that attribute does not validate, thus translation progress equals 0% as wanted
            return $i18nRules;
        }

        $i18nRules = array();

        foreach ($this->flowSteps() as $step => $fields) {
            foreach ($fields as $field) {
                $sourceLanguageContentAttribute = str_replace('_' . $this->source_language, '', $field);
                if (!in_array($sourceLanguageContentAttribute, $currentlyTranslatableAttributes)) {
                    continue;
                }
                foreach (LanguageHelper::getCodes() as $lang) {
                    $i18nRules[] = array($sourceLanguageContentAttribute . '_' . $lang, 'safe', 'on' => "into_$lang-step_$step");
                    $i18nRules[] = array($sourceLanguageContentAttribute . '_' . $this->source_language, 'safe', 'on' => "into_$lang-step_$step");
                    $i18nRules[] = array($sourceLanguageContentAttribute . '_' . $lang, 'required', 'on' => "into_$lang-step_$step");
                    $i18nRules[] = array($sourceLanguageContentAttribute . '_' . $lang, 'required', 'on' => "translate_into_$lang");
                }
            }
        }

        return $i18nRules;
    }

    /**
     * Returns invalid fields.
     * @param string $scenario
     * @return array
     */
    public function getInvalidFields($scenario)
    {
        // Work on a clone to not interfere with existing attributes and validation errors
        $model = clone $this;
        $model->scenario = $scenario;

        $attributes = $this->scenarioSpecificAttributes($scenario);
        $invalidFields = array();

        foreach ($attributes as $attribute) {
            $valid = $model->validate(array($attribute));

            if (!$valid) {
                $invalidFields[] = $attribute;
            }
        }

        return $invalidFields;
    }

    /**
     * Returns an action route.
     * @param string $action the controller action.
     * @param string $step
     * @param string|null $translateInto
     * @return array
     */
    public function getActionRoute($action, $step, $translateInto = null)
    {
        $route = array(
            $action,
            'id' => $this->{$this->tableSchema->primaryKey},
            'step' => $step,
        );

        if (!empty($translateInto)) {
            $route['translateInto'] = $translateInto;
        }

        return $route;
    }

    /**
     * Returns the *_qa_state_id attribute name of the current model.
     * @return string
     * @throws CException
     */
    public function getQaStateAttribute()
    {
        $modelClass = get_class($this);
        $attribute = $this->tableName() . '_qa_state_id';

        if ($this->hasAttribute($attribute)) {
            return $attribute;
        } else {
            throw new CException("$modelClass does not have an attribute '$attribute'.");
        }
    }

    /**
     * Renders an item image.
     * @param string $p3preset
     * @return string the HTML.
     */
    public function renderImage($p3preset = 'dashboard-item-task-thumbnail')
    {
        $presetConfig = Yii::app()->getModule('p3media')->params['presets'][$p3preset];

        $width = $presetConfig['commands']['resize'][0];
        $height = $presetConfig['commands']['resize'][1];

        return isset($this->thumbnail_media_id)
            ? $this->thumbnailMedia->image($p3preset)
            : TbHtml::image("http://placehold.it/{$width}x{$height}");
    }

    /**
     * Checks an item models access relative to the user.
     * @param string $operation
     * @return boolean
     */
    public function checkAccess($operation)
    {
        return Yii::app()->user->checkAccess(get_class($this) . '.' . $operation, array('id' => $this->{$this->tableSchema->primaryKey}));
    }

    /**
     * Returns the first workflow step of this item.
     * @return string|null
     */
    public function firstFlowStep()
    {
        // Return the step defined in the model class (if it has been set).
        if (isset($this->firstFlowStep)) {
            return $this->firstFlowStep;
        }

        // Return the first index in the steps array.
        foreach ($this->flowSteps() as $step => $fields) {
            return $step;
        }

        return null;
    }

    /**
     * Returns the first step in the translation workflow. Falls back to ItemTrait::firstFlowStep().
     * @return string
     */
    public function firstTranslationFlowStep()
    {
        return (isset($this->firstTranslationFlowStep))
            ? $this->firstTranslationFlowStep
            : $this->firstFlowStep();
    }

}
