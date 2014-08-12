<?php
/* @var ChapterController|WorkflowUiControllerTrait $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>

<?php echo $form->select2ControlGroup(
    $model,
    'snapshots',
    CHtml::listData(
        Snapshot::model()->findAll(),
        'node_id',
        'itemLabel'
    ),
    array(
        'multiple' => true,
        'unselectValue' => '', // Anything that empty() evaluates as true
        'options' => $form->selectRelated($model, 'snapshots', 'node_id'),
    )
); ?>

<?php publishJs('/themes/frontend/js/force-clean-dirty-forms.js', CClientScript::POS_END); ?>
