<?php
/* @var ChapterController|WorkflowUiControllerTrait $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>

<?php echo $form->select2ControlGroup(
    $model,
    'exercises',
    CHtml::listData(
        Exercise::model()->findAll(),
        'node_id',
        'itemLabel'
    ),
    array(
        'multiple' => true,
        'unselectValue' => '', // Anything that empty() evaluates as true
        'options' => $form->selectRelated($model, 'exercises', 'node_id'),
    )
); ?>

