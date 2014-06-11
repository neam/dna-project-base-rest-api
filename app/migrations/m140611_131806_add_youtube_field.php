<?php

class m140611_131806_add_youtube_field extends EDbMigration
{
	public function up()
	{
        $this->addColumn('video_file', 'youtube_url', 'VARCHAR(255)');
	}

	public function down()
	{
		$this->dropColumn('video_file', 'youtube_url');
	}

}
