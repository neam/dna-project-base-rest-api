<?php

class WebUser extends CWebUser
{
    /**
     * Checks if the user is an admin.
     * @return boolean
     */
    public function getIsAdmin()
    {
        return $this->hasRole('Developer') || $this->hasRole(Role::SUPER_ADMINISTRATOR);
    }

    /**
     * Loads an Account model.
     * @return CActiveRecord|null
     */
    public function loadAccount()
    {
        if ($this->isGuest) {
            return null;
        }

        return Account::model()->findByPk($this->id);
    }

    /**
     * Returns the user's group names.
     * @return array
     */
    public function getRoles()
    {
        $criteria = new CDbCriteria();
        $criteria->addInCondition('group_id', $this->getGroupIds());
        $criteria->addCondition('account_id = :accountId');
        $criteria->params[':accountId'] = $this->id;
        $ghas = GroupHasAccount::model()->findAll($criteria);

        $roleIds = array();
        foreach ($ghas as $gha) {
            $roleIds[] = $gha->role_id;
        }

        $roles = PermissionHelper::getRoles();
        $roleMap = array();
        foreach ($roles as $roleName => $roleId) {
            $roleMap[$roleId] = $roleName;
        }

        $roles = array();
        foreach ($roleIds as $roleId) {
            $roles[$roleId] = $roleMap[$roleId];
        }

        return $roles;
    }

    /**
     * Returns the user's group names.
     * @return array
     */
    public function getGroups()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('account_id = :accountId');
        $criteria->params[':accountId'] = $this->id;

        $groups = GroupHasAccount::model()->findAll($criteria);
        $groupNames = array();

        if (count($groups) > 0) {
            foreach ($groups as $group) {
                $groupNames[$group->group_id] = PermissionHelper::groupIdToName($group->group_id);
            }
        }

        return array_unique($groupNames);
    }

    /**
     * Returns the user's group IDs.
     * @return array
     */
    public function getGroupIds()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('account_id = :accountId');
        $criteria->params[':accountId'] = $this->id;

        $groups = GroupHasAccount::model()->findAll($criteria);
        $groupIds = array();

        if (count($groups) > 0) {
            foreach ($groups as $group) {
                $groupIds[] = $group->group_id;
            }
        }

        return array_unique($groupIds);
    }

    /**
     * @param $roleName
     *
     * @return bool
     */
    public function hasRole($roleName)
    {
        return PermissionHelper::hasRole(
            $this->id,
            'GapminderInternal',
            $roleName
        );
    }

    /**
     * @inheritDoc
     */
    public function checkAccess($operation, $params = array(), $allowCaching = true)
    {
        // Auto-grant access to admins
        if ($this->isAdmin) {
            return true;
        }

        // Handle anonymous users
        if ($this->isGuest) {
            return in_array(Role::ANONYMOUS, MetaData::operationToRolesAndGroups($operation));
        }

        if (strpos($operation, '.') !== false) {
            list ($modelClass, $operation) = explode('.', $operation);
        }

        // TODO: Implement this properly.
        if ($operation === 'Add') {
            return true;
        }

        if (isset($modelClass)) {
            return $this->_checkAccessWithModelClass($operation, $modelClass);
        } else {
            return $this->_checkAccessWithoutModelClass($operation);
        }
    }

    /**
     * Checks access against a model class.
     * @param string $operation
     * @param string $modelClass
     * @return boolean
     */
    protected function _checkAccessWithModelClass($operation, $modelClass)
    {
        // TODO: fix p3media properly
        if ($modelClass === 'P3media') {
            return $operation === 'Import';
        }

        $criteria = new CDbCriteria();

        // Add model ID condition
        if (isset($params['id'])) {
            $criteria->addCondition('t.id = :modelId');
            $criteria->params[':modelId'] = $params['id'];
        }

        $criteria = PermissionHelper::applyAccessCriteria($criteria, MetaData::operationToRolesAndGroups($operation));
        $result = ActiveRecord::model($modelClass)->findAll($criteria, array('roleNames' => MetaData::operationToRolesAndGroups($operation)));
        return count($result) > 0;
    }

    /**
     * Checks access without a model class.
     * @param string $operation
     * @return boolean
     */
    protected function _checkAccessWithoutModelClass($operation)
    {
        $map = MetaData::operationToRolesAndGroupsMap();

        if (isset($map[$operation]['roles'])) {
            // Get role IDs
            $roles = array();
            foreach ($map[$operation]['roles'] as $role) {
                $roles[] = PermissionHelper::roleNameToId($role);
            }

            // Get group IDs
            $groups = array();
            foreach ($map[$operation]['groups'] as $group) {
                $groups[] = PermissionHelper::groupNameToId($group);
            }

            $criteria = new CDbCriteria();
            $criteria->addInCondition('role_id', $roles);
            $criteria->addInCondition('group_id', $groups);
            $criteria->addCondition('account_id = :userId');
            $criteria->params[':userId'] = $this->id;

            return GroupHasAccount::model()->find($criteria) !== null;
        } else {
            return false;
        }
    }
}
