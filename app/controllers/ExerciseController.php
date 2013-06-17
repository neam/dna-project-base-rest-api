<?php

class ExerciseController extends Controller
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
				'actions' => array('create', 'editableSaver', 'update', 'delete', 'admin', 'index', 'view'),
				'roles' => array('Exercise.*'),
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
		if (!isset($_GET['id']) && isset($_GET['id']))
		{
			$model = Exercise::model()->find('id = :id', array(
				':id' => $_GET['id']));
			if ($model !== null)
			{
				$_GET['id'] = $model->id;
			} else
			{
				throw new CHttpException(400);
			}
		}
		if ($this->module !== null)
		{
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
		$model = new Exercise;
		$model->scenario = $this->scenario;

		$this->performAjaxValidation($model, 'exercise-form');

		if (isset($_POST['Exercise']))
		{
			$model->attributes = $_POST['Exercise'];

			try {
				if ($model->save())
				{
					if (isset($_GET['returnUrl']))
					{
						$this->redirect($_GET['returnUrl']);
					} else
					{
						$this->redirect(array('view', 'id' => $model->id));
					}
				}
			} catch (Exception $e) {
				$model->addError('id', $e->getMessage());
			}
		} elseif (isset($_GET['Exercise']))
		{
			$model->attributes = $_GET['Exercise'];
		}

		$this->render('create', array('model' => $model));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		$model->scenario = $this->scenario;

		$this->performAjaxValidation($model, 'exercise-form');

		if (isset($_POST['Exercise']))
		{
			$model->attributes = $_POST['Exercise'];


			try {
				if ($model->save())
				{
					if (isset($_GET['returnUrl']))
					{
						$this->redirect($_GET['returnUrl']);
					} else
					{
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
		$es = new EditableSaver('Exercise');  // classname of model to be updated
		$es->update();
	}

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest)
		{
			try {
				$this->loadModel($id)->delete();
			} catch (Exception $e) {
				throw new CHttpException(500, $e->getMessage());
			}

			if (!isset($_GET['ajax']))
			{
				if (isset($_GET['returnUrl']))
				{
					$this->redirect($_GET['returnUrl']);
				} else
				{
					$this->redirect(array('admin'));
				}
			}
		}
		else
			throw new CHttpException(400, Yii::t('crud', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Exercise');
		$this->render('index', array('dataProvider' => $dataProvider,));
	}

	public function actionAdmin()
	{
		$model = new Exercise('search');
		$model->unsetAttributes();

		if (isset($_GET['Exercise']))
		{
			$model->attributes = $_GET['Exercise'];
		}

		$this->render('admin', array('model' => $model,));
	}

	public function loadModel($id)
	{
		$model = Exercise::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, Yii::t('crud', 'The requested page does not exist.'));
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'exercise-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
