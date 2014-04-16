<?php

class WebUser extends CWebUser
{

    /**
     * @return array
     */
    public function getSystemRoles()
    {
        $systemRoles = array();
        if ($this->isGuest) {
            $systemRoles[] = Role::GUEST;
        } else {
            $systemRoles[] = Role::AUTHENTICATED;
        }
        return $systemRoles;
    }

    /**
     * Checks access using all different types of access checks.
     * @param string $operation
     * @param array $params
     * @param bool $allowCaching
     * @return bool
     */
    public function checkAccess($operation, $params = array(), $allowCaching = true)
    {
        // TODO Implement caching?

        Yii::log("checkAccess - operation: $operation", CLogger::LEVEL_INFO);

        // Auto-grant access to admins
        if ($this->isAdmin()) {
            Yii::log('isAdmin true', CLogger::LEVEL_INFO);
            return true;
        }

        if ($this->checkSystemRoleBasedAccess($operation)) {
            Yii::log("checkSystemRoleBasedAccess true - operation: $operation", CLogger::LEVEL_INFO);
            return true;
        }

        if ($this->checkGroupRoleBasedAccess($operation)) {
            Yii::log("checkGroupRoleBasedAccess true - operation: $operation", CLogger::LEVEL_INFO);
            return true;
        }

        Yii::log("no access - operation: $operation", CLogger::LEVEL_INFO);

        return false;
    }

    /**
     * Checks access using system-based roles.
     * @param string $operation
     * @return bool
     */
    public function checkSystemRoleBasedAccess($operation)
    {
        $operationRoleMap = MetaData::operationToSystemRolesMap();
        foreach ($this->getSystemRoles() as $role) {
            if (isset($operationRoleMap[$operation]) && in_array($role, $operationRoleMap[$operation])) {
                return true;
            }
        }

        return false;

    }

