<?php

/**
 * Static helper class for managing permissions in Gapminder.
 */
class PermissionHelper
{
    /**
     * Adds an account to a specific group.
     *
     * @param int $accountId
     * @param string $group
     * @param string $role
     *
     * @return bool
     */
    static public function addAccountToGroup($accountId, $group, $role)
    {
        $attributes = array(
            'account_id' => $accountId,
            'group_id' => self::groupNameToId($group),
            'role_id' => self::roleNameToId($role),
        );

        if (self::groupHasAccount($attributes)) {
            return false; // already in group
        }

        Yii::log(
            sprintf('Adding account #%d to group "%s" with role "%s".', $accountId, $group, $role),
            CLogger::LEVEL_TRACE,
            'permissions'
        );

        $model = new GroupHasAccount();
        $model->attributes = $attributes;
        $model->save();

        return true;
    }

    /**
     * Removes an account from a specific group.
     *
     * @param int $accountId
     * @param string $group
     * @param string $role
     *
     * @return bool
     */
    static public function removeAccountFromGroup($accountId, $group, $role)
    {
        $attributes = array(
            'account_id' => $accountId,
            'group_id' => self::groupNameToId($group),
            'role_id' => self::roleNameToId($role),
        );

        if (!self::groupHasAccount($attributes)) {
            return false; // not in group
        }

        Yii::log(
            sprintf('Removing account #%d from group "%s" with role "%s".', $accountId, $group, $role),
            CLogger::LEVEL_TRACE,
            'permissions'
        );

        $model = GroupHasAccount::model()->findByAttributes($attributes);
        $model->delete();

        return true;
    }

    /**
     * Returns whether a row with the given attributes exist.
     *
     * @param array $attributes
     *
     * @return bool
     */
    static public function groupHasAccount(array $attributes)
    {
        return GroupHasAccount::model()->findByAttributes($attributes) !== null;
    }

    /**
     * Returns whether the given account has a specific role in a group.
     *
     * @param int $accountId
     * @param string $group
     * @param string $role
     *
     * @return bool
     */
    static public function hasRole($accountId, $group, $role)
    {
        return self::groupHasAccount(
            array(
                'account_id' => $accountId,
                'group_id' => self::groupNameToId($group),
                'role_id' => self::roleNameToId($role),
            )
        );
    }

    /**
     * Adds a node to a specific group.
     *
     * @param int $nodeId
     * @param string $group
     *
     * @return bool
     */
    static public function addNodeToGroup($nodeId, $group)
    {
        $attributes = array(
            'node_id' => $nodeId,
            'group_id' => self::groupNameToId($group),
        );

        if (self::nodeHasGroup($attributes)) {
            return false; // already in group
        }

        Yii::log(sprintf('Adding node #%d to group "%s".', $nodeId, $group), CLogger::LEVEL_TRACE, 'permissions');

        $model = new NodeHasGroup();
        $model->attributes = $attributes;
        $model->save();

        return true;
    }

    /**
     * Removes a node from a specific group.
     *
     * @param int $nodeId
     * @param string $group
     *
     * @return bool
     */
    static public function removeNodeFromGroup($nodeId, $group)
    {
        $attributes = array(
            'node_id' => $nodeId,
            'group_id' => self::groupNameToId($group),
        );

        if (!self::nodeHasGroup($attributes)) {
            return false; // not in group
        }

        Yii::log(sprintf('Removing node #%d from group "%s".', $nodeId, $group), CLogger::LEVEL_TRACE, 'permissions');

        $model = NodeHasGroup::model()->findByAttributes($attributes);
        $model->delete();

        return true;
    }

    /**
     * Returns whether a row with the given attributes exist.
     *
     * @param array $attributes
     *
     * @return bool
     */
    static public function nodeHasGroup(array $attributes)
    {
        return NodeHasGroup::model()->findByAttributes($attributes) !== null;
    }

    /**
     * Converts a role name to its id.
     *
     * @param string $name
     *
     * @return int
     */
    static public function roleNameToId($name)
    {
        $roles = self::getRoles();
        return isset($roles[$name]) ? $roles[$name] : -1;
    }

    /**
     * Converts a group name to its id.
     *
     * @param string $name
     *
     * @return int
     */
    static public function groupNameToId($name)
    {
        $groups = self::getGroups();
        return isset($groups[$name]) ? $groups[$name] : -1;
    }

    /**
     * @var array runtime cache for roles.
     */
    private static $_roles = array();

    /**
     * Return a map over all the roles (name => id).
     *
     * @return array
     */
    static public function getRoles()
    {
        if (empty(self::$_roles)) {
            $roles = array();
            foreach (Role::model()->findAll() as $model) {
                $roles[$model->title] = $model->id;
            }
            self::$_roles = $roles;
        }

        return self::$_roles;
    }

    /**
     * @var array runtime cache for groups.
     */
    private static $_groups = array();

    /**
     * Return a map over all the groups (name => id).
     *
     * @return array
     */
    static public function getGroups()
    {
        if (empty(self::$_groups)) {
            $groups = array();
            foreach (Group::model()->findAll() as $model) {
                $groups[$model->title] = $model->id;
            }
            self::$_groups = $groups;
        }

        return self::$_groups;
    }

    /**
     * Applies the access restrictions to the given criteria.
     *
     * @param CDbCriteria $criteria
     * @param array $groupRoles
     *
     * @return CDbCriteria
     */
    static public function applyAccessCriteria(CDbCriteria $criteria, array $roleNames)
    {
        $roleIds = array();

        foreach ($roleNames as $roleName) {
            $roleIds[] = self::roleNameToId($roleName);
        }

        $roleIds = !empty($roleNames)
            ? implode(', ', $roleIds)
            : '-1'; // TODO: Replace with a safe "null" value, or only conditionally add the "IN ($roleIds)" statement to the query.

        // All items should be found only once.
        $criteria->distinct = true;

        // Apply all the necessary joins to check for group based access.
        $criteria->join = implode(
            ' ',
            array(
                "LEFT JOIN `node_has_group` AS `nhg` ON (`t`.`node_id` = `nhg`.`node_id`)",
                "LEFT JOIN `group_has_account` AS `gha` ON (`gha`.`group_id` = `nhg`.`group_id` AND `gha`.`role_id` IN ($roleIds))", // TODO: Include $roleIds as a criteria param.
            )
        );

        // Restrict access based on the account id.
        $criteria->addCondition("(`gha`.`account_id` = :accountId OR `t`.`owner_id` = :accountId)");
        $criteria->params[':accountId'] = Yii::app()->user->id;

        return $criteria;
    }
}
