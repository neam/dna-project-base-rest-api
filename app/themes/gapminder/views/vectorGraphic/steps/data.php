<?php
/* @var VectorGraphicController|ItemController $this */
/* @var VectorGraphic|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('dataarticles', 'node_id'));
$this->widget(
    '\Edges',
    array(
        'model' => $model,
        'relation' => 'dataarticles',
        'criteria' => $criteria,
    )
);
?>
