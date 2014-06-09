<?php
/* @var ExamQuestionController|ItemController $this */
/* @var ExamQuestion|ItemTrait $model */
/* @var AppActiveForm $form */
?>

<?php echo $form->select2ControlGroup(
    $model,
    'examQuestionAlternatives',
    CHtml::listData(
        ExamQuestionAlternative::model()->findAll(),
        'node_id',
        'itemLabel'
    ),
    array(
        'multiple' => true,
        'unselectValue' => '', // Anything that empty() evaluates as true
        'options' => $form->selectRelated($model, 'examQuestionAlternatives', 'node_id'),
    )
); ?>
