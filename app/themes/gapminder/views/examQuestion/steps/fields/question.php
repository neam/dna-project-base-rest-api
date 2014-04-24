<?php
/* @var ExamQuestionController|ItemController $this */
/* @var ExamQuestion|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup(
    $model,
    'question_' . $model->source_language,
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-1',
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 200,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'question_' . $model->source_language, 'question'),
        ),
    )
); ?>
<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'question_' . $this->workflowData['translateInto'],
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-2',
            'maxlength' => 255,
        )
    ); ?>
<?php endif; ?>
