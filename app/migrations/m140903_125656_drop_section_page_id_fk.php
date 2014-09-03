<?php

class m140903_125656_drop_section_page_id_fk extends EDbMigration
{
	public function up()
	{

        $this->getDbConnection()->createCommand(
            "ALTER TABLE `section` DROP FOREIGN KEY `fk_section_page1`;"
        )->query();

        $this->getDbConnection()->createCommand(
            "ALTER TABLE `section` DROP INDEX `fk_section_page1_idx`;"
        )->query();

        $this->getDbConnection()->createCommand(
            "ALTER TABLE `section` DROP COLUMN `page_id`;"
        )->query();

    }

	public function down()
	{
		echo "m140903_125656_drop_section_page_id_fk does not support migration down.\n";
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