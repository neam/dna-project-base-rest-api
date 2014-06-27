<?php

class AdminController extends Controller
{
    public $defaultAction = 'manageAccounts';

    /**
     * @inheritDoc
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * @inheritDoc
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array(
                    'manage',
                ),
                'roles' => array(Role::SUPER_ADMINISTRATOR),
            ),
        );
    }

    /**
     * Renders the account management page.
     */
    public function actionManageAccounts()
    {
        $dataProvider = new CActiveDataProvider(
            'Account',
            array(
                'pagination' => array(
                    'pageSize' => 20
                ),
            )
        );

        $columns = array(
            array(
                'class' => 'AccountLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->createUrl("admin/editAccountPermissions", array("id" => $data["id"]))',
            ),
            array(
                'class' => 'ActivateLinkColumn',
                'labelExpression' => '(int)$data->status === 0 ? Yii::t("account", "Activate") : ""',
                'urlExpression' => '(int)$data->status === 0 ? Yii::app()->createUrl("admin/activateAccount", array("id" => $data["id"])) : ""',
            ),
            /*
            array(
                'class' => '\TbButtonColumn',
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
            */
        );

        $this->buildBreadcrumbs(array(
            Yii::t('app', 'Accounts'),
        ));

        $this->render(
            'manageAccounts',
            array(
                'dataProvider' => $dataProvider,
                'columns' => $columns,
            )
        );
    }

    /**
     * Renders the account permissions page.
     * @param int $id the account ID.
     */
    public function actionEditAccountPermissions($id)
    {
        $model = Account::model()->findByPk($id);

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
                    'toggleAction' => 'admin/toggleRole',
                    'value' => function($data) use ($roleName) {
                            return $data->$roleName;
                        },
                );
            }
        }

        $this->buildBreadcrumbs(array(
            Yii::t('app', 'Accounts') => array('/admin/manageAccounts'),
            Yii::t('app', 'Permissions'),
        ));

        $this->render(
            'editAccountPermissions',
            array(
                'columns' => $columns,
                'dataProvider' => $dataProvider,
                'model' => $model,
            )
        );
    }

    /**
     * Toggles a role for a given user.
     * @param integer $id the user ID.
     * @param string $attribute the role name.
     */
    public function actionToggleRole($id, $attribute)
    {
        list ($group, $role) = explode('_', $attribute);

        $attributes = array(
            'account_id' => $id,
            'group_id' => PermissionHelper::groupNameToId($group),
            'role_id' => PermissionHelper::roleNameToId($role),
        );

        if (!PermissionHelper::groupHasAccount($attributes)) {
            PermissionHelper::addAccountToGroup($id, $group, $role);
        } else {
            PermissionHelper::removeAccountFromGroup($id, $group, $role);
        }
    }

    /**
     * Activates the given account (if not already activated).
     * @param string $id the account ID.
     */
    public function actionActivateAccount($id)
    {
        $account = Account::model()->findByPk($id);

        if ($account->status > 0) {
            return;
        }

        $account->status = 1;
        $account->save(true, array('status'));

        $this->redirect(array('manageAccounts'));
    }
}
