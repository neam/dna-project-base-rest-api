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

        //var_dump($command->select, $command->join, $command->params);
        foreach ($i18n_attribute_messages_fields as $attr) {

            $command->leftJoin("SourceMessage sm_{$attr}", "sm_{$attr}.category = :{$attr}_category AND sm_{$attr}.message = _{$attr}");
            $command->leftJoin("Message m_{$attr}", "m_{$attr}.id = sm_{$attr}.id AND m_{$attr}.language = :language");

            $command->params["{$attr}_category"] = "a-WaffleFoo-{$attr}";
            $command->params["language"] = $lang;

            $command->select .= ", COALESCE(m_{$attr}.translation,_{$attr}) as $attr";
        }

        // Prevent double-escaping yii bug/workaround
        $command->select = str_replace("`", "", $command->select);

        //var_dump($command->select, $command->join, $command->params);
        //die();

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