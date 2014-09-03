<?php

class m140820_120803_insert_i18n_catalog_translations extends EDbMigration
{
    public function up()
    {

        $this->insert(
            'i18n_catalog',
            array(
                'id' => 1,
                'version' => 1,
                'title' => 'i18n Catalog Number 1 for tests',
                'about' => 'This is for testing only',
                'i18n_category' => 'foo',
                'po_contents' => '',
                'slug_en' => 'i18n-catalog-number-1-for-tests',
                'created' => '2014-03-26 13:07:02',
                'modified' => '2014-08-28 20:30:57',
                'owner_id' => 1,
            )
        );

        $this->update(
            'i18n_catalog',
            array(
                'po_contents' => '# The context for chain here is \'metal\' (eg. a metal chain)
msgctxt "metal"
msgid "Chain"
msgstr ""

# The context for chain here is \'restaurant\' (eg. the restaurant chain)
msgctxt "restaurant"
msgid "Chain"
msgstr ""
'
            ),
            'id=1'
        );

        $this->insert(
            'SourceMessage',
            array(
                'category' => 'i18n_catalog-1-metal-po_contents',
                'message' => 'Chain'
            )
        );
        $sourceMessageId = (int) $this->getDbConnection()->createCommand(
            "SELECT `id` FROM `SourceMessage` WHERE `category` = 'i18n_catalog-1-metal-po_contents' LIMIT 1"
        )->queryScalar();
        $this->insert(
            'Message',
            array(
                'id' => $sourceMessageId,
                'language' => 'pt_br',
                'translation' => 'Corrente'
            )
        );

        $this->insert(
            'SourceMessage',
            array(
                'category' => 'i18n_catalog-1-restaurant-po_contents',
                'message' => 'Chain'
            )
        );
        $sourceMessageId = (int) $this->getDbConnection()->createCommand(
            "SELECT `id` FROM `SourceMessage` WHERE `category` = 'i18n_catalog-1-restaurant-po_contents' LIMIT 1"
        )->queryScalar();
        $this->insert(
            'Message',
            array(
                'id' => $sourceMessageId,
                'language' => 'pt_br',
                'translation' => 'Cadeia'
            )
        );
    }

    public function down()
    {
        $this->delete(
            'i18n_catalog',
            'id=1'
        );

        $sourceMessageId = (int) $this->getDbConnection()->createCommand(
            "SELECT `id` FROM `SourceMessage` WHERE `category` = 'i18n_catalog-1-metal-po_contents' LIMIT 1"
        )->queryScalar();
        $this->delete('Message', 'id=' . $sourceMessageId);
        $this->delete('SourceMessage', 'id=' . $sourceMessageId);

        $sourceMessageId = (int) $this->getDbConnection()->createCommand(
            "SELECT `id` FROM `SourceMessage` WHERE `category` = 'i18n_catalog-1-restaurant-po_contents' LIMIT 1"
        )->queryScalar();
        $this->delete('Message', 'id=' . $sourceMessageId);
        $this->delete('SourceMessage', 'id=' . $sourceMessageId);
    }
}