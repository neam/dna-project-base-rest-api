<?php

class m140830_173626_default_utf8_for_schema extends EDbMigration
{

    public function getDbName()
    {
        // Get db name
        $cs = $this->getDbConnection()->connectionString;
        $parts = explode(";", $cs);
        foreach ($parts as $part) {
            $_ = explode("=", $part);
            if ($_[0] == "dbname") {
                return $_[1];
            }
        }
        throw new CException("No db name found");
    }

    public function up()
    {

        $dbName = $this->getDbName();

        $this->getDbConnection()->createCommand(
            "ALTER SCHEMA `$dbName`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_bin;"
        )->query();

    }

    public function down()
    {
        echo "m140830_173626_default_utf8_for_schema does not support migration down.\n";
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