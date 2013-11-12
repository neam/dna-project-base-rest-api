<?php

class PoFileController extends Controller
{

    use ItemController;

    public $modelClass = "PoFile";

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
                    'draftTitle',
                    'draftAbout',
                    'draftFile',
                ),
                'roles' => array(
                    'Item.Draft'
                ),
            ),
            array('allow',
                'actions' => array(),
                'roles' => array(),
            ),
            array('allow',
                'actions' => array(),
                'roles' => array(),
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
                    'editTitle',
                    'editAbout',
                    'editFile',
                ),
                'roles' => array('PoFile.*'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        ));
    }

    public function actionDraft($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_title';
        if (!$model->validate()) {
            $this->redirect(array('PoFile/draftTitle', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_about';
        if (!$model->validate()) {
            $this->redirect(array('PoFile/draftAbout', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_file';
        if (!$model->validate()) {
            $this->redirect(array('PoFile/draftFile', 'id' => $id));
            return;
        }
        // Edit is finished... what now?
    }

    public function actionDraftTitle($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_title';
        $this->scenario = "step_title";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/draft', array('model' => $model, 'step' => 'title', 'stepCaption' => $stepCaptions['title']));
    }

    public function actionDraftAbout($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_about';
        $this->scenario = "step_about";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/draft', array('model' => $model, 'step' => 'about', 'stepCaption' => $stepCaptions['about']));
    }

    public function actionDraftFile($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_file';
        $this->scenario = "step_file";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/draft', array('model' => $model, 'step' => 'file', 'stepCaption' => $stepCaptions['file']));
    }

    public function actionPrepPreshow($id)
    {
        $this->redirect(array('PoFile/prepPublish', 'id' => $id));
    }

    public function actionPrepPublish($id)
    {
        $this->redirect(array('PoFile/edit', 'id' => $id));
    }

    public function actionEdit($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'step_title';
        if (!$model->validate()) {
            $this->redirect(array('PoFile/editTitle', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_about';
        if (!$model->validate()) {
            $this->redirect(array('PoFile/editAbout', 'id' => $id));
            return;
        }
        $model->clearErrors();
        $model->scenario = 'step_file';
        if (!$model->validate()) {
            $this->redirect(array('PoFile/editFile', 'id' => $id));
            return;
        }
        // Edit is finished... what now?
    }


    public function actionEditTitle($id)
    {
        $this->scenario = "step_title";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => 'title', 'stepCaption' => $stepCaptions['title']));
    }

    public function actionEditAbout($id)
    {
        $this->scenario = "step_about";
        $model = $this->saveAndContinueOnSuccess($id);
        $stepCaptions = $model->flowStepCaptions();
        $this->render('/_item/edit', array('model' => $model, 'step' => 'about', 'stepCaption' => $stepCaptions['about']));
    }


    public function beforeAction($action)
    {
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['id'])) {
            $model = PoFile::model()->find(
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
        $model = new PoFile;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'PoFile-form');

        if (isset($_POST['PoFile'])) {
            $model->attributes = $_POST['PoFile'];

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
        } elseif (isset($_GET['PoFile'])) {
            $model->attributes = $_GET['PoFile'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'PoFile-form');

        if (isset($_POST['PoFile'])) {
            $model->attributes = $_POST['PoFile'];


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
        $es = new EditableSaver('PoFile'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['PoFile'])) {
            $model = new PoFile;
            $model->attributes = $_POST['PoFile'];
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
        $dataProvider = new CActiveDataProvider('PoFile');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new PoFile('search');
        $model->unsetAttributes();

        if (isset($_GET['PoFile'])) {
            $model->attributes = $_GET['PoFile'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = PoFile::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'PoFile-form') {
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
