<?php

class m131120_235500_remove_null_versions extends EDbMigration
{
    public function up()
    {
        $qaModels = DataModel::qaModels();
        foreach ($qaModels as $modelClass => $table) {
            $this->execute("UPDATE $table SET version = 1 WHERE version IS NULL OR version = 0");
        }

    }

    public function down()
    {
        echo "m131120_235500_remove_null_versions does not support migration down.\n";
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