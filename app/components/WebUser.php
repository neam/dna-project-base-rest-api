<?php

class WebUser extends CWebUser
{
    /**
     * @return array
     */
    public function getRoles()
    {
        return array_keys(Yii::app()->authManager->getRoles($this->id));
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
            'GapminderOrg',
            $roleName
        );
    }

    /**
     * @inheritDoc
     */
    public function checkAccess($operation, $params = array(), $allowCaching = true)
    {
        if ($this->getIsAdmin()) {
            return true;
        }

        $map = MetaData::checkAccessToPermissionMap();

        if (isset($map[$operation])) {

            $roles = array();
            foreach ($map[$operation]['roles'] as $role) {
                $roles[] = PermissionHelper::roleNameToId($role);
            }

            $criteria = new CDbCriteria();
            $criteria->addInCondition('role_id', $roles);
            $criteria->addCondition('account_id = :userId');
            $criteria->params[':userId'] = $this->id;
            $criteria->addCondition('group_id = :groupId'); // TODO: should be inCondition later
            $criteria->params[':groupId'] = PermissionHelper::groupNameToId($map[$operation]['group']);

            return GroupHasAccount::model()->find($criteria) !== null;
        }

        return parent::checkAccess($operation, $params, $allowCaching);
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
