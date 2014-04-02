<?php
$actions = array();
$id = 1;

foreach (MetaData::systemGroups() as $title => $label) {
    $actions['Group_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;
}

foreach (MetaData::projectGroups() as $title => $label) {
    $actions['Group_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;
}

foreach (MetaData::topicGroups() as $title => $label) {
    $actions['Group_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;
}

foreach (MetaData::skillGroups() as $title => $label) {
    $actions['Group_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;
}

return $actions;

