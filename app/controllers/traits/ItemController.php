<?php

trait ItemController
{

    public function itemAccessRules()
    {
        $return = array(
            array('allow',
                'actions' => array(
                    'continueAuthoring',
                    'nextRequired',
                    'cancel',
                ),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array(
                    'go',
                ),
                'roles' => array(
                    (DataModel::isGoModel($this->modelClass) || DataModel::educationalItemModels($this->modelClass) || DataModel::websiteContentItemModels($this->modelClass)) ? 'Item.Go' : 'Developer' // TODO: Refactor this
                ),
            ),
            array('allow',
                'actions' => array(
                    'view',
                ),
                'roles' => array(
                    (DataModel::isGoModel($this->modelClass) || DataModel::educationalItemModels($this->modelClass) || DataModel::websiteContentItemModels($this->modelClass)) ? 'Item.Go' : 'Developer' // TODO: Refactor this
                ),
            ),
            array('allow',
                'actions' => array(
                    'browse',
                ),
                'roles' => array(
                    (DataModel::isGoModel($this->modelClass) || DataModel::educationalItemModels($this->modelClass) || DataModel::websiteContentItemModels($this->modelClass)) ? 'Item.Go' : 'Developer' // TODO: Refactor this
                ),
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
                    'unpublish',
                ),
                'roles' => array(
                    'Item.Publish'
                ),
            ),
            array('allow',
                'actions' => array(
                    'edit',
                    'preview',
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

        return $return;
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
        foreach ($item->flowSteps() as $step => $options) {
            if ($item->calculateValidationProgress($prefix . 'step_' . $step) < 100) {
                return $step;
            }
            $item->clearErrors();
        }
        return null;
    }

    protected function firstFlowStep($item)
    {
        foreach ($item->flowSteps() as $step => $fields) {
            return $step;
        }
        return null;
    }

    public function actionBrowse()
    {
        $model = new $this->modelClass('search');
        $model->unsetAttributes();

        if (isset($_GET[$this->modelClass])) {
            $model->attributes = $_GET[$this->modelClass];
        }

        $criteria = array();

        // Translators should only see items which are in testable mode or higher
        if (Yii::app()->user->checkAccess('Item.Translate')) {
            $criteria = new CDbCriteria();

            $modelTbl = $model->tableName(); // eg model_table
            $qaStateTbl = $modelTbl . '_qa_state'; // model_table_qa_state
            $qaStateForeignId = $qaStateTbl . '_id'; // model_table_qa_state_id

            $criteria->join = sprintf('INNER JOIN %s qs ON %s = qs.id', $qaStateTbl, $qaStateForeignId);
            $criteria->addInCondition('status', array('preview', 'public'));
        }

        // Administrators should see everything, and have Item.Translate rights so ignore everything just made
        if (Yii::app()->user->checkAccess('Administrator')) {
            $criteria = array();
        }

        $dataProvider = $model->search();
        $dataProvider->setCriteria($criteria);

        $this->populateWorkflowData($model, "browse", Yii::t('app', 'Browse'));

        $this->render('/_item/browse', array('model' => $model, 'dataProvider' => $dataProvider,));
    }

    public function actionAdd()
    {
        if (isset($_POST["from_node_id"]) && is_numeric($_POST["from_node_id"])) {
            // Check if it's the (this) type or specified:
            if (isset($_POST["toType"])) {
                $item = new $_POST["toType"]();
            } else {
                $item = new $this->modelClass();
            }
            // Set title, if specified:
            if (isset($_POST["newitemtitle"])) {
                try {
                    $item->_title = $_POST["newitemtitle"];
                } catch (Exception $e) {
                    // no title for this type
                }
            }
            // Save!
            if (!$item->save()) {
                throw new SaveException($item);
            }
            $item->refreshQaState();
            $message = "{$this->modelClass} Added";

            // Add edge if specified:
            if (isset($_POST["addEdge"]) && $_POST["addEdge"] == "true" && $_POST["from_node_id"] && $_POST["relation"]) {
                $to_node_id = $item->node_id;
                $from_node_id = $_POST["from_node_id"];
                $relation = $_POST["relation"];
                $this->addEdge($from_node_id, $to_node_id, $relation);
            }
            // Return:
            if (isset($_POST["returnUrl"])) {
                $this->redirect($_POST['returnUrl']);
                exit;
            } else {
                header("Content-type: application/json");
                $result = new StdClass();
                $result->id = $item->id;
                $result->node_id = $item->node_id;
                $result->title = $item->itemLabel;
                echo json_encode($result);
                exit;
            }
        }

        $item = new $this->modelClass();
        if (isset($_POST["newitemtitle"])) {
            $item->_title = $_POST["newitemtitle"];
        }
        if (!$item->save()) {
            throw new SaveException($item);
        }
        $item->refreshQaState();
        $message = "{$this->modelClass} Added";

        // If fromId is set, we assume this is a new Item which will be related:
        Yii::app()->user->setFlash('success', $message);
        $this->redirect(array('continueAuthoring', 'id' => $item->id));
    }

    public function actionAddEdges()
    {
        if (isset($_POST[$this->modelClass]["fromId"]) && isset($_POST[$this->modelClass]["edges_to_add"]) && isset($_POST[$this->modelClass]["relation"])) {
            $this->addEdges(
                $_POST[$this->modelClass]["fromId"],
                $_POST[$this->modelClass]["edges_to_add"],
                $_POST[$this->modelClass]["relation"]
            );
        }
        exit;
    }

    public function actionDeleteEdge()
    {
        $from = $_GET["from"];
        $to = $_GET["to"];
        $relation = $_GET["relation"];
        $del = Edge::model()->deleteAll(
            'from_node_id=:from_node_id AND to_node_id=:to_node_id AND relation=:relation',
            array(
                ':from_node_id' => $from,
                ':to_node_id' => $to,
                ':relation' => $relation,
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
        $model->refreshQaState();

        // redirect
        if (isset($_GET['returnUrl'])) {
            $this->redirect($_GET['returnUrl']);
        } else {
            $this->redirect(array('continueAuthoring', 'id' => $model->id));
        }

    }

    /**
     * Evaluate workflow
     * @param $id
     * @param $step
     */
    public function actionEvaluate($id, $step)
    {
        $this->scenario = "evaluate-step_$step";
        $model = $this->saveAndContinueOnSuccess($id);
        $this->populateWorkflowData($model, "evaluate", Yii::t('app', 'Evaluate'));
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/evaluate', array('model' => $model, 'step' => $step, 'stepCaption' => $stepCaptions[$step]));
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
        $model->refreshQaState();

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
        $this->render('/_item/preview', array('model' => $model, 'workflowCaption' => Yii::t('app', 'Preview')));
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
        //$model = $this->saveAndContinueOnSuccess($id);

        $model = $this->loadModel($id);
        if (!$model->qaStateBehavior()->validStatus('public')) {
            throw new CException("This item does not validate for public status");
        }

        $qaState = $model->qaState();

        // save status change
        $qaState->status = 'public';
        if (!$qaState->save()) {
            throw new SaveException($qaState);
        }
        $model->refreshQaState();

        // redirect
        if (isset($_GET['returnUrl'])) {
            $this->redirect($_GET['returnUrl']);
        } else {
            $this->redirect(array('continueAuthoring', 'id' => $model->id));
        }

    }

    public function actionUnpublish($id)
    {
        //$model = $this->saveAndContinueOnSuccess($id);

        $model = $this->loadModel($id);
        $qaState = $model->qaState();

        // save status change
        $qaState->status = null;
        if (!$qaState->save()) {
            throw new SaveException($qaState);
        }
        $model->refreshQaState();

        // redirect
        if (isset($_GET['returnUrl'])) {
            $this->redirect($_GET['returnUrl']);
        } else {
            $this->redirect(array('continueAuthoring', 'id' => $model->id));
        }

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

        $this->performAjaxValidation($model);

        $this->populateWorkflowData($model, "public", Yii::t('app', 'Edit'));
        $stepCaptions = $model->flowStepCaptions();

        $this->setPageTitle(array(
            Yii::t('model', $this->modelClass),
            $this->workflowData['caption'],
        ));

        // Breadcrumbs
        $this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse');
        $this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
        $this->breadcrumbs[] = $this->workflowData['caption'];
        $this->breadcrumbs[] = $stepCaptions[$step];

        $this->render('/_item/edit', array(
            'model' => $model,
            'step' => $step,
            'stepCaption' => $stepCaptions[$step],
        ));
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
                        // for now ignoring until knowing better or worse
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

        $stepCaptions = $item->flowStepCaptions();
        foreach ($item->flowSteps() as $step => $fields) {

            if ($this->action->id != "edit") {
                $stepProgress = $item->calculateValidationProgress("step_" . $step);
            } else {
                $stepProgress = $item->calculateValidationProgress("step_$step-total_progress");
            }

            $stepActions[] = array(
                "step" => $step,
                "editAction" => $editAction,
                "model" => $item,
                "fields" => $fields,
                "caption" => $stepCaptions[$step],
                "progress" => $stepProgress,
                "translateInto" => $translateInto,
            );
        }

        $this->workflowData["stepActions"] = $stepActions;
        $this->workflowData["flagTriggerActions"] = $flagTriggerActions;

    }

    // $fromid = [item] id, $toid = [node] id ! important
    private function addEdges($fromid, $toids, $relation)
    {
        $from_model = $this->loadModel($fromid);
        $from_node_id = $from_model->node()->id;

        foreach ($toids as $to_node_id) {
            $this->addEdge($from_node_id, $to_node_id, $relation);
        }
    }

    private function addEdge($from_node_id, $to_node_id, $relation)
    {
        $edge = new Edge();
        $edge->from_node_id = $from_node_id;
        $edge->to_node_id = $to_node_id;
        $edge->relation = $relation;

        if (!$edge->save()) {
            throw new SaveException($edge);
        }
        return true;
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

    /**
     * Returns the item description if available.
     * @return string|null the item description.
     */
    public function getItemDescription()
    {
        $model = new $this->modelClass;

        if (isset($model->itemDescription)) {
            return $model->itemDescription;
        } else {
            return null;
        }
    }

    /**
     * Renders an item description tooltip.
     * @return string the tooltip HTML.
     */
    public function itemDescriptionTooltip()
    {
        $itemDescription = $this->getItemDescription();

        return isset($itemDescription)
            ? Html::hintTooltip($itemDescription, array(
                'placement' => TbHtml::TOOLTIP_PLACEMENT_BOTTOM,
            ))
            : '';
    }
}
