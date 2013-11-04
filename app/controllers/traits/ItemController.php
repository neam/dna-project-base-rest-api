<?php

trait ItemController
{

    public function itemAccessRules()
    {
        return array(
            array('allow',
                'actions' => array(
                    'continueAuthoring',
                    'go',
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
                ),
                'roles' => array(
                    'Item.Draft'
                ),
            ),
            array('allow',
                'actions' => array(
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
                    'preshow',
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

    public function actionDraft($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/draft', array('model' => $model));
    }

    public function actionPrepPreshow($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/preppreshow', array('model' => $model));
    }

    public function actionPreshow($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/preshow', array('model' => $model));
    }

    public function actionEvaluate($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/evaluate', array('model' => $model));
    }

    public function actionPrepPublish($id)
    {
        // TODO SHOULD GO TO ... thumbnail?
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/preppublish', array('model' => $model));
    }

    public function actionPreview($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('preview', array('model' => $model));
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

    public function actionEdit($id)
    {
        $model = $this->saveAndContinueOnSuccess($id);
        $this->render('/_item/edit', array('model' => $model));
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

    private function removeEdges($edgeid)
    {
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

    private function listenForEdges($id)
    {
        if (isset($_POST[$this->modelClass]["exercises_to_add"])) {
            $this->addEdges($id, $_POST[$this->modelClass]["exercises_to_add"], 'Exercise');
        } else {
            if (isset($_POST[$this->modelClass]["exercises_to_remove"])) {
                $this->removeEdges($_POST[$this->modelClass]["exercises_to_remove"]);
            } else {
                if (isset($_POST[$this->modelClass]["snapshots_to_add"])) {
                    $this->addEdges($id, $_POST[$this->modelClass]["snapshots_to_add"], 'Snapshot');
                } else {
                    if (isset($_POST[$this->modelClass]["snapshots_to_remove"])) {
                        $this->removeEdges($_POST[$this->modelClass]["snapshots_to_remove"]);
                    } else {
                        if (isset($_POST[$this->modelClass]["videos_to_add"])) {
                            $this->addEdges($id, $_POST[$this->modelClass]["videos_to_add"], 'Video');
                        } else {
                            if (isset($_POST[$this->modelClass]["videos_to_remove"])) {
                                $this->removeEdges($_POST[$this->modelClass]["videos_to_remove"]);
                            }
                        }
                    }
                }
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
            $this->listenForEdges($id);

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

                // redirect
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('continueAuthoring', 'id' => $model->id));
                }

            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
                $transaction->rollback();
            }
        } elseif (isset($_GET[$this->modelClass])) {
            $model->attributes = $_GET[$this->modelClass];
        }

        return $model;

    }

}