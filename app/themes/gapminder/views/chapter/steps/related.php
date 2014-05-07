<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>

<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('related', 'id'));
$criteria->addCondition('t.node_id != :self_node_id');
$criteria->params[':self_node_id'] = $model->node_id;

$this->widget(
    '\Edges',
    array(
        'relation' => 'related',
        'model' => $model,
        'criteria' => $criteria,
        'itemClass' => 'Item',
    )
);

?>

<?php publishJs('/themes/frontend/js/force-clean-dirty-forms.js', CClientScript::POS_END); ?>