    /**
     * Checks access using group-based roles.
     * @param string $operation
     * @return bool
     */
    public function checkGroupRoleBasedAccess($operation)
    {
        $operationRoleMap = MetaData::operationToGroupRolesMap();
        foreach ($this->getGroupRoles() as $role) {
            if (isset($operationRoleMap[$operation]) && in_array($role, $operationRoleMap[$operation])) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param CActiveRecord $model
     * @param string $operation
     * @param array $params
     * @return bool
     * @throws CException
     */
    public function checkModelOperationAccess(CActiveRecord $model, $operation, $params = array())
    {
        // owner-based
        if ($model->owner_id == $this->loadAccount()->id) {
            return true;
        }

        throw new CException("TODO");
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
     * Returns the group based roles for the logged in user.
     *
     * The format is the following:
     *
     * array(
     *   'GapminderInternal' => array(
     *     'Contributor',
     *     'Editor',
     *   ),
     *   'Translators' => array(
     *      'Translator',
     *   ),
     * )
     *
     * @return array
     */
    public function getGroupRolesTree()
    {
        $tree = array('All' => array());

        if (!$this->isGuest) {
            $groups = PermissionHelper::getGroups();
            $roles = PermissionHelper::getRoles();

            foreach (PermissionHelper::getGroupHasAccountsForAccount($this->id) as $gha) {
                $groupName = $groups[$gha->group_id];

                if (!isset($tree[$groupName])) {
                    $tree[$groupName] = array();
                }

                $tree[$groupName][] = $roles[$gha->role_id];
            }
        } else {
            $tree['All'][] = Role::GUEST;
        }

        return $tree;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        $assigned = $this->getAssignedGroupsAndRoles();
        return $assigned['groups'];
    }

    /**
     * @return mixed
     */
    public function getGroupRoles()
    {
        $assigned = $this->getAssignedGroupsAndRoles();
        return $assigned['roles'];
    }

    /**
     * @return array
     */
    protected function getAssignedGroupsAndRoles()
    {
        $assigned = array('groups' => array(), 'roles' => array());

        $groups = PermissionHelper::getGroups();
        $roles = PermissionHelper::getRoles();

        foreach (PermissionHelper::getGroupHasAccountsForAccount($this->id) as $gha) {
            if (!isset($assigned['groups'][$gha->group_id])) {
                $assigned['groups'][$gha->group_id] = $groups[$gha->group_id];
            }
            if (!isset($assigned['roles'][$gha->role_id])) {
                $assigned['roles'][$gha->role_id] = $roles[$gha->role_id];
            }
        }

        return $assigned;
    }

    /**
     * Checks if the logged in user belongs to a certain group (with a certain role, if applicable).
     * @param string $group
     * @param string|null $role
     * @return boolean
     */
    public function belongsToGroup($group, $role = null)
    {
        $attributes = array(
            'account_id' => $this->id,
            'group_id' => PermissionHelper::groupNameToId($group),
        );

        if ($role !== null) {
            $attributes['role_id'] = PermissionHelper::roleNameToId($role);
        }

        return PermissionHelper::groupHasAccount($attributes);
    }

//    /**
//     * @param string $group
//     * @param string $role
//     *
//     * @return bool
//     */
//    public function hasRole($group, $role)
//    {
//        return PermissionHelper::hasRole($this->id, $group, $role);
//    }
//
//    /**
//     * Checks if the user is an admin.
//     * @return boolean
//     */
//    public function getIsAdmin()
//    {
//        return $this->hasRole(Group::SYSTEM, Role::DEVELOPER) || $this->hasRole(Group::SYSTEM, Role::SUPER_ADMINISTRATOR);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function _checkAccess($operation, $params = array(), $allowCaching = true)
//    {
//        // Auto-grant access to admins
//        if ($this->isAdmin) {
//            return true;
//        }
//
//        $operationRoleMap = MetaData::operationToRolesMap();
//
//        // Handle guests
//        if ($this->isGuest) {
//            return isset($operationRoleMap[$operation]) ? in_array(Role::GUEST, $operationRoleMap[$operation]) : false;
//        }
//
//        if (strpos($operation, '.') !== false) {
//            list ($modelClass, $operation) = explode('.', $operation);
//        }
//
//        // TODO: Implement this properly.
//        if ($operation === 'Add') {
//            return true;
//        }
//
//        if (isset($modelClass)) {
//            return $this->_checkAccessWithModelClass($modelClass, $operation, $params);
//        } else {
//            return $this->_checkAccessWithoutModelClass($operation);
//        }
//    }
//
//    /**
//     * Checks access against a model class.
//     * @param string $modelClass
//     * @param string $operation
//     * @param array $params
//     * @return boolean
//     */
//    protected function _checkAccessWithModelClass($modelClass, $operation, $params)
//    {
//        // TODO: Fix P3media properly.
//        if ($modelClass === 'P3media') {
//            return $operation === 'Import';
//        }
//
//        /*
//        $map = MetaData::operationToRolesMap();
//
//        if (!isset($map[$operation]) || empty($map[$operation])) {
//            return false;
//        }
//
//        $roles = array();
//        foreach ($map[$operation] as $role) {
//            $roles[] = PermissionHelper::roleNameToId($role);
//        }
//        */
//
//        $criteria = new CDbCriteria();
//
//        // Add model ID condition
//        if (isset($params['id'])) {
//            $criteria->addCondition('t.id = :modelId');
//            $criteria->params[':modelId'] = $params['id'];
//        }
//
//        $criteria = PermissionHelper::applyAccessCriteria($criteria, $operation);
//
//        $result = ActiveRecord::model($modelClass)->findAll($criteria);
//
//        return count($result) > 0;
//    }
//
//    /**
//     * Checks access without a model class.
//     * @param string $operation
//     * @return boolean
//     */
//    protected function _checkAccessWithoutModelClass($operation)
//    {
//        $map = MetaData::operationToRolesMap();
//
//        if (!isset($map[$operation]) || empty($map[$operation])) {
//            return false;
//        }
//
//        $roles = array();
//        foreach ($map[$operation] as $role) {
//            $roles[] = PermissionHelper::roleNameToId($role);
//        }
//
//        // TODO add support for checking the group as well (if necessary)
//
//        $criteria = new CDbCriteria();
//        $criteria->addInCondition('role_id', $roles);
//        $criteria->addCondition('account_id = :userId');
//        $criteria->params[':userId'] = $this->id;
//
//        return GroupHasAccount::model()->find($criteria) !== null;
//    }
}
