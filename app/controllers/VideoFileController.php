<?php

use Alchemy\Zippy\Zippy;

class VideoFileController extends Controller
{

    use WorkflowUiControllerTrait {
        WorkflowUiControllerTrait::saveAndContinueOnSuccess as parentSaveAndContinueOnSuccess;
    }
    use SimplicityControllerTrait;

    public $modelClass = 'VideoFile';

    #public $layout='//layouts/column2';

    public $defaultAction = "browse";
    public $scenario = "crud";

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array_merge(
            $this->itemAccessRules(),
            array(
                array('allow',
                    'actions' => array(
                        'subtitles',
                        'downloadSubtitles',
                    ),
                    'users' => array('*'),
                ),
                array('allow',
                    'actions' => array(
                        'index',
                        'view',
                    ),
                    'users' => array('@'),
                ),
                array('allow',
                    'actions' => array(
                        'view',
                        'create',
                        'update',
                        'editableSaver',
                        'editableCreator',
                        'admin',
                        'delete',
                    ),
                    'roles' => array('VideoFile.*'),
                ),
                array(
                    'deny',
                    'users' => array('*'),
                ),
            )
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
        $this->step = $step;

        $this->scenario = "into_$translateInto-step_$step";
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        // Verify the validity of the source contents subtitles
        if ($step == "subtitles") {
            try {

                $subtitles = $model->getParsedSubtitles();

                if (empty($subtitles)) {
                    Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_DANGER, Yii::t('app', 'Unable to translate subtitles: subtitles are missing.'));
                    throw new VideoFileSubtitleParseException();
                }

            } catch (VideoFileSubtitleParseException $e) {
                Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_DANGER, Yii::t('app', 'Unable to translate video: subtitles are missing or could not be parsed.'));
                // TODO: Redirect to edit subtitles if have permission
                $this->redirect(array(
                    '/videoFile/view',
                    'id' => $model->{$model->tableSchema->primaryKey},
                    //'step' => 'subtitles',
                ));
                return;
            }
        }

        /** @var Controller|WorkflowUiControllerTrait $this */
        $this->buildBreadcrumbs($this->itemBreadcrumbs($model));

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

        $this->performAjaxValidation($model);
        $this->saveAndContinueOnSuccess($model);
        $this->populateWorkflowData(
            $model,
            'translate_into_' . $translateInto,
            Yii::t(
                'app',
                'Translate into {translateIntoLanguage}',
                array('{translateIntoLanguage}' => LanguageHelper::getName($translateInto))
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
    }

    public function actionSubtitles($id)
    {
        $model = $this->loadModel($id);

        $parsedSubtitles = $model->getParsedSubtitles();
        echo $model->getTranslatedSubtitles($parsedSubtitles);

        exit;
    }

    protected function videofileSections($videofile)
    {
        return $sections;
    }

    public function saveAndContinueOnSuccess($model)
    {

        if (isset($_POST['import'])) {

            // get file path
            $p3media = P3Media::model()->findByPk($_POST['VideoFile']['subtitles_import_media_id']);
            $fullPath = $p3media->fullPath;

            // read contents of file
            $contents = file_get_contents($fullPath);

            // save to post
            $_POST['VideoFile']['subtitles'] = $contents;

            // emulate us hitting the save button
            $_POST['save-changes'] = true;

        }
        return $this->parentSaveAndContinueOnSuccess($model);

    }

    /**
     * Renders the view page.
     * @param int $id the model ID.
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);

        /** @var Controller|WorkflowUiControllerTrait $this */
        $this->buildBreadcrumbs($this->itemBreadcrumbs($model));

        $this->render(
            'view',
            array(
                'model' => $model,
            )
        );
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
        $es = new TbEditableSaver('VideoFile'); // classname of model to be updated
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
        $this->render('index', array('dataProvider' => $dataProvider));
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

    /**
     * @param $id
     * @return VideoFile
     * @throws CHttpException
     */
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'item-form') {
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

    /**
     * Action for downloading all video subtitles as a zip file.
     * @param int $id model id.
     * @throws CException if the zip archive cannot be created.
     */
    public function actionDownloadSubtitles($id)
    {
        $model = $this->loadModel($id);

        $runtimePath = Yii::app()->getRuntimePath();
        $hash = sha1(microtime(true));
        $basePath = "$runtimePath/video_subtitles_{$model->id}_$hash";

        if (!mkdir($basePath)) {
            throw new CException('Failed to create temporary directory for subtitles.');
        }

        $paths = array();

        $fileName = "subtitles.srt";
        $path = "$basePath/{$fileName}";
        file_put_contents($path, $model->subtitles);
        $paths[$fileName] = $path;

        foreach (LanguageHelper::getCodes() as $locale) {
            $fileName = "subtitles_$locale.srt";
            $path = "$basePath/{$fileName}";
            $attribute = "subtitles_$locale";
            if (!empty($model->$attribute)) {
                file_put_contents($path, $model->$attribute);
                $paths[$fileName] = $path;
            }
        }

        $fileName = "srt.zip";
        $filePath = "$basePath/$fileName";

        $zip = Zippy::load();
        $zip->create($filePath, $paths);

        Yii::app()->request->sendFile($fileName, file_get_contents($filePath));
    }

    /**
     * Returns a data provider for translating subtitles.
     * @param VideoFile $model
     * @return CArrayDataProvider
     */
    public function getSubtitleTranslationDataProvider(VideoFile $model)
    {
        $subtitles = $model->getParsedSubtitles();
        return new CArrayDataProvider(array_values($subtitles), array(
            'id' => 'user',
            'sort' => array(
                'attributes' => array(
                    'id',
                    'timestamp',
                    'sourceMessage',
                ),
            ),
            'pagination' => false,
        ));
    }
}
