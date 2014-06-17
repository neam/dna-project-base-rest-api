<?php

class m140611_092721_alter_account_table_default_password_strategy extends EDbMigration
{
    public function safeUp()
    {
        //$this->alterColumn('account', 'passwordStrategy', "string NOT NULL DEFAULT 'legacy'");
	}

    public function safeDown()
    {
        //$this->alterColumn('account', 'passwordStrategy', 'string NULL DEFAULT NULL');
    }
}
