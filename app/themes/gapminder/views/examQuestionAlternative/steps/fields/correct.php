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
        'disabled' => !$this->canEditSourceLanguage(),
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'correct', 'correct'),
        ),
    )
); ?>

