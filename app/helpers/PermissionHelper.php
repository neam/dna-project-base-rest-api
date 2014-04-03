<?php

/**
 * Static helper class for managing permissions in Gapminder.
 */
class PermissionHelper
{
    /**
     * @var array runtime cache for roles.
     */
    private static $_roles = array();

    /**
     * @var array runtime cache for groups.
     */
    private static $_groups = array();

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
     * @param $accountId
     *
     * @return GroupHasAccount[]
     */
    static public function getGroupsForAccount($accountId)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('account_id = :accountId');
        $criteria->params[':accountId'] = $accountId;

        return GroupHasAccount::model()->findAll($criteria);
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
     * @param string $groupId
     *
     * @return bool
     */
    static public function addNodeToGroup($nodeId, $groupId)
    {
        $attributes = array(
            'node_id' => $nodeId,
            'group_id' => self::groupNameToId($groupId),
        );

        if (self::nodeHasGroup($attributes)) {
            return false; // already in group
        }

        Yii::log(sprintf('Adding node #%d to group "%s".', $nodeId, $groupId), CLogger::LEVEL_TRACE, 'permissions');

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
        return array_search($name, self::getRoles());
    }

    /**
     * Converts a role id to its name.
     *
     * @param integer $id
     *
     * @return string
     */
    static public function roleIdToName($id)
    {
        $roles = self::getRoles();
        return isset($roles[$id]) ? $roles[$id] : -1;
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
        return array_search($name, self::getGroups());
    }

    /**
     * Converts a group id to its name.
     *
     * @param integer $id
     *
     * @return string
     */
    static public function groupIdToName($id)
    {
        $groups = self::getGroups();
        return isset($groups[$id]) ? $groups[$id] : -1;
    }

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
                $roles[$model->id] = $model->title;
            }
            self::$_roles = $roles;
        }

        return self::$_roles;
    }

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
                $groups[$model->id] = $model->title;
            }
            self::$_groups = $groups;
        }

        return self::$_groups;
    }

    /**
     * Applies the access restrictions to the given criteria.
     *
     * @param CDbCriteria $criteria
     *
     * @return CDbCriteria
     */
    static public function applyAccessCriteria(CDbCriteria $criteria, $operation = null)
    {
        //$groupRoles = Yii::app()->user->getGroupRoles();

        $joins = array();

        $joins[] = "LEFT JOIN `node_has_group` AS `nhg` ON (`t`.`node_id` = `nhg`.`node_id`)";

        $map = MetaData::operationToRolesMap();

        if ($operation !== null && isset($map[$operation])) {
            $roleIds = array();
            foreach ($map[$operation] as $roleName) {
                $roleIds[] = PermissionHelper::roleNameToId($roleName);
            }
            $roleIds = implode(',', $roleIds);
            $joins[] = "INNER JOIN `group_has_account` AS `gha` ON (`gha`.`group_id` = `nhg`.`group_id` AND `gha`.`role_id` IN ($roleIds) AND `gha`.`account_id` = :accountId)";
        } else {
            $joins[] = "INNER JOIN `group_has_account` AS `gha` ON (`gha`.`group_id` = `nhg`.`group_id` AND `gha`.`account_id` = :accountId)";
        }

        /*
        $counter = 0;
        foreach ($groupRoles as $groupName => $roles) {
            $roleIds = array();

            foreach ($roles as $roleName) {
                $roleIds[] = self::roleNameToId($roleName);
            }

            if (!empty($roleIds)) {
                $ghaTableAlias = "`gha_$counter`";

                $groupId = ":groupId_$counter";
                $roleIds = implode(',', $roleIds);
                $joins[] = "INNER JOIN `group_has_account` AS $ghaTableAlias ON ($ghaTableAlias.`group_id` = $groupId AND $ghaTableAlias.`role_id` IN ($roleIds) AND $ghaTableAlias.`account_id` = :accountId)";
                $criteria->params[$groupId] = PermissionHelper::groupNameToId($groupName);
                $counter++;
            }
        }
        */

        // All items should be found only once.
        $criteria->distinct = true;

        // Apply all the necessary joins to check for group based access.
        $criteria->join = implode(' ', $joins);

        // Restrict access based on the account id.
        //$criteria->addCondition("`gha`.`account_id` = :accountId OR `t`.`owner_id` = :accountId");
        $criteria->params[':accountId'] = Yii::app()->user->id;

        return $criteria;
    }
}
