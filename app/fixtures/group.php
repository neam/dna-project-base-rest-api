<?php
$actions = array();
$id = 1;

foreach (MetaData::groups() as $title) {
    $actions['Group_' . $id] = array(
        'id' => $id,
        'title' => $title,
    );
    $id++;
}

return $actions;

