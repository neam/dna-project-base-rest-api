<?php

class m140912_083305_no_latin1_in_schema extends EDbMigration
{
    public function up()
    {

        $this->getDbConnection()->createCommand(
            "ALTER TABLE `account_login_history` CONVERT TO CHARACTER SET utf8 , COLLATE utf8_bin;"
        )->query();
        $this->getDbConnection()->createCommand(
            "ALTER TABLE `account_password_history` CONVERT TO CHARACTER SET utf8 , COLLATE utf8_bin;"
        )->query();
        $this->getDbConnection()->createCommand(
            "ALTER TABLE `account_token` CONVERT TO CHARACTER SET utf8 , COLLATE utf8_bin;"
        )->query();

    }

	public function down()
	{
		echo "m140912_083305_no_latin1_in_schema does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
