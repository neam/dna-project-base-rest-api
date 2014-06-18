<?php

class m140603_132628_alter_account_table extends EDbMigration
{
    public function safeUp()
    {
        $this->addColumn('account', 'salt', 'string NOT NULL');
        $this->addColumn('account', 'passwordStrategy', "string NOT NULL DEFAULT 'legacy'");
        $this->addColumn('account', 'requireNewPassword', "boolean NOT NULL DEFAULT '0'");
        $this->addColumn('account', 'lastLoginAt', 'timestamp NULL DEFAULT NULL');
        $this->addColumn('account', 'lastActiveAt', 'timestamp NULL DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('account', 'salt');
        $this->dropColumn('account', 'passwordStrategy');
        $this->dropColumn('account', 'requireNewPassword');
        $this->dropColumn('account', 'lastLoginAt');
        $this->dropColumn('account', 'lastActiveAt');
    }
}
