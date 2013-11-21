<?php

trait ItemController
{

    public function itemAccessRules()
    {
        return array(
            array('allow',
                'actions' => array(
                    'continueAuthoring',
                    'nextRequired',
                    'go',
                    'cancel',
                ),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array(
                    'add',
                ),
                'roles' => array(
                    'Item.Add'
                ),
            ),
            array('allow',
                'actions' => array(
                    'draft',
                    'saveDraft',
                ),
                'roles' => array(
                    'Item.Draft'
                ),
            ),
            array('allow',
                'actions' => array(
                    'addEdges',
                    'deleteEdge',
                ),
                'roles' => array(
                    'Item.DeleteEdge'
                ),
            ),
            array('allow',
                'actions' => array(
                    'prepPreshow',
                    'makeCandidate',
                ),
                'roles' => array(
                    'Item.PrepPreshow'
                ),
            ),
            array('allow',
                'actions' => array(
                    'makeTestable',
                ),
                'roles' => array(
                    'Item.Preshow'
                ),
            ),
            array('allow',
                'actions' => array(
                    'evaluate',
                ),
                'roles' => array(
                    'Item.Evaluate'
                ),
            ),
            array('allow',
                'actions' => array(
                    'prepPublish',
                ),
                'roles' => array(
                    'Item.PrepPublish'
                ),
            ),
            array('allow',
                'actions' => array(
                    'preview',
                ),
                'roles' => array(
                    'Item.Preview'
                ),
            ),
            array('allow',
                'actions' => array(
                    'review',
                ),
                'roles' => array(
                    'Item.Review'
                ),
            ),
            array('allow',
                'actions' => array(
                    'prepPreshow',
                ),
                'roles' => array(
                    'Item.PrepPreshow'
                ),
            ),
            array('allow',
                'actions' => array(
                    'proofRead',
                ),
                'roles' => array(
                    'Item.ProofRead'
                ),
            ),
            array('allow',
                'actions' => array(
                    'translate',
                    'translationOverview',
                ),
                'roles' => array(
                    'Item.Translate'
                ),
            ),
            array('allow',
                'actions' => array(
                    'publish',
                ),
                'roles' => array(
                    'Item.Publish'
                ),
            ),
            array('allow',
                'actions' => array(
                    'edit',
                ),
                'roles' => array(
                    'Item.Edit'
                ),
            ),
            array('allow',
                'actions' => array(
                    'clone',
                ),
                'roles' => array(
                    'Item.Clone'
                ),
            ),
            array('allow',
                'actions' => array(
                    'remove',
                ),
                'roles' => array(
                    'Item.Remove'
                ),
            ),
            array('allow',
                'actions' => array(
                    'replace',
                ),
                'roles' => array(
                    'Item.Replace'
                ),
            ),
        );
    }

    public function actionContinueAuthoring($id)
    {

        $model = $this->loadModel($id);
        $step = $this->firstFlowStep($model);
        $this->redirect(array('edit', 'id' => $model->id, 'step' => $step));

    }

