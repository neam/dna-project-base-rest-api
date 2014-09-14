<?php

class m140818_055732_add_item_slug_unique_indexes extends EDbMigration
{
    protected $tables = array(
        'i18n_catalog',
        'tool',
    );

    private function getCodes()
    {
        return array(
            'en',
            'ar',
            'bg',
            'ca',
            'cs',
            'da',
            'de',
            'en_gb',
            'en_us',
            'el',
            'es',
            'fa',
            'fi',
            'fil',
            'fr',
            'hi',
            'hr',
            'hu',
            'id',
            'it',
            'iw',
            'ja',
            'ko',
            'lt',
            'lv',
            'nl',
            'no',
            'pl',
            'pt',
            'pt_br',
            'pt_pt',
            'ro',
            'ru',
            'sk',
            'sl',
            'sr',
            'sv',
            'th',
            'tr',
            'uk',
            'vi',
            'zh',
            'zh_cn',
            'zh_tw',
        );
    }

    public function up()
    {
        foreach ($this->tables as $table) {
            foreach (self::getCodes() as $language) {
                $this->createIndex("slug_{$language}_UNIQUE", $table, "slug_{$language}", true);
            }
        }
    }

    public function down()
    {
        foreach ($this->tables as $table) {
            foreach (self::getCodes() as $language) {
                $this->dropIndex("slug_{$language}_UNIQUE", $table);
            }
        }
    }
}
