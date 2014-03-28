<?php

class AccountController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";

    public function filters()
    {
        return array(
            'accessControl',
            'ajaxOnly + toggleRole',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array(
                    'admin',
                    'toggleRole',
                    'delete',
                    'deleteRelations',
                ),
                'roles' => array('Super Administrator'),
            ),
            array(
                'allow',
                'actions' => array(
                    'index',
                    'view',
                    'create',
                    'update',
                    'editableSaver',
                    'editableCreator',
                    'delete',
                ),
                'roles' => array('Account.*'),
            ),
            array(
                'allow',
                'actions' => array(
                    'publicProfile',
                ),
                'users' => array('*'),
            ),
            array(
                'allow',
                'actions' => array(
                    'dashboard',
                    'translations',
                    'profile',
                    'history',
                    'addToGroup',
                    'removeFromGroup',
                ),
                'users' => array('@'),
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
            $model = Account::model()->find(
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

    public function actionDashboard()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);

        $lang1 = $model->profile->language1;
        $lang2 = $model->profile->language2;
        $lang3 = $model->profile->language3;

        $lang1Sql = "SELECT i.id as id, i.model_class, i._title, 'TranslateIntoPrimaryLanguage' AS action,
                    translate_into_{$lang1}_validation_progress AS progress,
                    0 AS relevance
                    FROM `item` i,account user INNER JOIN profile profile WHERE user.id = :user_id AND profile.language1 IS NOT NULL AND i.id IS NOT NULL";

        $lang2Sql = "SELECT i.id as id, i.model_class, i._title, 'TranslateIntoSecondaryLanguage' AS action,
                    translate_into_{$lang2}_validation_progress AS progress,
                    0 AS relevance
                    FROM `item` i,account user INNER JOIN profile profile WHERE user.id = :user_id AND profile.language2 IS NOT NULL AND i.id IS NOT NULL";

        $lang3Sql = "SELECT i.id as id, i.model_class, i._title, 'TranslateIntoTertiaryLanguage' AS action,
                    translate_into_{$lang3}_validation_progress AS progress,
                    0 AS relevance
                    FROM `item` i,account user INNER JOIN profile profile WHERE user.id = :user_id AND profile.language3 IS NOT NULL AND i.id IS NOT NULL";

        $fillProfileLanguageSql = "SELECT 0 as id, '' as model_class, '' as _title, 'SupplyProfileLanguages' AS action, CASE
                           WHEN (profile.language1 IS NOT NULL OR profile.language2 IS NOT NULL OR profile.language2 IS NOT NULL) THEN 100
                           ELSE 0
                       END
                    AS progress,
                    9999 AS relevance
                    FROM account INNER JOIN profile ON account.id = profile.user_id AND account.id = :user_id";

        $sqls = array();
        if (is_null($lang1) && is_null($lang2) && is_null($lang3)) {
            $sqls[] = $fillProfileLanguageSql;
        }
        if (!is_null($lang1)) {
            $sqls[] = $lang1Sql;
        }
        if (!is_null($lang2)) {
            $sqls[] = $lang2Sql;
        }
        if (!is_null($lang3)) {
            $sqls[] = $lang3Sql;
        }

        // Dashboard items query
        $virtualDashboardActionTableSql = implode("\nUNION ALL\n", $sqls);

        // if checkaccess Editor
        //where status IS NOT Null

        //if checkaccess Translator
        //where status IN ('PUBLIC') OR own

        $mainCommand = Yii::app()->db->createCommand('SELECT * FROM (' . $virtualDashboardActionTableSql . ') as dashboard_action');
        $countCommand = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $virtualDashboardActionTableSql . ') as dashboard_action');
        $mainCommand->params = $countCommand->params = array(':user_id' => Yii::app()->user->id);

        $dataProvider = new CSqlDataProvider($mainCommand, array(
            'totalItemCount' => $countCommand->queryScalar(),
            'sort' => array(
                'attributes' => array(
                    'relevance, progress',
                ),
                'defaultOrder' => array(
                    'relevance, progress ASC',
                ),
            ),
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));

        $this->render('dashboard', array('model' => $model, 'dataProvider' => $dataProvider));
    }

    public function actionTranslations()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $this->render('translations', array('model' => $model,));
    }

    public function actionProfile()
    {
        $id = user()->id;

        /** @var Account $model */
        $model = $this->loadModel($id);

        $this->performAjaxValidation(array(
            $model,
            $model->profile,
        ));

        if (!request()->isAjaxRequest && isset($_POST['Profile'], $_POST['Account'])) {
            $model->attributes = $_POST['Account'];
            $model->profile->attributes = $_POST['Profile'];

            if ($model->save() && $model->profile->save()) {
                setFlash(TbHtml::ALERT_COLOR_SUCCESS, t('app', 'Your account information has been updated.'));
                $this->refresh();
            }
        }

        $this->render('profile', array(
            'model' => $model,
        ));
    }

    public function actionHistory()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);

        $userChangedItems = new Item('search');
        $userChangedItems->unsetAttributes();
        $userChangedItems->setAttribute("user_id", Yii::app()->user->id);
        $dataProvider = $userChangedItems->search();

        $this->render('history', array('model' => $model, 'dataProvider' => $dataProvider));
    }

    public function actionPublicProfile($id)
    {
        $model = $this->loadModel($id);
        $this->render('public-profile', array('model' => $model,));
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new Account;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'account-form');

        if (isset($_POST['Account'])) {
            $model->attributes = $_POST['Account'];

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
        } elseif (isset($_GET['Account'])) {
            $model->attributes = $_GET['Account'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'account-form');

        if (isset($_POST['Account'])) {
            $model->attributes = $_POST['Account'];


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
        $es = new TbEditableSaver('Account'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['Account'])) {
            $model = new Account;
            $model->attributes = $_POST['Account'];
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

    /**
     * Deletes an account.
     * @param integer $id the account ID.
     * @throws CHttpException if unable to delete.
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            /** @var CDbTransaction $transaction */
            $transaction = Yii::app()->db->beginTransaction();

            try {
                $this->deleteRelations($id);
                $this->loadModel($id)->delete();
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollback();
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

    /**
     * Deletes account-related records to satisfy the foreign key constraints.
     * @param integer $id the account ID.
     */
    public function deleteRelations($id)
    {
        // TODO: Delete account-related records.
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Account');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new Account('search');
        $model->unsetAttributes();

        if (isset($_GET['Account'])) {
            $model->attributes = $_GET['Account'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Toggles a role for a given user.
     * @param integer $id the user ID.
     * @param string $attribute the role name.
     */
    public function actionToggleRole($id, $attribute)
    {
        $groups = MetaData::roleToGroupsMap($attribute);

        foreach ($groups as $group) {
            $attributes = array(
                'account_id' => $id,
                'group_id' => PermissionHelper::groupNameToId($group),
                'role_id' => PermissionHelper::roleNameToId($attribute),
            );

            // TODO: Fix.
            if (!PermissionHelper::groupHasAccount($attributes)) {
                PermissionHelper::addAccountToGroup($id, $group, $attribute);
            } else {
                PermissionHelper::removeAccountFromGroup($id, $group, $attribute);
            }
        }
    }

    /**
     * @param string $id
     * @param string $group
     * @param string $role
     */
    public function actionAddToGroup($id, $group, $role, $returnUrl)
    {
        PermissionHelper::addAccountToGroup($id, $group, $role);
        $this->redirect(TbHtml::decode($returnUrl));
    }

    /**
     * @param string $id
     * @param string $group
     * @param string $role
     */
    public function actionRemoveFromGroup($id, $group, $role, $returnUrl)
    {
        PermissionHelper::removeAccountFromGroup($id, $group, $role);
        $this->redirect(TbHtml::decode($returnUrl));
    }

    public function loadModel($id)
    {
        if (is_null($id)) {
            $id = Yii::app()->user->id;
        }
        $model = Account::model()->findByPk($id);
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
