<?php

class WebUser extends CWebUser
{
    /**
     * @return array
     */
    public function getRoles()
    {
        $ghas = GroupHasAccount::model()->findAllByAttributes(array(
            'account_id' => $this->id,
            'group_id' => PermissionHelper::groupNameToId('GapminderInternal'),
        ));

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
        if ($this->getIsAdmin()) {
            return true;
        }

        if (strpos($operation, '.') !== false) {
            list ($modelClass, $operation) = explode('.', $operation);
        }

        // TODO: Implement this properly.
        if ($operation === 'Add') {
            return true;
        }

        if (isset($modelClass)) {
            $criteria = new CDbCriteria();

            if (isset($params['id'])) {
                $criteria->addCondition('t.id = :modelId');
                $criteria->params[':modelId'] = $params['id'];
            }

            PermissionHelper::applyAccessCriteria($criteria, MetaData::operationToRoles($operation));

            return ActiveRecord::model($modelClass)->findAll($criteria) !== array();
        } else {
            $map = MetaData::operationToRolesMap();

            if (isset($map[$operation])) {
                // Get role IDs
                $roles = array();
                foreach ($map[$operation] as $role) {
                    $roles[] = PermissionHelper::roleNameToId($role);
                }

                $criteria = new CDbCriteria();
                $criteria->addInCondition('role_id', $roles);
                $criteria->addCondition('account_id = :userId');
                $criteria->params[':userId'] = $this->id;
                $criteria->addCondition('group_id = :groupId'); // TODO: Change to addInCondition when more groups have been implemented.
                $criteria->params[':groupId'] = PermissionHelper::groupNameToId('GapminderInternal');

                return GroupHasAccount::model()->find($criteria) !== null;
            }
        }

        return parent::checkAccess($operation, $params, $allowCaching); // fallback
    }

    /**
     * @return bool
     */
    public function getIsAdmin()
    {
        return $this->hasRole('Developer') || $this->hasRole('Super Administrator');
    }

    /**
     * @return CActiveRecord|null
     */
    public function loadAccount()
    {
        if ($this->isGuest) {
            return null;
        }

        return Account::model()->findByPk($this->id);
    }
}
