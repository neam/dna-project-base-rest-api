<?php

class m140318_135058_fix_admin_roles extends EDbMigration
{
    public $accountId = 1; // admin

	public function up()
	{
        $this->insert('group_has_account', array(
            'account_id' => $this->accountId,
            'group_id' => PermissionHelper::groupNameToId(Group::SYSTEM),
            'role_id' => PermissionHelper::roleNameToId(Role::SUPER_ADMINISTRATOR),
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
