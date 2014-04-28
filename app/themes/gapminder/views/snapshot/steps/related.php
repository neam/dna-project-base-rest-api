<?php
// todo: fix this view (and refactor it)
/* @var Snapshot $model */
/* @var SnapshotController $this */
?>
<?php
$relatedCriteria = new CDbCriteria();
$relatedCriteria->addNotInCondition('t.node_id', $model->getRelatedNodeIds());
$relatedCriteria->addCondition('t.node_id != :self_node_id');
$relatedCriteria->join = "INNER JOIN node_has_group AS nhg ON nhg.node_id = t.node_id";
$relatedCriteria->params[':self_node_id'] = $model->node_id;
?>
<?php $this->widget(
    '\Edges',
    array(
        'model' => $model,
        'itemClass' => 'Item',
        'relation' => 'related',
        'criteria' => $relatedCriteria,
    )
);
?>
<?php publishJs('/themes/gapminder/js/force-dirty-forms.js', CClientScript::POS_END); ?>