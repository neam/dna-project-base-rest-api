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
     * @param $table
     * @param array $i18n_columns_fields
     * @param array $i18n_attribute_messages_fields
     */
    static function translatedDbCommand(
        $command,
        $i18n_columns_fields = array(),
        $i18n_attribute_messages_fields = array()
    ) {

        return $command;

    }

}