<?php

class SectionController extends Controller
{

    use WorkflowUiControllerTrait, SimplicityControllerTrait;

    public $modelClass = 'Section';

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
                'roles' => array('Section.*'),
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
        return true;
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model,));
    }

    public function actionAdd($pageId)
    {
        $model = new Section();
        $model->page_id = $pageId;

        if ($model->save()) {

            if ($page = Page::model()->findByPk($pageId)) {
                $edge = new Edge();
                $edge->from_node_id = $page->node_id;;
                $edge->to_node_id = $model->node_id;
                $edge->relation = 'sections';
                $edge->save();
            }

            $this->redirect(array('/section/continueAuthoring', 'id' => $model->id));
        }

        $this->redirect(Yii::app()->request->urlReferrer);
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
            if (isset($_POST['Section']['Snapshot'])) {
                $model->setRelationRecords('snapshots', $_POST['Section']['Snapshot']);
            }
            if (isset($_POST['Section']['VideoFile'])) {
                $model->setRelationRecords('videoFiles', $_POST['Section']['VideoFile']);
            }
            if (isset($_POST['Section']['Exercise'])) {
                $model->setRelationRecords('exercises', $_POST['Section']['Exercise']);
            }
            if (isset($_POST['Section']['SlideshowFIle'])) {
                $model->setRelationRecords('slideshoFiles', $_POST['Section']['SlideshowFIle']);
            }
            if (isset($_POST['Section']['DataArticle'])) {
                $model->setRelationRecords('dataArticles', $_POST['Section']['DataArticle']);
            }
            if (isset($_POST['Section']['DownloadLink'])) {
                $model->setRelationRecords('downloadLinks', $_POST['Section']['DownloadLink']);
            }
            if (isset($_POST['Section']['ExamQuestion'])) {
                $model->setRelationRecords('examQuestions', $_POST['Section']['ExamQuestion']);
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
            if (isset($_POST['Section']['Snapshot'])) {
                $model->setRelationRecords('snapshots', $_POST['Section']['Snapshot']);
            } else {
                $model->setRelationRecords('snapshots', array());
            }
            if (isset($_POST['Section']['VideoFile'])) {
                $model->setRelationRecords('videoFiles', $_POST['Section']['VideoFile']);
            } else {
                $model->setRelationRecords('videoFiles', array());
            }
            if (isset($_POST['Section']['Exercise'])) {
                $model->setRelationRecords('exercises', $_POST['Section']['Exercise']);
            } else {
                $model->setRelationRecords('exercises', array());
            }
            if (isset($_POST['Section']['SlideshowFIle'])) {
                $model->setRelationRecords('slideshoFiles', $_POST['Section']['SlideshowFIle']);
            } else {
                $model->setRelationRecords('slideshoFiles', array());
            }
            if (isset($_POST['Section']['DataArticle'])) {
                $model->setRelationRecords('dataArticles', $_POST['Section']['DataArticle']);
            } else {
                $model->setRelationRecords('dataArticles', array());
            }
            if (isset($_POST['Section']['DownloadLink'])) {
                $model->setRelationRecords('downloadLinks', $_POST['Section']['DownloadLink']);
            } else {
                $model->setRelationRecords('downloadLinks', array());
            }
            if (isset($_POST['Section']['ExamQuestion'])) {
                $model->setRelationRecords('examQuestions', $_POST['Section']['ExamQuestion']);
            } else {
                $model->setRelationRecords('examQuestions', array());
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
        $es = new TbEditableSaver('Section'); // classname of model to be updated
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
            throw new CHttpException(400, Yii::t('model', 'Invalid request. Please do not repeat this request again.'));
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
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
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
