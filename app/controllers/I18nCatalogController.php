<?php

class I18nCatalogController extends Controller
{
    use ItemController {
        ItemController::saveAndContinueOnSuccess as parentSaveAndContinueOnSuccess;
    }

    public $modelClass = "I18nCatalog";

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
                'roles' => array('I18nCatalog.*'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        ));
    }

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['id'])) {
            $model = I18nCatalog::model()->find(
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

    /**
     * Translate workflow
     * @param $id
     * @param $step
     * @param $translateInto
     */
    public function actionTranslate($id, $step, $translateInto)
    {
        $this->scenario = "into_$translateInto-step_$step";
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;
        $po_contents = $model->getParsedPoContentsForTranslation();
        if (isset($_POST['SourceMessage']) && !empty($_POST['SourceMessage'])) {
            foreach ($_POST['SourceMessage'] as $id => $translation) {
                $message = Message::model()->findByAttributes(array(
                    'id' => $id,
                    'language' => $translateInto,
                ));
                if (!isset($message)) {
                    $message = new Message();
                    $message->id = $id;
                    $message->language = $translateInto;
                }
                $message->translation = $translation;
                $message->save();
            }
        }
        if (!empty($po_contents)) {
            $this->performAjaxValidation($model);
            $this->saveAndContinueOnSuccess($model);
            $this->populateWorkflowData(
                $model,
                "translate",
                Yii::t(
                    'app',
                    'Translate into {translateIntoLanguage}',
                    array('{translateIntoLanguage}' => Yii::app()->params["languages"][$translateInto])
                ),
                $translateInto
            );
            $stepCaptions = $model->flowStepCaptions();
            $this->render(
                '/_item/edit',
                array(
                    'model' => $model,
                    'step' => $step,
                    'stepCaption' => $stepCaptions[$step],
                )
            );
        } else {
            Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR, Yii::t('app', 'Subtitles are missing.'));
            $this->redirect(array('/videoFile/edit/info/' . $id, 'translateInto' => $translateInto)); // TODO: Fix URL generation.
        }
    }

    public function saveAndContinueOnSuccess($model)
    {

        if (isset($_POST['import'])) {

            // get file path
            $p3media = P3Media::model()->findByPk($_POST['I18nCatalog']['pot_import_media_id']);
            $fullPath = $p3media->fullPath;

            // read contents of file
            $contents = file_get_contents($fullPath);

            // save to post
            $_POST['I18nCatalog']['po_contents_' . $model->source_language] = $contents;

            // emulate us hitting the save button
            $_POST['save-changes'] = true;

        }
        return $this->parentSaveAndContinueOnSuccess($model);

    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new I18nCatalog;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'i18n-catalog-form');

        if (isset($_POST['I18nCatalog'])) {
            $model->attributes = $_POST['I18nCatalog'];

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
        } elseif (isset($_GET['I18nCatalog'])) {
            $model->attributes = $_GET['I18nCatalog'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'i18n-catalog-form');

        if (isset($_POST['I18nCatalog'])) {
            $model->attributes = $_POST['I18nCatalog'];


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
        $es = new TbEditableSaver('I18nCatalog'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['I18nCatalog'])) {
            $model = new I18nCatalog;
            $model->attributes = $_POST['I18nCatalog'];
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
        $dataProvider = new CActiveDataProvider('I18nCatalog');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new I18nCatalog('search');
        $model->unsetAttributes();

        if (isset($_GET['I18nCatalog'])) {
            $model->attributes = $_GET['I18nCatalog'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = I18nCatalog::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'i18n-catalog-form') {
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
