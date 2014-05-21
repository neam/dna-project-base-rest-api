<?php

class m140520_110350_alter_source_message extends EDbMigration
{
    public function up()
    {
        $this->alterColumn('SourceMessage', 'category', 'VARCHAR(255) NULL DEFAULT NULL');
    }

    public function down()
    {
        $this->alterColumn('SourceMessage', 'category', 'VARCHAR(32) NULL DEFAULT NULL');
    }
}