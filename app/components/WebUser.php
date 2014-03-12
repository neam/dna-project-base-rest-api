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
            PermissionHelper::groupNameToId('GapminderOrg'),
            PermissionHelper::roleNameToId($roleName)
        );
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