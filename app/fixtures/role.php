<?php
$actions = array();

foreach (MetaData::systemRoles() as $title => $label) {
    $actions[] = array('title' => $title);
}

foreach (MetaData::groupRoles() as $title => $label) {
    $actions[] = array('title' => $title);
}

return $actions;