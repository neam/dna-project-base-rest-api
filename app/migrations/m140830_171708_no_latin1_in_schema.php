<?php

class m140830_171708_no_latin1_in_schema extends EDbMigration
{
	public function up()
	{

        $this->getDbConnection()->createCommand(
            "ALTER TABLE `account_login_history` CHARACTER SET = utf8 , COLLATE = utf8_bin;"
        )->query();
        $this->getDbConnection()->createCommand(
            "ALTER TABLE `account_password_history` CHARACTER SET = utf8 , COLLATE = utf8_bin;"
        )->query();
        $this->getDbConnection()->createCommand(
            "ALTER TABLE `account_token` CHARACTER SET = utf8 , COLLATE = utf8_bin;"
        )->query();

    }

	public function down()
	{
		echo "m140830_171708_no_latin1_in_schema does not support migration down.\n";
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