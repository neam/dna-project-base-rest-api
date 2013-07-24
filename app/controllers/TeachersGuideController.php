<?php

class TeachersGuideController extends Controller
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
                    'index',
                    'view',
                    'create',
                    'update',
                    'editableSaver',
                    'editableCreator',
                    'admin',
                    'delete',
                ),
                'roles' => array('TeachersGuide.*'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['id'])) {
            $model = TeachersGuide::model()->find('id = :id', array(
                ':id' => $_GET['id']));
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
        $model = new TeachersGuide;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'teachers-guide-form');

        if (isset($_POST['TeachersGuide'])) {
            $model->attributes = $_POST['TeachersGuide'];

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
        } elseif (isset($_GET['TeachersGuide'])) {
            $model->attributes = $_GET['TeachersGuide'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'teachers-guide-form');

        if (isset($_POST['TeachersGuide'])) {
            $model->attributes = $_POST['TeachersGuide'];


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
        $es = new EditableSaver('TeachersGuide'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['TeachersGuide'])) {
            $model = new TeachersGuide;
            $model->attributes = $_POST['TeachersGuide'];
            if ($model->save()) {
                echo CJSON::encode($model->getAttributes());
            } else {
                $errors = array_map(function ($v) {
                    return join(', ', $v);
                }, $model->getErrors());
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
        $dataProvider = new CActiveDataProvider('TeachersGuide');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new TeachersGuide('search');
        $model->unsetAttributes();

        if (isset($_GET['TeachersGuide'])) {
            $model->attributes = $_GET['TeachersGuide'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = TeachersGuide::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('crud', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'teachers-guide-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
