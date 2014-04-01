<?php

// auto-loading
Yii::setPathOfAlias('Account', dirname(__FILE__));
Yii::import('Account.*');

class Account extends BaseAccount
{
    // Auth item types
    const AUTH_ITEM_TYPE_OPERATION = 0;
    const AUTH_ITEM_TYPE_TASK = 1;
    const AUTH_ITEM_TYPE_ROLE = 2;

    // Add your model-specific methods here. This file will not be overridden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return parent::getItemLabel();
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array()
        );
    }


    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('username, email', 'required'),
            array('username', 'unique', 'allowEmpty' => false, 'message' => Yii::t('app', 'Username already exists.')),
            array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => Yii::t('app', 'Incorrect symbols (A-z0-9).')),
            array('email', 'unique', 'message' => Yii::t('app', 'Email address already exists.')),
            array('email', 'email'),
        ));
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

    /**
     * Returns the auth items.
     * @param integer $type the item type (0: operation, 1: task, 2: role). Defaults to 2 (role).
     * @return array the auth items.
     */
    public function getAuthItems($type = self::AUTH_ITEM_TYPE_ROLE)
    {
        return array_keys(Yii::app()->authManager->getAuthItems($type, $this->id));
    }

    /**
     * Returns the roles.
     * @return array
     */
    public function getRoles()
    {
        return array('@todo'); // TODO: Get roles.
    }

    /**
     * Checks if the item has a group.
     * @param string $group
     * @param string $role
     * @return boolean
     */
    public function belongsToGroup($group, $role)
    {
        return PermissionHelper::groupHasAccount(array(
            'account_id' => $this->id,
            'group_id' => PermissionHelper::groupNameToId($group),
            'role_id' => PermissionHelper::roleNameToId($role),
        ));
    }

    /**
     * Checks if a role and its associated groups are active.
     * @param string $roleName
     * @return boolean
     */
    public function roleIsActive($roleName)
    {
        $roleId = PermissionHelper::roleNameToId($roleName);
        $roleToGroupsMap = MetaData::roleToGroupsMap($roleName);
        $groups = isset($roleToGroupsMap[$roleName]) ? $roleToGroupsMap[$roleName] : array();
        $groupCount = count($groups);
        $groupHasAccountCount = 0;

        foreach ($groups as $group) {
            $groupHasAccount = PermissionHelper::groupHasAccount(
                array(
                    'account_id' => $this->id,
                    'group_id' => PermissionHelper::groupNameToId($group),
                    'role_id' => $roleId,
                )
            );

            if ($groupHasAccount) {
                $groupHasAccountCount++;
            }
        }

        return (int) $groupHasAccountCount === (int) $groupCount;
    }
}
