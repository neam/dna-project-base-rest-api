<?php

class m140814_131556_add_item_slug_unique_indexes extends EDbMigration
{
    protected $tables = array(
        'snapshot',
        'video_file',
    );

	public function up()
	{
        foreach ($this->tables as $table) {
            foreach (LanguageHelper::getCodes() as $language) {
                $this->createIndex("slug_{$language}_UNIQUE", $table, "slug_{$language}", true);
            }
        }
	}

	public function down()
	{
        foreach ($this->tables as $table) {
            foreach (LanguageHelper::getCodes() as $language) {
                $this->dropIndex("slug_{$language}_UNIQUE", $table);
            }
        }
	}
}