<?php
$actions = array();
$id = 1;

foreach (MetaData::systemRoles() as $title => $label) {
    $actions['Role_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;
}

foreach (MetaData::groupRoles() as $title => $label) {
    $actions['Role_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;
}

foreach (MetaData::defaultRoles() as $title => $label) {
    $actions['Role_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;
}

return $actions;

