<?php
/** @var Exercise $model */
/** @var ExerciseController|ItemController $this */
?>

<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('related', 'id'));
$criteria->addCondition('t.node_id != :self_node_id');
$criteria->params[':self_node_id'] = $model->node_id;

$this->widget(
    '\Edges',
    array(
        'model' => $model,
        'relation' => 'related',
        'itemClass' => 'Item',
        'criteria' => $criteria,
    )
);
?>

<?php publishJs('/themes/gapminder/js/force-dirty-forms.js', CClientScript::POS_END); ?>
