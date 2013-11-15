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

    public function actionNextRequired($id)
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

    public function actionAuthor($id)
    {

        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        // Tmp - manually set continue_from_approved_for_translation to true before we have built the authoring workflow etc
        $execution = Yii::app()->ezc->getWorkflowDatabaseExecution((int) $model->translation_workflow_execution_id);

        $execution->resume(array('continue_from_approved_for_translation' => true));
        $execution->unsetVariable('continue_from_approved_for_translation');

        $this->render('author', array('model' => $model,));

    }

    public function actionAdd()
    {
        $item = new $this->modelClass();
        if (!$item->save()) {
            throw new SaveException($item);
        }

        Yii::app()->user->setFlash('success', "{$this->modelClass} Added");

        $this->redirect(array('continueAuthoring', 'id' => $item->id));
    }

    public function actionAddEdges()
    {
        $this->addEdges(
            $_POST[$this->modelClass]["fromId"],
            $_POST[$this->modelClass]["edges_to_add"],
            $_POST[$this->modelClass]["toModel"]);
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

    public function actionPrepPreshow($step, $id)
    {
        $this->scenario = "preview-step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
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

    public function actionPrepPublish($step, $id)
    {
        $this->scenario = "public-step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => $step, 'stepCaption' => $stepCaptions[$step]));
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
        $step = $this->nextFlowStep("", $model);
        $this->redirect(array('edit', 'id' => $model->id, 'step' => $step));
    }

    public function actionEdit($step, $id)
    {
        $this->scenario = "step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => $step, 'stepCaption' => $stepCaptions[$step]));
    }

    public function actionClone($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/clone', array('model' => $model));
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

    public function actionTranslate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;
        $this->render('/_item/translate', array('model' => $model));

    }

    /**
     * Returns actions based on the current qa state TODO: and access rules
     * together with progress calculations and whether or not the action is available yet or not
     * @return array
     */
    public function itemActions($item)
    {

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
                "action" => $editAction . ucfirst(isset($options['action']) ? $options['action'] : $step),
                "caption" => $stepCaptions[$step],
                "progress" => $stepProgress,
            );
        }

        return compact("stepActions", "flagTriggerActions");

    }

    public function currentValidationScenario()
    {

        $validationScenario = null;

        /*
        if ($this->action->id == "draft") {
            $validationScenario = "draft";
        } else
        */
        if ($this->action->id == "prepPreshow") {
            $validationScenario = "preview";
        } elseif ($this->action->id == "prepPublish") {
            $validationScenario = "public";
        } elseif ($this->action->id == "edit") {
            $validationScenario = "public";
        }

        return $validationScenario;

    }

    /**
     * Returns actions based on the current qa state and access rules
     * together with progress calculations and whether or not the action is available yet or not
     * @return array
     */
    public function workflowCaption($item)
    {

        /*if ($this->action->id == "draft") {
            return Yii::t('app', 'Prepare to save');
        } else */
        if ($this->action->id == "prepPreshow") {
            return Yii::t('app', 'Prepare for testing');
        } elseif ($this->action->id == "prepPublish") {
            return Yii::t('app', 'Prepare for publishing');
        }

        return null;

    }

    private function addEdges($fromid, $toids, $model)
    {
        $from_model = $this->loadModel($fromid);
        $from_node_id = $from_model->node()->id;

        foreach ($toids as $toid) {
            $to_model = $model::model()->findByPk($toid);
            $to_node_id = $to_model->node()->id;

            $edge = new Edge();
            $edge->from_node_id = $from_node_id;
            $edge->to_node_id = $to_node_id;

            if (!$edge->save()) {
                throw new SaveException($edge);
            }
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

        if (isset($_POST[$this->modelClass])) {
            if (method_exists($this, "listenForEdges")) {
                $this->listenForEdges($id);
            }

            $model->attributes = $_POST[$this->modelClass];
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
                $this->redirect(array('nextRequired', 'id' => $model->id));
            } else {
                $this->actionCancel($model->id);
            }

        }

    }

}