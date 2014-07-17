<?php

class WebUser extends \nordsoftware\yii_account\components\WebUser
{
    const PROFILE_RETURN_URL = 'profileReturnUrl';

    /**
     * @var Account
     */
    protected $_model;

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
        Yii::log("checkModelOperationAccess - operation: $operation", CLogger::LEVEL_INFO);

        // owner-based
        if ($model->owner_id == Yii::app()->user->id) {
            return true;
        }

        return $this->checkAccess($operation, $params);
    }

    /**
     * Loads an Account model.
     * @return CActiveRecord|null
     */
    /*
    public function loadAccount()
    {
        if ($this->isGuest) {
            return null;
        }

        return Account::model()->findByPk($this->id);
    }
    */

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
     * Returns the languages the user is able to translate into.
     * @return array
     */
    public function getTranslatableLanguages()
    {
        return !$this->isGuest
            ? $this->getModel()->profile->getTranslatableLanguages()
            : array();
    }

    /**
     * Checks if the user is able to translate into the given language.
     * @param string $language
     * @return boolean
     */
    public function canTranslateInto($language)
    {
        return array_key_exists($language, $this->getTranslatableLanguages());
    }

    /**
     * Checks if the user is an admin.
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->isGuest) {
            return false;
        }

        $account = Account::model()->findByPk($this->id);

        return (int) $account->superuser === 1;
    }

    /**
     * Checks if the user is a group administrator.
     * @return bool
     */
    public function isGroupAdmin()
    {
        return $this->hasRole(Role::GROUP_ADMINISTRATOR);
    }

    /**
     * Checks if the user is a translator.
     * @return bool
     */
    public function getIsTranslator()
    {
        return $this->hasRole(Role::GROUP_TRANSLATOR);
    }

    /**
     * Checks if the user is a reviewer.
     * @return bool
     */
    public function getIsReviewer()
    {
        return $this->hasRole(Role::GROUP_REVIEWER);
    }

    /**
     * Checks if the user has the given role.
     * @param string $roleName (use role name constants, e.g. Role::GROUP_TRANSLATOR).
     * @return bool
     */
    public function hasRole($roleName)
    {
        if (!$this->isGuest) {
            $attributes = array(
                'account_id' => $this->id,
                'role_id' => PermissionHelper::roleNameToId($roleName),
            );

            return PermissionHelper::groupHasAccount($attributes);
        } else {
            return false;
        }
    }

    /**
     * Returns the profile return URL.
     * @return string
     */
    public function getProfileReturnUrl()
    {
        return Yii::app()->session[self::PROFILE_RETURN_URL];
    }

    /**
     * Sets the profile return URL.
     * @param string $url
     */
    public function setProfileReturnUrl($url)
    {
        Yii::app()->session[self::PROFILE_RETURN_URL] = $url;
    }

    /**
     * Redirects to the profile return URL and resets it.
     */
    public function gotoProfileReturnUrl()
    {
        $returnUrl = !empty($this->profileReturnUrl) ? $this->profileReturnUrl : request()->url;
        $this->setProfileReturnUrl(null); // reset return URL
        Yii::app()->controller->redirect($returnUrl);
    }

    /**
     * Returns (or sets and returns if not set) the user account model from the runtime cache.
     * @return Account
     */
    public function getModel()
    {
        if (!$this->_model instanceof Account) {
            $this->_model = Account::model()->findByPk($this->id);
        }

        return $this->_model;
    }

    /**
     * @return CActiveRecord|null
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
}
