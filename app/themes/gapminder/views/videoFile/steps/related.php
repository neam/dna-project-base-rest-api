<?php
// todo: fix this view (and refactor it)
/* @var VideoFile $model */
/* @var VideoFileController $this */
?>

<?php

$relatedCriteria = new CDbCriteria();
$relatedCriteria->addNotInCondition('t.node_id', $model->getRelatedNodeIds());
$relatedCriteria->addCondition('t.node_id != :self_node_id');
$relatedCriteria->join = "INNER JOIN node_has_group AS nhg ON nhg.node_id = t.node_id";
$relatedCriteria->params[':self_node_id'] = $model->node_id;

$this->widget(
    '\Edges',
    array(
        'model' => $model,
        'relation' => 'related',
        'criteria' => $relatedCriteria,
        'itemClass' => 'Item',
    )
);

?>
