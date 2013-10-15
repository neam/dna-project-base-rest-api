<?php

class WorkflowController extends Controller
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
                'roles' => array('Workflow.*'),
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
        if (!isset($_GET['id']) && isset($_GET['workflow_id'])) {
            $model = Workflow::model()->find(
                'workflow_id = :workflow_id',
                array(
                    ':workflow_id' => $_GET['workflow_id']
                )
            );
            if ($model !== null) {
                $_GET['id'] = $model->workflow_id;
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

        // Create a in-memory version of the current workflow
        $workflowBuilt = Yii::app()->ezc->buildWorkflow($model->workflow_name, true);

        // Generate GraphViz/dot markup for workflow
        $graphVizSyntaxBuilt = Yii::app()->ezc->graphVizSyntax($workflowBuilt);

        // Set up workflow definition storage (database).
        $definition = Yii::app()->ezc->getWorkflowDatabaseDefinitionStorage();

        // Load the current workflow from database
        $workflowStored = $definition->loadById($model->workflow_id);

        // Generate GraphViz/dot markup for workflow
        $graphVizSyntaxStored = Yii::app()->ezc->graphVizSyntax($workflowStored);

        $this->render('view', array('model' => $model, 'graphVizSyntaxBuilt' => $graphVizSyntaxBuilt, 'graphVizSyntaxStored' => $graphVizSyntaxStored));

    }

    public function actionCreate()
    {
        $model = new Workflow;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'workflow-form');

        if (isset($_POST['Workflow'])) {
            $model->attributes = $_POST['Workflow'];

            try {

                // Set up database connection.
                $db =& Yii::app()->ezc->db;

                // Set up workflow definition storage (database).
                $definition = new ezcWorkflowDatabaseDefinitionStorage($db);

                // Create a in-memory version of the current workflow
                $workflow = Yii::app()->ezc->buildWorkflow($model->workflow_name);

                // Save workflow definition to database.
                $definition->save($workflow);

                if (true /*$model->save()*/) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->workflow_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('workflow_id', $e->getMessage());
            }
        } elseif (isset($_GET['Workflow'])) {
            $model->attributes = $_GET['Workflow'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'workflow-form');

        if (isset($_POST['Workflow'])) {
            $model->attributes = $_POST['Workflow'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->workflow_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('workflow_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('Workflow'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['Workflow'])) {
            $model = new Workflow;
            $model->attributes = $_POST['Workflow'];
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
        $dataProvider = new CActiveDataProvider('Workflow');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new Workflow('search');
        $model->unsetAttributes();

        if (isset($_GET['Workflow'])) {
            $model->attributes = $_GET['Workflow'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = Workflow::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'workflow-form') {
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
