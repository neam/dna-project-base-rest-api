<?php

class m140318_135058_fix_admin_roles extends EDbMigration
{
    public $accountId = 1; // admin
    public $group = 'GapminderInternal';

	public function up()
	{
        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Member'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Anonymous'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Developer'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Super Administrator'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Administrator'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Publisher'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Editor'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Approver'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Moderator'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Contributor'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Reviewer'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Translator'),
        ));

        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId($this->group),
            'role_id' => PermissionHelper::roleNameToId('Group Member'),
        ));
	}

	public function down()
	{
        $this->delete(
            'group_has_account',
            'account_id = :account_id',
            array(':account_id' => $this->accountId)
        );
	}
}
