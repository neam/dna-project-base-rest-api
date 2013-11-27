<?php

class m131127_094800_rootUserAuthItems extends CDbMigration
{

    public function up()
    {

        $this->insert("auth_assignment", array(
                                            "itemname" => "Super Administrator",
                                            "userid"  => "1",
                                            "data"  => "N;",
                                       ));

        $this->insert("auth_assignment", array(
                                            "itemname" => "Developer",
                                            "userid"  => "1",
                                            "data"  => "N;",
                                       ));

    }

    public function down()
    {

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