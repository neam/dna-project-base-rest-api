<?php
$actions = array();
$id = 1;

foreach (array_merge(MetaData::itemVisibilityOperations(),MetaData::itemInteractionOperations()) as $action => $label) {

    $actions['Action_' . $id] = array(
        'id' => $id,
        'action' => $action,
        'label' => $label,
    );
    $id++;

}

return $actions;

