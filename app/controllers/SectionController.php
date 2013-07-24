<?php

class SectionController extends Controller
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
            array(
                'allow',
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
                'roles' => array('Section.*'),
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
            $model = Section::model()->find(
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
        $model = new Section;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'section-form');

        if (isset($_POST['Section'])) {
            $model->attributes = $_POST['Section'];

            if (isset($_POST['Section']['HtmlChunk'])) {
                $model->setRelationRecords('htmlChunks', $_POST['Section']['HtmlChunk']);
            }
            if (isset($_POST['Section']['VizView'])) {
                $model->setRelationRecords('vizViews', $_POST['Section']['VizView']);
            }
            if (isset($_POST['Section']['VideoFile'])) {
                $model->setRelationRecords('videoFiles', $_POST['Section']['VideoFile']);
            }
            if (isset($_POST['Section']['TeachersGuide'])) {
                $model->setRelationRecords('teachersGuides', $_POST['Section']['TeachersGuide']);
            }
            if (isset($_POST['Section']['Exercise'])) {
                $model->setRelationRecords('exercises', $_POST['Section']['Exercise']);
            }
            if (isset($_POST['Section']['Presentation'])) {
                $model->setRelationRecords('presentations', $_POST['Section']['Presentation']);
            }
            if (isset($_POST['Section']['DataChunk'])) {
                $model->setRelationRecords('dataChunks', $_POST['Section']['DataChunk']);
            }
            if (isset($_POST['Section']['DownloadLink'])) {
                $model->setRelationRecords('downloadLinks', $_POST['Section']['DownloadLink']);
            }
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
        } elseif (isset($_GET['Section'])) {
            $model->attributes = $_GET['Section'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'section-form');

        if (isset($_POST['Section'])) {
            $model->attributes = $_POST['Section'];

            if (isset($_POST['Section']['HtmlChunk'])) {
                $model->setRelationRecords('htmlChunks', $_POST['Section']['HtmlChunk']);
            } else {
                $model->setRelationRecords('htmlChunks', array());
            }
            if (isset($_POST['Section']['VizView'])) {
                $model->setRelationRecords('vizViews', $_POST['Section']['VizView']);
            } else {
                $model->setRelationRecords('vizViews', array());
            }
            if (isset($_POST['Section']['VideoFile'])) {
                $model->setRelationRecords('videoFiles', $_POST['Section']['VideoFile']);
            } else {
                $model->setRelationRecords('videoFiles', array());
            }
            if (isset($_POST['Section']['TeachersGuide'])) {
                $model->setRelationRecords('teachersGuides', $_POST['Section']['TeachersGuide']);
            } else {
                $model->setRelationRecords('teachersGuides', array());
            }
            if (isset($_POST['Section']['Exercise'])) {
                $model->setRelationRecords('exercises', $_POST['Section']['Exercise']);
            } else {
                $model->setRelationRecords('exercises', array());
            }
            if (isset($_POST['Section']['Presentation'])) {
                $model->setRelationRecords('presentations', $_POST['Section']['Presentation']);
            } else {
                $model->setRelationRecords('presentations', array());
            }
            if (isset($_POST['Section']['DataChunk'])) {
                $model->setRelationRecords('dataChunks', $_POST['Section']['DataChunk']);
            } else {
                $model->setRelationRecords('dataChunks', array());
            }
            if (isset($_POST['Section']['DownloadLink'])) {
                $model->setRelationRecords('downloadLinks', $_POST['Section']['DownloadLink']);
            } else {
                $model->setRelationRecords('downloadLinks', array());
            }

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
        $es = new EditableSaver('Section'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['Section'])) {
            $model = new Section;
            $model->attributes = $_POST['Section'];
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
        $dataProvider = new CActiveDataProvider('Section');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new Section('search');
        $model->unsetAttributes();

        if (isset($_GET['Section'])) {
            $model->attributes = $_GET['Section'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = Section::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('crud', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'section-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
