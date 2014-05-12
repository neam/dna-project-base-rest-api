<?php

class m140512_085845_publish_items extends EDbMigration
{
	public function up()
	{
        foreach (array('652', '662', '670', '673') as $nodeId) {
            $this->insert(
                'node_has_group',
                array(
                    'visibility' => 'visible',
                    'node_id' => $nodeId,
                    'group_id' => '1',
                )
            );
        }
	}

	public function down()
	{
		echo "m140512_085845_publish_items does not support migration down.\n";
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