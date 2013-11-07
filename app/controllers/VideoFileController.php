<?php

class VideoFileController extends Controller
{

    use ItemController;

    public $modelClass = "VideoFile";

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
        return array_merge($this->itemAccessRules(), array(
            array('allow',
                'actions' => array(
                    'index',
                    'view',
                ),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array(
                    'draftTitle',
                ),
                'roles' => array(
                    'Item.Draft'
                ),
            ),
            array('allow',
                'actions' => array(
                    'PrepPreshowTitle',
                    'PrepPreshowClip',
                ),
                'roles' => array(
                    'Item.PrepPreshow'
                ),
            ),
            array('allow',
                'actions' => array(
                    'prepPublishTitle',
                    'prepPublishClip',
                    'prepPublishAbout',
                    'prepPublishThumbnail',
                    'prepPublishSubtitles',
                ),
                'roles' => array(
                    'Item.PrepPublish'
                ),
            ),
            array('allow',
                'actions' => array(
                    'view',
                    'create',
                    'update',
                    'edit',
                    'editableSaver',
                    'editableCreator',
                    'admin',
                    'delete',
                    'editFlow',
                    'editTitle',
                    'editClip',
                    'editAbout',
                    'editThumbnail',
                    'editSubtitles',
                ),
                'roles' => array('VideoFile.*'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        ));
    }

    public function actionDraft($id)
    {
        $this->redirect(array('videofile/draftTitle', 'id' => $id));
    }

    public function actionDraftTitle($id)
    {
        $this->scenario = "step_title";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/draft', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'title', 'stepCaption' => $stepCaptions['title']));
    }

    public function actionPrepPreshow($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_title';
        if (!$model->validate()) {
            $this->redirect(array('videofile/prepPreshowTitle', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_clip';
        if (!$model->validate()) {
            $this->redirect(array('videofile/prepPreshowClip', 'id' => $id));
            return;
        }
        $this->redirect(array('videofile/prepPublish', 'id' => $id));
    }

    public function actionPrepPreshowTitle($id)
    {
        $this->scenario = "step_title";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for preview');
        $this->render('/_item/preppreshow', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'title', 'stepCaption' => $stepCaptions['title']));
    }

    public function actionPrepPreshowClip($id)
    {
        $this->scenario = "step_clip";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for preview');
        $this->render('/_item/preppreshow', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'clip', 'stepCaption' => $stepCaptions['clip']));
    }


    public function actionPrepPublish($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_title';
        if (!$model->validate()) {
            $this->redirect(array('videofile/prepPublishTitle', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_clip';
        if (!$model->validate()) {
            $this->redirect(array('videofile/prepPublishClip', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_about';
        if (!$model->validate()) {
            $this->redirect(array('videofile/prepPublishAbout', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_thumbnail';
        if (!$model->validate()) {
            $this->redirect(array('videofile/prepPublishThumbnail', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_subtitles';
        if (!$model->validate()) {
            $this->redirect(array('videofile/prepPublishSubtitles', 'id' => $id));
            return;
        }
        $this->redirect(array('videofile/edit', 'id' => $id));
    }

    public function actionPrepPublishTitle($id)
    {
        $this->scenario = "step_title";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for publish');
        $this->render('/_item/preppublish', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'title', 'stepCaption' => $stepCaptions['title']));
    }

    public function actionPrepPublishClip($id)
    {
        $this->scenario = "step_clip";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for publish');
        $this->render('/_item/preppublish', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'clip', 'stepCaption' => $stepCaptions['clip']));
    }

    public function actionPrepPublishAbout($id)
    {
        $this->scenario = "step_about";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for publish');
        $this->render('/_item/preppublish', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'about', 'stepCaption' => $stepCaptions['about']));
    }

    public function actionPrepPublishThumbnail($id)
    {
        $this->scenario = "step_thumbnail";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for publish');
        $this->render('/_item/preppublish', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'thumbnail', 'stepCaption' => $stepCaptions['thumbnail']));
    }

    public function actionPrepPublishSubtitles($id)
    {
        $this->scenario = "step_subtitles";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for publish');
        $this->render('/_item/preppublish', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'subtitles', 'stepCaption' => $stepCaptions['subtitles']));
    }

    public function actionEdit($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_title';
        if (!$model->validate()) {
            $this->redirect(array('videofile/editTitle', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_clip';
        if (!$model->validate()) {
            $this->redirect(array('videofile/editClip', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_about';
        if (!$model->validate()) {
            $this->redirect(array('videofile/editAbout', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_thumbnail';
        if (!$model->validate()) {
            $this->redirect(array('videofile/editThumbnail', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_teachers_guide';
        if (!$model->validate()) {
            $this->redirect(array('videofile/editTeachersGuide', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_subtitles';
        if (!$model->validate()) {
            $this->redirect(array('videofile/editSubtitles', 'id' => $id));
            return;
        }
        // Go to first step
        $this->redirect(array('videofile/editTitle', 'id' => $id));
    }

    public function actionEditTitle($id)
    {
        $this->scenario = "step_title";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'title', 'stepCaption' => $stepCaptions['title']));
    }

    public function actionEditClip($id)
    {
        $this->scenario = "step_clip";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'clip', 'stepCaption' => $stepCaptions['clip']));
    }

    public function actionEditAbout($id)
    {
        $this->scenario = "step_about";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'about', 'stepCaption' => $stepCaptions['about']));
    }

    public function actionEditThumbnail($id)
    {
        $this->scenario = "step_thumbnail";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'thumbnail', 'stepCaption' => $stepCaptions['thumbnail']));
    }

    public function actionEditSubtitles($id)
    {
        $this->scenario = "step_subtitles";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'subtitles', 'stepCaption' => $stepCaptions['subtitles']));
    }

    protected function listenForEdges($id)
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
                            $this->addEdges($id, $_POST[$this->modelClass]["videos_to_add"], 'VideoFile');
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

    protected function videofileSections($videofile)
    {

        $sections = array();

        // video
        if ($videofile->videos) {
            $sections[] = array(
                "menu_label" => $videofile->videos[0]->itemLabel,
                "title" => $videofile->videos[0]->itemLabel,
                "slug" => $videofile->videos[0]->slug,
                "model" => $videofile->videos[0],
            );
        }

        // snapshots
        if ($videofile->snapshots) {
            foreach ($videofile->snapshots as $relatedModel) {
                $sections[] = array(
                    "menu_label" => $relatedModel->itemLabel,
                    "title" => $relatedModel->itemLabel,
                    "slug" => $relatedModel->slug,
                    "model" => $relatedModel,
                );
            }
        }

        // teachers guide
        if (!empty($videofile->teachers_guide)) {
            $sections[] = array(
                "menu_label" => Yii::t('app', 'Teacher\'s Guide'),
                "title" => Yii::t('app', 'Teacher\'s Guide'),
                "slug" => 'teachers-guide',
                "markup" => $videofile->teachers_guide,
            );
        }

        // exercises
        if ($videofile->exercises) {
            $subsections = array();
            foreach ($videofile->exercises as $relatedModel) {
                $subsections[] = array(
                    "menu_label" => $relatedModel->itemLabel,
                    "title" => $relatedModel->itemLabel,
                    "slug" => $relatedModel->slug,
                    "model" => $relatedModel,
                );
            }
            $sections[] = array(
                "menu_label" => Yii::t('app', 'Exercises'),
                "title" => Yii::t('app', 'Exercises'),
                "slug" => 'exercises',
                "subsections" => $subsections,
            );
        }

        // slideshow
        // todo

        // test
        // todo

        // data
        // todo

        // faq
        // not in the data model currently

        // credits
        // todo

        // feedback
        // not in the data model currently

        return $sections;

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

        $this->performAjaxValidation($model, 'videofile-form');

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

        $this->performAjaxValidation($model, 'videofile-form');

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
            throw new CHttpException(400, Yii::t('model', 'Invalid request. Please do not repeat this request again.'));
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
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'videofile-form') {
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

        if (isset($relation->through)) {

            if (!($md->relations[$relation->through] instanceof CBelongsToRelation)) {
                throw new CException("Currently works with HAS_MANY relations, optionally through a BELONGS_TO relation, only");
            }

            $fk = $relation->foreignKey;
            $_ = array_keys($fk);
            $throughPk = $_[0];
            $throughField = $fk[$throughPk];
            $className = $relation->className;
            $related = new $className('search');
            $related->unsetAttributes();
            $related->{$throughField} = $model->{$relation->through}->{$throughPk};
        } else {
            $className = $relation->className;
            $related = new $className('search');
            $related->unsetAttributes();
            $related->{$relation->foreignKey} = $model->primaryKey;
        }

        if (isset($_GET[$className])) {
            $related->attributes = $_GET[$className];
        }

        return $related;
    }

}
