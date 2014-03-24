<?php

/**
 * Contains global shorthands for commonly used snippets of code
 *
 * Class U
 */
class U
{

    static function prefixed_table_fields_wildcard($table, $alias, $field_names)
    {
        $prefixed = array();
        foreach ($field_names as $field_name) {
            $prefixed[] = "`{$alias}`.`{$field_name}` AS `{$alias}.{$field_name}`";
        }
        return implode(", ", $prefixed);
    }

    /**
     * Short-hand to help query translated records by SQL without involving ActiveRecord
     * Involves some duplication of logic that is otherwise done in corresponding behaviors, but is
     * necessary to perform translation of attributes in a performant way using CDbCommand
     *
     * @param CDbCommand $command
     * @param $lang
     * @param array $i18n_attribute_messages_fields
     * @param array $i18n_columns_fields
     */
    static function translatedDbCommand(
        $command,
        $lang,
        $i18n_attribute_messages_fields = array(),
        $i18n_columns_fields = array()
    ) {

        foreach ($i18n_attribute_messages_fields as $attr) {

            /*
            SELECT t1.message AS message, t2.translation AS translation
            FROM SourceMessage t1, Message t2
            WHERE t1.id=t2.id AND t1.category=:category AND t2.language=:language.
            Bound with :category='a-Waffle-title', :language='en_us'
            */

            /*
             *
             *
             */

            $command->leftJoin("SourceMessage sm_{$attr}", "sm_{$attr}.category = :{$attr}_category AND sm_{$attr}.message = _{$attr}");
            $command->leftJoin("Message m_{$attr}", "m_{$attr}.id = sm_{$attr}.id AND m_{$attr}.language = :language");

            $command->params["{$attr}_category"] = "a-WaffleFoo-{$attr}";
            $command->params["language"] = $lang;

            $command->select .= ", m_{$attr}.translation as $attr";
        }

//        var_dump($command->select, $command->join, $command->params);        die();

        foreach ($i18n_columns_fields as $i18n_columns_field) {
            $command->select .= ", {$i18n_columns_field}_{$lang} as $i18n_columns_field";
        }

        return $command;

    }

    static function arAttributes($ars)
    {
        $return = array();
        foreach ($ars as $ar) {
            $return[] = $ar->attributes;
        }
        return $return;
    }

}