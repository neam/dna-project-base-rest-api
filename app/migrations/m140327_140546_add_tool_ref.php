<?php

class m140327_140546_add_tool_ref extends EDbMigration
{
	public function up()
	{
        $this->execute(
            "ALTER TABLE `tool` ADD COLUMN `ref` VARCHAR(255) NULL DEFAULT NULL AFTER `cloned_from_id`;"
        );
	}

	public function down()
	{
		echo "m140327_140546_add_tool_ref does not support migration down.\n";
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