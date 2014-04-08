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
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'slug_' . $model->source_language, 'slug'),
        ),
    )
); ?>

<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'slug_' . $this->workflowData['translateInto'],
        array(
            'maxlength' => 255,
        )
    ); ?>
<?php endif; ?>
