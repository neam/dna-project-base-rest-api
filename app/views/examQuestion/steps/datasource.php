<?php
/* @var ExamQuestionController|WorkflowUiControllerTrait $this */
/* @var ExamQuestion|ItemTrait $model */
/* @var AppActiveForm $form */
?>

<?php echo $form->select2ControlGroup(
    $model,
    'source_node_id',
    CHtml::listData(
        Item::model()->findAll('t.node_id != :self_node_id', array(':self_node_id' => $model->node_id)),
        'id',
        'itemLabel'
    ),
    array(
        'empty' => Yii::t('app', 'None'),
        'hint' => true,
    )
); ?>
