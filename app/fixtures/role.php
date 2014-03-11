<?php
$actions = array();
$id = 1;

foreach (MetaData::contextLessDefaultRoles() as $title) {

    $actions['Role_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;

}

foreach (MetaData::contextLessSuperRoles() as $title) {

    $actions['Role_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;

}

foreach (MetaData::groupBasedRoles() as $title) {

    $actions['Role_' . $id] = array(
        'id' => $id,
        'title' => "Group $title",
    );
    $id++;

}

return $actions;

