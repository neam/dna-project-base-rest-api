<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>

<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.node_id', $model->getRelatedModelColumnValues('exercises', 'node_id'));

$this->widget(
    '\Edges',
    array(
        'relation' => 'exercises',
        'model' => $model,
        'criteria' => $criteria,
        'id' => 'Chapter_exercises',
    )
);

?>
