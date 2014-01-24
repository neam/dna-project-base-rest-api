<?php
$actions = array();
$id = 1;

foreach (Actions::itemActions() as $action => $label) {

    $actions['Action_' . $id] = array(
        'id' => $id,
        'action' => $action,
        'label' => $label,
    );
    $id++;

}

return $actions;

