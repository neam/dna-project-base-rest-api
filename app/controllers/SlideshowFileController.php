<?php

class SlideshowFileController extends Controller
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
				'roles' => array('SlideshowFile.*'),
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
			$model = SlideshowFile::model()->find('id = :id', array(
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
		$model = new SlideshowFile;
		$model->scenario = $this->scenario;

		$this->performAjaxValidation($model, 'slideshow-file-form');

		if (isset($_POST['SlideshowFile']))
		{
			$model->attributes = $_POST['SlideshowFile'];

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
		} elseif (isset($_GET['SlideshowFile']))
		{
			$model->attributes = $_GET['SlideshowFile'];
		}

		$this->render('create', array('model' => $model));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		$model->scenario = $this->scenario;

		$this->performAjaxValidation($model, 'slideshow-file-form');

		if (isset($_POST['SlideshowFile']))
		{
			$model->attributes = $_POST['SlideshowFile'];


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
		$es = new EditableSaver('SlideshowFile');  // classname of model to be updated
		$es->update();
	}

	public function actionEditableCreator()
	{
		if (isset($_POST['SlideshowFile']))
		{
			$model = new SlideshowFile;
			$model->attributes = $_POST['SlideshowFile'];
			if ($model->save())
			{
				echo CJSON::encode($model->getAttributes());
			} else
			{
				$errors = array_map(function($v) {
					    return join(', ', $v);
				    }, $model->getErrors());
				echo CJSON::encode(array('errors' => $errors));
			}
		} else
		{
			throw new CHttpException(400, 'Invalid request');
		}
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
		$dataProvider = new CActiveDataProvider('SlideshowFile');
		$this->render('index', array('dataProvider' => $dataProvider,));
	}

	public function actionAdmin()
	{
		$model = new SlideshowFile('search');
		$model->unsetAttributes();

		if (isset($_GET['SlideshowFile']))
		{
			$model->attributes = $_GET['SlideshowFile'];
		}

		$this->render('admin', array('model' => $model,));
	}

	public function loadModel($id)
	{
		$model = SlideshowFile::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, Yii::t('crud', 'The requested page does not exist.'));
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'slideshow-file-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * appendClip() begins recording for concatenation to the end of a clip,
	 * if the clip already exists. If the clip does not already exists, this
	 * method begins recording a new clip of the given name.
	 *
	 * @param object $controller View's controller
	 * @param string $targetClip Name of clip to which to append clipboard
	 */
	public function appendClip($targetClip)
	{
		$currentClip = '';
		if (isset($this->clips[$targetClip]))
			$currentClip = $this->clips[$targetClip];
		$this->beginClip($targetClip);
		echo $currentClip;
	}

}
