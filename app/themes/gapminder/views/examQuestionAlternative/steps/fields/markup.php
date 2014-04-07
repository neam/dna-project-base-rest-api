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
        'disabled' => !$this->canEditSourceLanguage(),
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'markup_' . $model->source_language, 'markup'),
        ),
    )
); ?>

<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'markup_' . $this->workflowData['translateInto'],
        array(
            'maxlength' => 255,
        )
    ); ?>
<?php endif; ?>
