<?php

class m140820_120803_insert_i18n_catalog_translations extends EDbMigration
{
    public function up()
    {

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