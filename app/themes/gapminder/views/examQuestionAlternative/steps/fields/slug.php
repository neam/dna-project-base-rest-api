<?php
/**
 * @var ExamQuestionAlternativeController $this
 * @var ExamQuestionAlternative $model
 * @var AppActiveForm $form
 */
?>

<?php echo $form->textFieldControlGroup(
    $model,
    'slug_' . $model->source_language,
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-1',
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'slug_' . $model->source_language, 'slug'),
        ),
    )
); ?>
