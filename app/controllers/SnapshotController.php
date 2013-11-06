<?php

class SnapshotController extends Controller
{

    use ItemController;
    public $modelClass = "Snapshot";

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
                    'view',
                ),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array(
                    'draftSlug',
                ),
                'roles' => array(
                    'Item.Draft'
                ),
            ),
            array('allow',
                'actions' => array(
                    //'prepPreshowLink',
                ),
                'roles' => array(
                    //'Item.PrepPreshow'
                ),
            ),
            array('allow',
                'actions' => array(
                ),
                'roles' => array(
                    //'Item.PrepPublish'
                ),
            ),
            array('allow',
                'actions' => array(
                    'index',
                    'view',
                    'create',
                    'update',
                    'editableSaver',
                    'editableCreator',
                    'admin',
                    'delete',
                    'edit',
                    'editSlug',
                    'editTitle',
                    'editAbout',
                    'editThumbnail',
                    'editLink',
                    'editEmbedOverride',
                    'editTool',
                    'editRelated',
                ),
                'roles' => array('Snapshot.*'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        ));
    }

    public function actionDraft($id)
    {
        $this->redirect(array('snapshot/draftSlug', 'id' => $id));
    }

    public function actionDraftSlug($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_slug';
        $this->scenario = "step_slug";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Create draft');
        $this->render('/_item/draft', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'slug', 'stepCaption' => $stepCaptions['slug']));
    }

    public function actionPrepPreshow($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_slug';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/prepPreshowSlug', 'id' => $id));
            return;
        }
        $this->redirect(array('snapshot/prepPublish', 'id' => $id));
    }

    public function actionPrepPreshowSlug($id)
    {
        $this->scenario = "step_slug";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for preview');
        $this->render('/_item/preppreshow', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'slug', 'stepCaption' => $stepCaptions['slug']));
    }

    public function actionPrepPublish($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_slug';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/prepPublishSlug', 'id' => $id));
            return;
        }
        $this->redirect(array('snapshot/edit', 'id' => $id));
    }

    public function actionPrepPublishSlug($id)
    {
        $this->scenario = "step_slug";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Prepare for publish');
        $this->render('/_item/preppreshow', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'slug', 'stepCaption' => $stepCaptions['slug']));
    }

    public function actionEdit($id){
        $model = $this->loadModel($id);
        $model->scenario = 'step_slug';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/editSlug', 'id' => $id));
            return;
        }
        /*
        $model->clearErrors();
        $model->scenario = 'step_thumbnail';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/editThumbnail', 'id' => $id));
            return;
        }
        */
        $model->clearErrors();
        $model->scenario = 'step_link';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/editLink', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_title';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/editTitle', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_about';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/editAbout', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_embed_override';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/editEmbedOverride', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_tool';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/editTool', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_related';
        if (!$model->validate()) {
            $this->redirect(array('snapshot/editRelated', 'id' => $id));
            return;
        }
        // Edit is finished... what now?
    }







    public function actionEditSlug($id)
    {
        $this->scenario = "step_slug";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'slug', 'stepCaption' => $stepCaptions['slug']));
    }

    public function actionEditTitle($id)
    {
        $this->scenario = "step_title";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'title', 'stepCaption' => $stepCaptions['title']));
    }

    public function actionEditAbout($id)
    {
        $this->scenario = "step_about";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'about', 'stepCaption' => $stepCaptions['about']));
    }

    /*
    public function actionEditThumbnail($id)
    {
        $this->scenario = "step_thumbnail";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'thumbnail', 'stepCaption' => $stepCaptions['thumbnail']));
    }
    */

    public function actionEditLink($id)
    {
        $this->scenario = "step_link";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'link', 'stepCaption' => $stepCaptions['link']));
    }

    public function actionEditEmbedOverride($id)
    {
        $this->scenario = "step_embed_override";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'embed_override', 'stepCaption' => $stepCaptions['embed_override']));
    }

    public function actionEditTool($id)
    {
        $this->scenario = "step_tool";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'tool', 'stepCaption' => $stepCaptions['tool']));
    }

    public function actionEditRelated($id)
    {
        $this->scenario = "step_related";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $workflowCaption = Yii::t('app', 'Edit');
        $this->render('/_item/edit', array('model' => $model, 'workflowCaption' => $workflowCaption, 'step' => 'related', 'stepCaption' => $stepCaptions['related']));
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
            $model = Snapshot::model()->find(
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

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new Snapshot;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'snapshot-form');

        if (isset($_POST['Snapshot'])) {
            $model->attributes = $_POST['Snapshot'];

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
        } elseif (isset($_GET['Snapshot'])) {
            $model->attributes = $_GET['Snapshot'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'snapshot-form');

        if (isset($_POST['Snapshot'])) {
            $model->attributes = $_POST['Snapshot'];


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
        $es = new EditableSaver('Snapshot'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['Snapshot'])) {
            $model = new Snapshot;
            $model->attributes = $_POST['Snapshot'];
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
        $dataProvider = new CActiveDataProvider('Snapshot');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new Snapshot('search');
        $model->unsetAttributes();

        if (isset($_GET['Snapshot'])) {
            $model->attributes = $_GET['Snapshot'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = Snapshot::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'snapshot-form') {
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
