<?php

class VideoFileController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array(
                    'subtitles',
                ),
                'users' => array('*'),
            ),
            array(
                'allow',
                'actions' => array(
                    'index',
                    'view',
                    'create',
                    'update',
                    'add',
                    'author',
                    'translate',
                    'translateSubtitles',
                    'translateTitleAndAbout',
                    'editableSaver',
                    'editableCreator',
                    'admin',
                    'delete',
                ),
                'roles' => array('B61b08a5.VideoFile.*'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['id'])) {
            $model = VideoFile::model()->find(
                'id = :id',
                array(
                    ':id' => $_GET['id']
                )
            );
            if ($model !== null) {
                $_GET['id'] = $model->id;
            } else {
                throw new CHttpException(400);
            }
        }
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }
        return true;
    }

    public function actionSubtitles($id)
    {
        $model = $this->loadModel($id);

        echo $model->subtitles;
        exit;
    }


    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new VideoFile;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'video-file-form');

        if (isset($_POST['VideoFile'])) {
            $model->attributes = $_POST['VideoFile'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        } elseif (isset($_GET['VideoFile'])) {
            $model->attributes = $_GET['VideoFile'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'video-file-form');

        if (isset($_POST['VideoFile'])) {
            $model->attributes = $_POST['VideoFile'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionAdd()
    {

        $videoFile = new VideoFile();
        if (!$videoFile->save()) {
            throw new SaveException();
        }

        Yii::app()->user->setFlash('success', "Video File Added");

        $this->redirect(array('author', 'id' => $videoFile->id));

    }

    public function actionAuthor($id)
    {

        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        // Tmp - manually set continue_from_approved_for_translation to true before we have built the authoring workflow etc
        $db = ezcDbFactory::create('mysql://' . YII_DB_USER . ':' . YII_DB_PASSWORD . '@' . YII_DB_HOST . '/' . YII_DB_NAME);
        $execution = new ezcWorkflowDatabaseExecution($db, (int) $model->translation_workflow_execution_id);

        $execution->resume(array('continue_from_approved_for_translation' => true));
        $execution->unsetVariable('continue_from_approved_for_translation');

        $this->render('author', array('model' => $model,));

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
        $db = ezcDbFactory::create('mysql://' . YII_DB_USER . ':' . YII_DB_PASSWORD . '@' . YII_DB_HOST . '/' . YII_DB_NAME);

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

    public function actionTranslateSubtitles($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        // Set up database connection.
        $db = ezcDbFactory::create('mysql://' . YII_DB_USER . ':' . YII_DB_PASSWORD . '@' . YII_DB_HOST . '/' . YII_DB_NAME);

        // Check and redirect depending on current workflow execution status
        $execution = new ezcWorkflowDatabaseExecution($db, (int) $model->translation_workflow_execution_id);

        $this->render('translate/subtitles', array('model' => $model, 'execution' => $execution));
    }

    public function actionTranslateTitleAndAbout($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        // Set up database connection.
        $db = ezcDbFactory::create('mysql://' . YII_DB_USER . ':' . YII_DB_PASSWORD . '@' . YII_DB_HOST . '/' . YII_DB_NAME);

        // Check and redirect depending on current workflow execution status
        $execution = new ezcWorkflowDatabaseExecution($db, (int) $model->translation_workflow_execution_id);

        $this->render('translate/title_and_about', array('model' => $model, 'execution' => $execution));
    }

    public function actionEditableSaver()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('VideoFile'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['VideoFile'])) {
            $model = new VideoFile;
            $model->attributes = $_POST['VideoFile'];
            if ($model->save()) {
                echo CJSON::encode($model->getAttributes());
            } else {
                $errors = array_map(
                    function ($v) {
                        return join(', ', $v);
                    },
                    $model->getErrors()
                );
                echo CJSON::encode(array('errors' => $errors));
            }
        } else {
            throw new CHttpException(400, 'Invalid request');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!isset($_GET['ajax'])) {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        } else {
            throw new CHttpException(400, Yii::t('crud', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('VideoFile');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new VideoFile('search');
        $model->unsetAttributes();

        if (isset($_GET['VideoFile'])) {
            $model->attributes = $_GET['VideoFile'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = VideoFile::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('crud', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'video-file-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Returns a model used to populate a filterable, searchable
     * and sortable CGridView with the records found by a model relation.
     *
     * Usage:
     * $relatedSearchModel = $this->getRelatedSearchModel($model, 'relationName');
     *
     * Then, when invoking CGridView:
     *    ...
     *        'dataProvider' => $relatedSearchModel->search(),
     *        'filter' => $relatedSearchModel,
     *    ...
     * @returns CActiveRecord
     */
    public function getRelatedSearchModel($model, $name)
    {
        $md = $model->getMetaData();
        if (!isset($md->relations[$name])) {
            throw new CDbException(Yii::t('yii', '{class} does not have relation "{name}".', array('{class}' => get_class($model), '{name}' => $name)));
        }

        $relation = $md->relations[$name];
        if (!($relation instanceof CHasManyRelation)) {
            throw new CException("Currently works with HAS_MANY relations only");
        }

        $className = $relation->className;
        $related = new $className('search');
        $related->unsetAttributes();
        $related->{$relation->foreignKey} = $model->primaryKey;

        if (isset($_GET[$className])) {
            $related->attributes = $_GET[$className];
        }

        return $related;
    }

}