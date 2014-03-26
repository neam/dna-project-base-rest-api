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
        $i18n_columns_fields = array(),
        $prefixAttributesWithTable = true
    ) {

        $table2class = array_flip(DataModel::crudModels());

        //var_dump($command->select, $command->join, $command->params);
        foreach ($i18n_attribute_messages_fields as $table => $fields) {
            foreach ($fields as $attr) {

                $command->leftJoin("SourceMessage sm_{$table}_{$attr}", "sm_{$table}_{$attr}.category = :{$table}_{$attr}_category AND sm_{$table}_{$attr}.message = {$table}._{$attr}");
                $command->leftJoin("Message m_{$table}_{$attr}", "m_{$table}_{$attr}.id = sm_{$table}_{$attr}.id AND m_{$table}_{$attr}.language = :language");

                $command->params["{$table}_{$attr}_category"] = "a-" . $table2class[$table] . "-{$attr}";
                $command->params["language"] = $lang;

                if ($prefixAttributesWithTable) {
                    $as = "{$table}.{$attr}";
                } else {
                    $as = "{$attr}";
                }

                $command->select .= ", COALESCE(m_{$table}_{$attr}.translation,{$table}._{$attr}) as `$as`";
            }
        }

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