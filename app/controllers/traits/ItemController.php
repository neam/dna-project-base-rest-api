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
                    'translate',
                ),
                'roles' => array(
                    'GapminderSchool.Item.Translate'
                ),
            ),
        );
    }

    public function actionContinueAuthoring($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $db =& Yii::app()->ezc->db;

        // Check and redirect depending on current workflow execution status
        $execution = new ezcWorkflowDatabaseExecution($db, (int) $model->authoring_workflow_execution_id);
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
        $this->render('continueAuthoring', array('model' => $model, 'execution' => $execution));

    }

    public function actionAuthor($id)
    {

        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        // Tmp - manually set continue_from_approved_for_translation to true before we have built the authoring workflow etc
        $db =& Yii::app()->ezc->db;
        $execution = new ezcWorkflowDatabaseExecution($db, (int) $model->translation_workflow_execution_id);

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
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $db =& Yii::app()->ezc->db;

        if (isset($_POST[$this->modelClass])) {
			// postning
            $model->attributes = $_POST['Chapter'];
            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('continueAuthoring', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        } elseif (isset($_GET[$this->modelClass])) {
            $model->attributes = $_GET[$this->modelClass];
        }

        $execution = new ezcWorkflowDatabaseExecution($db, (int) $model->authoring_workflow_execution_id);
        $this->render('draft', array('model' => $model, 'execution' => $execution));
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

        // Set up database connection.
        $db =& Yii::app()->ezc->db;

        // Check and redirect depending on current workflow execution status
        $execution = new ezcWorkflowDatabaseExecution($db, (int) $model->translation_workflow_execution_id);
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

}