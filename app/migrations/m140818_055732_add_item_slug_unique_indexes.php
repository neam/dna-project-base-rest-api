<?php

class m140818_055732_add_item_slug_unique_indexes extends EDbMigration
{
    protected $tables = array(
        'i18n_catalog',
        'tool',
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