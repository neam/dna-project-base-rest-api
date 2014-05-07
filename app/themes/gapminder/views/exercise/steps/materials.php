<?php
/** @var ExerciseController|ItemController $this */
/** @var Exercise|ItemTrait $model */
/** @var TbActiveForm|AppActiveForm $form */
?>

<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('materials', 'id'));
$criteria->addCondition('t.node_id != :self_node_id');
$criteria->params[':self_node_id'] = $model->node_id;

$this->widget(
    '\Edges',
    array(
        'model' => $model,
        'relation' => 'materials',
        'itemClass' => 'Item',
        'criteria' => $criteria,
    )
);
?>
