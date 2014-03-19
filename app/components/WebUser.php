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
            return PermissionHelper::groupHasAccount(
                array(
                    'account_id' => $this->id,
                    'group_id' => PermissionHelper::groupNameToId($map[$operation]['group']),
                    'role_id' => PermissionHelper::roleNameToId($map[$operation]['role']),
                )
            );
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