    /**
     * Action that redirects to the next relevant workflow based on the item's qa state
     * Note: Not currently used
     * @param $id
     */
    public function actionHelpOut($id)
    {

        $model = $this->loadModel($id);
        /*
        if (($model->qaState()->draft_validation_progress < 100 || !$model->qaState()->draft_saved) && !is_null($step = $this->nextFlowStep("draft-", $model))) {
            $this->redirect(array('draft', 'id' => $model->id, 'step' => $step));
            return;
        }
        */
        if (($model->qaState()->preview_validation_progress < 100 || !$model->qaState()->previewing_welcome) && !is_null($step = $this->nextFlowStep("preview-", $model))) {
            $this->redirect(array('prepPreshow', 'id' => $model->id, 'step' => $step));
            return;
        }
        if (($model->qaState()->public_validation_progress < 100 || !$model->qaState()->candidate_for_public_status) && !is_null($step = $this->nextFlowStep("public-", $model))) {
            $this->redirect(array('prepPublish', 'id' => $model->id, 'step' => $step));
            return;
        }
        if ($model->qaState()->draft_evaluation_progress < 100) {
            $this->redirect(array('evaluate', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->preview_evaluation_progress < 100) {
            $this->redirect(array('evaluate', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->public_evaluation_progress < 100) {
            $this->redirect(array('evaluate', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->approval_progress < 100) {
            $this->redirect(array('review', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->proofing_progress < 100) {
            $this->redirect(array('proofRead', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->translations_draft_validation_progress < 100) {
            $this->redirect(array('translate', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->translations_preview_validation_progress < 100) {
            $this->redirect(array('translate', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->translations_public_validation_progress < 100) {
            $this->redirect(array('translate', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->translations_approval_progress < 100) {
            $this->redirect(array('translate', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->translations_proofing_progress < 100) {
            $this->redirect(array('translate', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->status != "public") {
            $this->redirect(array('publish', 'id' => $model->id));
            return;
        }

        $this->actionContinueAuthoring($id);
        return;

    }

    protected function nextFlowStep($prefix, $item)
    {
        $steps = $item->flowSteps();
        foreach (array_merge($steps['draft'], $steps['preview'], $steps['public'], $steps['all']) as $step => $options) {
            if ($item->calculateValidationProgress($prefix . 'step_' . $step) < 100) {
                return $step;
            }
            $item->clearErrors();
        }
        return null;
    }

    protected function firstFlowStep($item)
    {
        $steps = $item->flowSteps();
        foreach (array_merge($steps['draft'], $steps['preview'], $steps['public'], $steps['all']) as $step => $options) {
            return $step;
        }
        return null;
    }

    public function actionAdd()
    {
        $item = new $this->modelClass();
        if (!$item->save()) {
            throw new SaveException($item);
        }
        $message = "{$this->modelClass} Added";

        // If fromId is set, we assume this is a new Item which will be related:
        if (isset($_GET["fromId"]) && is_numeric($_GET["fromId"])) {
            $fromModel = $_GET["fromModel"];
            $fromId = $_GET["fromId"];
            $to_node_id = $item->node_id;

            $_model = $fromModel::model()->findByPk($fromId);
            $from_node_id = $_model->node()->id;

            $this->addEdge($from_node_id, $to_node_id);

            if (isset($_GET["returnUrl"])) {
                $this->redirect($_GET['returnUrl']);
            }
            return;
        }
        Yii::app()->user->setFlash('success', $message);
        $this->redirect(array('continueAuthoring', 'id' => $item->id));
    }

    public function actionAddEdges()
    {
        if (isset($_POST[$this->modelClass]["fromId"]) && isset($_POST[$this->modelClass]["edges_to_add"]) && isset($_POST[$this->modelClass]["toModel"])) {
            $this->addEdges(
                $_POST[$this->modelClass]["fromId"],
                $_POST[$this->modelClass]["edges_to_add"],
                $_POST[$this->modelClass]["toModel"]
            );
        }
        exit;
    }

    public function actionDeleteEdge()
    {
        $from = $_GET["from"];
        $to = $_GET["to"];
        $del = Edge::model()->deleteAll(
            'from_node_id=:from_node_id AND to_node_id=:to_node_id',
            array(
                ':from_node_id' => $from,
                ':to_node_id' => $to,
            )
        );
        if ($del) {
            $message = "Relation deleted";
        } else {
            $message = "Unable to delete relation";
        }
        if (isset($_GET['returnUrl'])) {
            $delimiter = (strpos($_GET['returnUrl'], "?") !== false) ? "&" : "?";
            $this->redirect($_GET['returnUrl'] . $delimiter . "message=$message");
        }
    }

    public function actionDraft($step, $id)
    {
        $this->scenario = "draft-step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => $step, 'stepCaption' => $stepCaptions[$step]));
    }

    /*
    public function actionSaveDraft($id)
    {
        $model = $this->loadModel($id);
        $qaState = $model->qaState();

        // save state change
        $qaState->draft_saved = 1;
        if (!$qaState->save()) {
            throw new SaveException($qaState);
        }

        // redirect
        if (isset($_GET['returnUrl'])) {
            $this->redirect($_GET['returnUrl']);
        } else {
            $this->redirect(array('continueAuthoring', 'id' => $model->id));
        }

    }
    */

    /**
     * Prepare for testing workflow
     * @param $step
     * @param $id
     */
    public function actionPrepPreshow($step, $id)
    {
        $this->scenario = "preview-step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
        $this->populateWorkflowData($model, "preview", Yii::t('app', 'Prepare for testing'));
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => $step, 'stepCaption' => $stepCaptions[$step]));
    }

    public function actionMakeTestable($id)
    {
        $model = $this->loadModel($id);
        $qaState = $model->qaState();

        // save state change
        $qaState->previewing_welcome = 1;
        if (!$qaState->save()) {
            throw new SaveException($qaState);
        }

        // redirect
        if (isset($_GET['returnUrl'])) {
            $this->redirect($_GET['returnUrl']);
        } else {
            $this->redirect(array('continueAuthoring', 'id' => $model->id));
        }

    }

    public function actionEvaluate($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/evaluate', array('model' => $model));
    }

    /**
     * Prepare for publishing workflow
     * @param $step
     * @param $id
     */
    public function actionPrepPublish($step, $id)
    {
        $this->scenario = "public-step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
        $this->populateWorkflowData($model, "public", Yii::t('app', 'Prepare for publishing'));
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => $step, 'stepCaption' => $stepCaptions[$step]));
    }

    public function actionMakeCandidate($id)
    {
        $model = $this->loadModel($id);
        $qaState = $model->qaState();

        // save state change
        $qaState->candidate_for_public_status = 1;
        if (!$qaState->save()) {
            throw new SaveException($qaState);
        }

        // redirect
        if (isset($_GET['returnUrl'])) {
            $this->redirect($_GET['returnUrl']);
        } else {
            $this->redirect(array('continueAuthoring', 'id' => $model->id));
        }

    }

    public function actionPreview($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('view', array('model' => $model, 'preview' => true));
    }

    public function actionReview($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/review', array('model' => $model));
    }

    public function actionProofRead($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/proofread', array('model' => $model));
    }

    public function actionPublish($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/publish', array('model' => $model));
    }

    public function actionCancel($id)
    {
        $model = $this->loadModel($id);
        $step = $this->firstFlowStep($model);
        $this->redirect(array('edit', 'id' => $model->id, 'step' => $step));
    }

    /**
     * "Not-in-a-workflow"-workflow
     * @param $step
     * @param $id
     */
    public function actionEdit($step, $id)
    {
        $this->scenario = "step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
        $this->populateWorkflowData($model, "public", Yii::t('app', 'Edit'));
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => $step, 'stepCaption' => $stepCaptions[$step]));
    }

    public function actionClone($id)
    {
        $model = $this->loadModel($id);

        // clone attributes into a new object
        $attributes = $model->attributes;
        unset($attributes['id']);
        $clone = $model->populateRecord($attributes);

        // reset qa states
        $behaviors = $model->behaviors();
        $translationAttribute = 'video_file_qa_state_id';
        if (isset($behaviors['i18n-columns']['translationAttributes']) && in_array($translationAttribute, $behaviors['i18n-columns']['translationAttributes'])) {
            foreach (Yii::app()->params["languages"] as $lang => $label) {
                $translatedAttribute = $translationAttribute . "_" . $lang;
                $clone->$translatedAttribute = null;
            }
        }

        // mark ancestry
        $clone->cloned_from_id = $model->id;

        // increment version number
        $clone->version = is_null($model->version) ? 2 : $model->version + 1;

        // start transaction
        $transaction = Yii::app()->db->beginTransaction();

        try {

            // save as new object
            $clone->isNewRecord = true;
            if (!$clone->save()) {
                throw new SaveException($clone);
            }

            $relations = $model->relations();

            // clone relations part 1 - we want the cloned object to be related to the same items - outNodes
            // however we do not want other objects to relate to the cloned object, so we skip inNodes
            $cloneNode = $clone->node();
            foreach ($model->outNodes as $outNode) {
                $edge = new Edge;
                $edge->from_node_id = $cloneNode->id;
                $edge->to_node_id = $outNode->id;
                if (!$edge->save()) {
                    throw new SaveException($edge);
                }
            }
            unset($relations['outEdges']);
            unset($relations['inEdges']);
            unset($relations['outNodes']);
            unset($relations['inNodes']);

            // clone relations part 2
            foreach ($relations as $name => $relation) {

                switch ($relation[0]) {
                    case "CBelongsToRelation";
                        // always ignoring on clone since we are doing shallow copies
                        continue;
                        break;
                    case "CHasManyRelation";
                        // for now ignoring until now better or worse
                        continue;
                        break;
                    default:
                        throw new CException("Unsupported relation: " . print_r($relation, true));
                }

            }

            // commit transaction
            $transaction->commit();

        } catch (Exception $e) {
            $clone->addError('id', $e->getMessage());
            $transaction->rollback();
        }

        $this->redirect(array('continueAuthoring', 'id' => $clone->id));
    }

    public function actionRemove($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/remove', array('model' => $model));
    }

    public function actionReplace($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/replace', array('model' => $model));
    }

    public function actionGo($id)
    {
        $this->layout = 'go';
        $model = $this->loadModel($id);
        $this->render('/_item/go', array('model' => $model));
    }

    public function actionTranslationOverview($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;
        $this->populateWorkflowData($model, "translate", Yii::t('app', 'Translation overview'));
        $this->render('/_item/translation-overview', array('model' => $model));
    }

    /**
     * Translate workflow
     * @param $id
     * @param $step
     * @param $translateInto
     */
    public function actionTranslate($id, $step, $translateInto)
    {
        $this->scenario = "into_$translateInto-step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
        $this->populateWorkflowData($model, "translate", Yii::t('app', 'Translate into {translateIntoLanguage}', array('{translateIntoLanguage}' => Yii::app()->params["languages"][$translateInto])), $translateInto);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => $step, 'stepCaption' => $stepCaptions[$step]));
    }

    public $workflowData = array();

    /**
     * Returns actions based on the current qa state TODO: and access rules
     * together with progress calculations and whether or not the action is available yet or not
     * @return array
     */
    public function populateWorkflowData($item, $validationScenario, $caption, $translateInto = null)
    {

        $this->workflowData["action"] = $this->action->id;
        $this->workflowData["caption"] = $caption;
        $this->workflowData["validationScenario"] = $validationScenario;
        $this->workflowData["translateInto"] = $translateInto;

        $stepActions = array();
        $flagTriggerActions = array();

        //var_dump($model->qaState()->attributes);

        /*
        if ($this->action->id == "draft") {
            $flagTriggerActions[] = array(
                'label' => Yii::t('app', 'Save Draft'),
                'requiredProgress' => $item->calculateValidationProgress('draft'),
                'action' => 'saveDraft'
            );

            $editAction = "draft";

        } else
        */
        if ($this->action->id == "prepPreshow") {
            $flagTriggerActions[] = array(
                'label' => Yii::t('app', 'Make Testable'),
                'requiredProgress' => $item->calculateValidationProgress('preview'),
                'action' => 'makeTestable'
            );

            $editAction = "prepPreshow";

        } elseif ($this->action->id == "prepPublish") {
            $flagTriggerActions[] = array(
                'label' => Yii::t('app', 'Make Candidate'),
                'requiredProgress' => $item->calculateValidationProgress('public'),
                'action' => 'makeCandidate'
            );

            $editAction = "prepPublish";

        } elseif ($this->action->id == "translate") {

            $editAction = "translate";

        } else {

            $editAction = "edit";

        }

        // When in edit-views we consider ourselves outside any active workflow
        if ($this->action->id == "edit") {
            $editAction = "edit";
        }

        $steps = $item->flowSteps();
        $stepCaptions = $item->flowStepCaptions();
        foreach (array_merge($steps['draft'], $steps['preview'], $steps['public'], $steps['all']) as $step => $options) {
            $stepProgress = $item->calculateValidationProgress("step_" . $step);
            $stepActions[] = array(
                "step" => $step,
                "editAction" => $editAction,
                "model" => $item,
                "options" => $options,
                "caption" => $stepCaptions[$step],
                "progress" => $stepProgress,
                "translateInto" => $translateInto,
            );
        }

        $this->workflowData["stepActions"] = $stepActions;
        $this->workflowData["flagTriggerActions"] = $flagTriggerActions;

    }

    private function addEdges($fromid, $toids, $model)
    {
        $from_model = $this->loadModel($fromid);
        $from_node_id = $from_model->node()->id;

        foreach ($toids as $toid) {
            $to_model = $model::model()->findByPk($toid);
            $to_node_id = $to_model->node()->id;
            $this->addEdge($from_node_id, $to_node_id);
        }
    }

    private function addEdge($from_node_id, $to_node_id)
    {
        $edge = new Edge();
        $edge->from_node_id = $from_node_id;
        $edge->to_node_id = $to_node_id;

        if (!$edge->save()) {
            throw new SaveException($edge);
        }
    }

    // Asks $_POST if a value isn't part of "Model"
    // If it ends with _c0, we suppose it's from a grid input, and put it into $_POST[$this->modelClass]
    // Returns $_POST with fixed values
    private function fixPostFromGrid($post)
    {
        $return_array = array();
        foreach ($post as $key => $p) {
            if (strrpos($key, '_c0') !== false) {
                $newkey = substr($key, 0, -3);
                $return_array[$this->modelClass][$newkey] = $p;
            } else {
                $return_array[$key] = $p;
            }
        }
        return $return_array;
    }

    protected function saveAndContinueOnSuccess($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $_POST = $this->fixPostFromGrid($_POST);

        // log for dev purposes
        Yii::log("model->scenario: " . print_r($model->scenario, true), "flow", __METHOD__);
        Yii::log("_POST: " . print_r($_POST, true), "flow", __METHOD__);

        if (isset($_POST[$this->modelClass])) {

            $model->attributes = $_POST[$this->modelClass];

            // log for dev purposes
            Yii::log("model->safeAttributeNames: " . print_r($model->safeAttributeNames, true), "flow", __METHOD__);
            Yii::log("model->attributes: " . print_r($model->attributes, true), "flow", __METHOD__);

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
        } elseif (isset($_GET[$this->modelClass])) {
            $model->attributes = $_GET[$this->modelClass];
        }

        if ($model->hasErrors() || empty($_POST)) {

            return $model;

        } else {

            // redirect
            if (isset($_REQUEST['returnUrl'])) {
                $this->redirect($_REQUEST['returnUrl']);
            } elseif (isset($_POST['save-changes'])) {
                $this->redirect($_REQUEST['form-url']);
            } elseif (isset($_POST['next-required'])) {
                $this->redirect($_REQUEST['next-required-url']);
            } else {
                $this->actionCancel($model->id);
            }

        }

    }

}