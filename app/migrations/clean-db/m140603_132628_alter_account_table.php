<?php

class m140603_132628_alter_account_table extends EDbMigration
{
	public function safeUp()
	{
        $this->addColumn('account', 'salt', 'string NOT NULL');
        $this->addColumn('account', 'passwordStrategy', 'string NOT NULL');
        $this->addColumn('account', 'requireNewPassword', "boolean NOT NULL DEFAULT '0'");
        $this->addColumn('account', 'lastLoginAt', 'timestamp NULL DEFAULT NULL');
        $this->addColumn('account', 'lastActiveAt', 'timestamp NULL DEFAULT NULL');
        $this->addColumn('account', 'createdAt', "TIMESTAMP NOT NULL DEFAULT 'CURRENT_TIMESTAMP'");
        $this->dropColumn('account', 'create_at');
        $this->dropColumn('account', 'activkey');
        $this->dropColumn('account', 'last_visit_at');
	}

	public function safeDown()
	{
        $this->dropColumn('account', 'salt');
        $this->dropColumn('account', 'passwordStrategy');
        $this->dropColumn('account', 'requireNewPassword');
        $this->dropColumn('account', 'lastLoginAt');
        $this->dropColumn('account', 'lastActiveAt');
        $this->dropColumn('account', 'createdAt');
        $this->addColumn('account', 'create_at', "TIMESTAMP NULL DEFAULT 'CURRENT_TIMESTAMP' AFTER `status`");
        $this->addColumn('account', 'activkey', 'VARCHAR(128) NOT NULL');
        $this->addColumn('account', 'last_visit_at', 'TIMESTAMP NULL');
	}
}