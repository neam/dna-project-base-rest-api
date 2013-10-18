<?php

trait ItemController
{

    public function itemAccessRules()
    {
        return array(
            array('allow',
                'actions' => array(
                    'continueAuthoring',
                ),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array(
                    'add',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Add'
                ),
            ),
            array('allow',
                'actions' => array(
                    'draft',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Draft'
                ),
            ),
            array('allow',
                'actions' => array(
                    'prepPreshow',
                ),
                'roles' => array(
                    'GapminderSchool.Item.PrepPreshow'
                ),
            ),
            array('allow',
                'actions' => array(
                    'preshow',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Preshow'
                ),
            ),
            array('allow',
                'actions' => array(
                    'evaluate',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Evaluate'
                ),
            ),
            array('allow',
                'actions' => array(
                    'prepPublish',
                ),
                'roles' => array(
                    'GapminderSchool.Item.PrepPublish'
                ),
            ),
            array('allow',
                'actions' => array(
                    'preview',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Preview'
                ),
            ),
            array('allow',
                'actions' => array(
                    'review',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Review'
                ),
            ),
            array('allow',
                'actions' => array(
                    'prepPreshow',
                ),
                'roles' => array(
                    'GapminderSchool.Item.PrepPreshow'
                ),
            ),
            array('allow',
                'actions' => array(
                    'proofRead',
                ),
                'roles' => array(
                    'GapminderSchool.Item.ProofRead'
                ),
            ),
            array('allow',
                'actions' => array(
                    'translate',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Translate'
                ),
            ),
            array('allow',
                'actions' => array(
                    'publish',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Publish'
                ),
            ),
            array('allow',
                'actions' => array(
                    'edit',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Edit'
                ),
            ),
            array('allow',
                'actions' => array(
                    'clone',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Clone'
                ),
            ),
            array('allow',
                'actions' => array(
                    'remove',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Remove'
                ),
            ),
            array('allow',
                'actions' => array(
                    'replace',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Replace'
                ),
            ),
        );
    }

    public function actionContinueAuthoring($id)
    {
        $model = $this->loadModel($id);

        if ($model->qaState()->draft_validation_progress < 100) {
            $this->redirect(array('draft', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->preview_validation_progress < 100) {
            $this->redirect(array('prepPreshow', 'id' => $model->id));
            return;
        }
        if ($model->qaState()->public_validation_progress < 100) {
            $this->redirect(array('prepPublish', 'id' => $model->id));
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

        $this->redirect(array('edit', 'id' => $model->id));
        return;

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
            throw new SaveException();
        }

        Yii::app()->user->setFlash('success', "{$this->modelClass} Added");

        $this->redirect(array('continueAuthoring', 'id' => $item->id));
    }

    public function actionDraft($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('draft', array('model' => $model));
    }

    public function actionPrepPreshow($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('preppreshow', array('model' => $model, 'execution' => $execution));
    }

    public function actionPreshow($id)
    {
    	echo "Preshow";
    	exit;
    }

    public function actionEvaluate($id)
    {
    	echo "Evaluate";
    	exit;
    }

    public function actionPrepPublish($id)
    {
    	echo "Prepare for publish";
    	exit;
    }

    public function actionPreview($id)
    {
    	echo "Preview";
    	exit;
    }

    public function actionReview($id)
    {
    	echo "Review";
    	exit;
    }

    public function actionProofRead($id)
    {
    	echo "ProofRead";
    	exit;
    }

    public function actionPublish($id)
    {
    	echo "Publish";
    	exit;
    }

    public function actionEdit($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/edit', array('model' => $model));
    }

    public function actionClone($id)
    {
    	echo "Clone";
    	exit;
    }

    public function actionRemove($id)
    {
    	echo "Remove";
    	exit;
    }

    public function actionReplace($id)
    {
    	echo "Replace";
    	exit;
    }


    public function actionTranslate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        // Do not show translation tools if we are browsing the site in the sourceLanguage
        if (Yii::app()->sourceLanguage == $_GET['lang']) {
            $this->render('translate/choose_language', array('model' => $model,));
            return;
        }

        // Check and redirect depending on current workflow execution status
        $execution = Yii::app()->ezc->getWorkflowDatabaseExecution((int) $model->translation_workflow_execution_id);
        $waitingFor = $execution->getWaitingFor();

        if (isset($waitingFor["continue_from_approved_for_translation"])) {
            $this->redirect(array('author', 'id' => $model->id));
            return;
        }
        if (isset($waitingFor["continue_from_write_subtitles"])) {
            $this->redirect(array('translateSubtitles', 'id' => $model->id));
            return;
        }
        if (isset($waitingFor["continue_from_translate_title_and_about"])) {
            $this->redirect(array('translateTitleAndAbout', 'id' => $model->id));
            return;
        }

        // A temporary debug page
        $this->render('translate', array('model' => $model, 'execution' => $execution));
    }

    protected function saveAndContinueOnSuccess($id)
    {

        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        if (isset($_POST[$this->modelClass])) {
            $model->attributes = $_POST['Chapter'];
            try {

                // refresh qa state (to be sure that we have the most actual state)
                $model->refreshQaState();

                $qsStates = array();
                $qsStates["before"] = $model->qaState()->attributes;

                // start transaction
                $transaction = Yii::app()->db->beginTransaction();

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
                $changeset->node_id = $model->ensureNode()->id;
                if (!$changeset->save()) {
                    throw new SaveException($changeset);
                }

                // commit transaction
                $transaction->commit();

                // redirect
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('continueAuthoring', 'id' => $model->id));
                }

            } catch (Exception $e) {
                $transaction->rollback();
                $model->addError('id', $e->getMessage());
            }
        } elseif (isset($_GET[$this->modelClass])) {
            $model->attributes = $_GET[$this->modelClass];
        }

        return $model;

    }

}