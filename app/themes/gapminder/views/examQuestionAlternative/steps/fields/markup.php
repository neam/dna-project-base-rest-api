<?php
/**
 * @var ExamQuestionAlternativeController $this
 * @var ExamQuestionAlternative $model
 * @var AppActiveForm $form
 */
?>

<?php echo $form->textAreaControlGroup(
    $model,
    'markup_' . $model->source_language,
    array(
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'markup_' . $model->source_language, 'markup'),
        ),
    )
); ?>
