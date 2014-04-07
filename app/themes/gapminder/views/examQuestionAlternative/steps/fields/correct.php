<?php
/**
 * @var ExamQuestionAlternativeController $this
 * @var ExamQuestionAlternative $model
 * @var AppActiveForm $form
 */
?>

<?php echo $form->checkBoxControlGroup(
    $model,
    'correct',
    array(
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'correct', 'correct'),
        ),
    )
); ?>

