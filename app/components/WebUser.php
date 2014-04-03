<?php

class WebUser extends CWebUser
{
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
    public function getGroupRoles()
    {
        $tree = array('All' => array());

        if (!$this->isGuest) {
            $groups = PermissionHelper::getGroups();
            $roles = PermissionHelper::getRoles();

            foreach (PermissionHelper::getGroupsForAccount($this->id) as $gha) {
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
        $result = array();

        $groups = PermissionHelper::getGroups();

        foreach (PermissionHelper::getGroupsForAccount($this->id) as $gha) {
            if (isset($result[$gha->group_id])) {
                continue;
            }

            $result[$gha->group_id] = $groups[$gha->group_id];
        }

        return $result;
    }

    /**
     * @param string $group
     * @param string $role
     *
     * @return bool
     */
    public function hasRole($group, $role)
    {
        return PermissionHelper::hasRole($this->id, $group, $role);
    }

    /**
     * Checks if the user is an admin.
     * @return boolean
     */
    public function getIsAdmin()
    {
        return $this->hasRole(Group::SYSTEM, Role::DEVELOPER) || $this->hasRole(Group::SYSTEM, Role::SUPER_ADMINISTRATOR);
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

        $operationRoleMap = MetaData::operationToRoles();

        // Handle guests
        if ($this->isGuest) {
            return isset($operationRoleMap[$operation]) ? in_array(Role::GUEST, $operationRoleMap[$operation]) : false;
        }

        if (strpos($operation, '.') !== false) {
            list ($modelClass, $operation) = explode('.', $operation);
        }

        // TODO: Implement this properly.
        if ($operation === 'Add') {
            return true;
        }

        if (isset($modelClass)) {
            return $this->_checkAccessWithModelClass($modelClass, $operation, $params);
        } else {
            return $this->_checkAccessWithoutModelClass($operation);
        }
    }

    /**
     * Checks access against a model class.
     * @param string $modelClass
     * @param string $operation
     * @param array $params
     * @return boolean
     */
    protected function _checkAccessWithModelClass($modelClass, $operation, $params)
    {
        // TODO: Fix P3media properly.
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
        $map = MetaData::operationToRoles();

        if (!isset($map[$operation]) || empty($map[$operation])) {
            return false;
        }

        $roles = array();
        foreach ($map[$operation] as $role) {
            $roles[] = PermissionHelper::roleNameToId($role);
        }

        // TODO add support for checking the group as well (if necessary)

        $criteria = new CDbCriteria();
        $criteria->addInCondition('role_id', $roles);
        $criteria->addCondition('account_id = :userId');
        $criteria->params[':userId'] = $this->id;

        return GroupHasAccount::model()->find($criteria) !== null;
    }
}
