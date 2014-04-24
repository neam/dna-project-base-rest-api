<?php /** @var AppActiveForm $form */ ?>
<?php /** @var Snapshot $model */ ?>

<?php echo $form->select2ControlGroup(
    $model,
    'tool_id',
    CHtml::listData(Tool::model()->findAll(), 'id', 'itemLabel')
); ?>
