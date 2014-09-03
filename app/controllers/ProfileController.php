<?php

class ProfileController extends Controller
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
                    'tasks',
                    'translations',
                    'profile',
                    'history',
                    'edit',
                    'view',
                    'profile',
                ),
                'users' => array('@'),
            ),
            array(
                'allow',
                'actions' => array(
                    'profile',
                ),
                'users' => array('*'),
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
        if (!isset($_GET['id']) && isset($_GET['user_id'])) {
            $model = Profile::model()->find(
                'user_id = :user_id',
                array(
                    ':user_id' => $_GET['user_id']
                )
            );
            if ($model !== null) {
                $_GET['id'] = $model->user_id;
            } else {
                throw new CHttpException(400);
            }
        }
        return true;
    }

    /**
     * Renders the tasks page.
     */
    public function actionTasks()
    {
        $model = Account::model()->findByPk(user()->id);

        $this->buildBreadcrumbs(array(
            Yii::t('app', 'Dashboard'),
        ));

        $this->render(
            'tasks',
            array(
                'model' => $model,
            )
        );
    }

    /**
     * Creates a dropdown button for the given controller action.
     * @param string $label
     * @param string $controllerAction
     * @param bool $modelLabelPlural whether the model label is pluralized (e.g. Videos). Defaults to false (singular).
     * @param array $htmlOptions
     * @return string
     */
    protected function renderItemActionDropdown($label, $controllerAction, $modelLabelPlural = false, $htmlOptions = array())
    {
        if (!isset($htmlOptions['size'])) {
            $htmlOptions['size'] = TbHtml::BUTTON_SIZE_SM; // default button size
        }

        $links = array();

        $modelLabelPluralNumber = $modelLabelPlural ? 2 : 1;

        foreach (DataModel::qaModels() as $modelClass => $tableName) {
            $links[] = array(
                'label' => Yii::t('app', DataModel::modelLabels()[$modelClass], $modelLabelPluralNumber),
                'url' => $this->createUrl('/' . lcfirst($modelClass) . '/' . $controllerAction)
            );
        }

        return TbHtml::buttonDropdown(
            $label,
            $links,
            $htmlOptions
        );
    }

    /**
     * Displays the translations page.
     */
    public function actionTranslations()
    {
        $id = Yii::app()->user->id;
        $model = Account::model()->findByPk(user()->id);
        $this->render('translations', array('model' => $model,));
    }

    /**
     * Displays the history page.
     */
    public function actionHistory()
    {
        $id = Yii::app()->user->id;
        $model = Account::model()->findByPk(user()->id);

        $userChangedItems = new Item('search');
        $userChangedItems->unsetAttributes();
        $userChangedItems->setAttribute("user_id", Yii::app()->user->id);
        $dataProvider = $userChangedItems->search();

        $this->render('history', array('model' => $model, 'dataProvider' => $dataProvider));
    }

    /**
     * Displays a public profile page.
     * @param integer $id account ID
     */
    public function actionProfile($id)
    {
        $model = Account::model()->findByPk($id);
        $this->render('profile', array('model' => $model,));
    }

    /**
     * Displays a profile page.
     * @param integer $id account ID
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);

        $groups = array_merge(MetaData::projectGroups(), MetaData::topicGroups(), MetaData::skillGroups());
        $groupRoles = MetaData::groupRoles();

        $rawData = array();

        $id = 1;
        foreach ($groups as $groupName => $groupLabel) {
            // TODO fix this, must use stdClass because of the stupid TbToggleColumn
            $row = new stdClass();

            $row->id = $id++;
            $row->accountId = $model->id;
            $row->groupName = $groupName;
            $row->groupLabel = $groupLabel;

            foreach ($groupRoles as $roleName => $roleLabel) {
                $row->$roleName = $model->groupRoleIsActive($groupName, $roleName);
            }

            $rawData[] = $row;
        }

        $dataProvider = new CArrayDataProvider(
            $rawData,
            array(
                'id' => 'permissions',
                'pagination' => false,
            )
        );

        $columns = array();

        $columns[] = array(
            'class' => 'CDataColumn',
            'header' => Yii::t('admin', 'Group name'),
            'name' => 'groupLabel',
        );

        $groupModeratorRoles = MetaData::groupModeratorRoles();
        foreach ($groupRoles as $roleName => $roleLabel) {
            if (Yii::app()->user->checkAccess('GrantGroupAdminPermissions')
                || (isset($groupModeratorRoles[$roleName]) && Yii::app()->user->checkAccess('GrantGroupModeratorPermissions'))
            ) {
                $columns[] = array(
                    'class' => 'GroupRoleToggleColumn',
                    'displayText' => false,
                    'header' => $roleLabel,
                    'name' => $roleName,
                    'toggleAction' => 'account/toggleRole',
                    'value' => function ($data) use ($roleName) {
                            return $data->$roleName;
                        },
                );
            }
        }

        $this->render(
            'view',
            array(
                'columns' => $columns,
                'dataProvider' => $dataProvider,
                'model' => $model,
            )
        );
    }

    public function actionCreate()
    {
        $model = new Profile;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'profile-form');

        if (isset($_POST['Profile'])) {
            $model->attributes = $_POST['Profile'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->user_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('user_id', $e->getMessage());
            }
        } elseif (isset($_GET['Profile'])) {
            $model->attributes = $_GET['Profile'];
        }

        $this->render('create', array('model' => $model));
    }

    /**
     * Renders the profile page.
     */
    public function actionEdit()
    {
        $id = user()->id;

        /** @var Account $model */
        $model = Account::model()->findByPk($id);

        $this->performAjaxValidation(array(
            $model,
            $model->profile,
        ));

        if (!request()->isAjaxRequest && isset($_POST['Profile'], $_POST['Account'])) {
            $model->attributes = $_POST['Account'];
            $model->profile->attributes = $_POST['Profile'];

            if ($model->save() && $model->profile->save()) {
                setFlash(TbHtml::ALERT_COLOR_SUCCESS, t('app', 'Your account information has been updated.'));

                $returnUrl = request()->getQuery('returnUrl', false);
                if ($returnUrl) {
                    $this->redirect($this->createUrl($returnUrl));
                }

                $this->refresh();
            }
        }

        $this->buildBreadcrumbs(array(
            Yii::t('app', 'Profile'),
        ));

        $this->render('edit', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'profile-form');

        if (isset($_POST['Profile'])) {
            $model->attributes = $_POST['Profile'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->user_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('user_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        $es = new TbEditableSaver('Profile'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['Profile'])) {
            $model = new Profile;
            $model->attributes = $_POST['Profile'];
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
        $dataProvider = new CActiveDataProvider('Profile');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new Profile('search');
        $model->unsetAttributes();

        if (isset($_GET['Profile'])) {
            $model->attributes = $_GET['Profile'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = Profile::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'profile-form') {
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
