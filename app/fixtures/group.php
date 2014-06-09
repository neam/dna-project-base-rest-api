<?php
$actions = array();

foreach (MetaData::projectGroups() as $title => $label) {
    $actions[] = array('title' => $title);
}

foreach (MetaData::topicGroups() as $title => $label) {
    $actions[] = array('title' => $title);
}

foreach (MetaData::skillGroups() as $title => $label) {
    $actions[] = array('title' => $title);
}

return $actions;

