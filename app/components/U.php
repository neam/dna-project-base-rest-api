<?php
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

}