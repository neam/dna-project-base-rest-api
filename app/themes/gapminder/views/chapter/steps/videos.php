<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>

<?php echo $form->select2ControlGroup(
    $model,
    'videos',
    CHtml::listData(
        VideoFile::model()->findAll(),
        'node_id',
        'itemLabel'
    ),
    array(
        'multiple' => true,
        'unselectValue' => '', // Anything that empty() evaluates as true
        'options' => $form->selectRelated($model, 'videos', 'node_id'),
    )
); ?>
