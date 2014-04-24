<?php
/* @var ExerciseController|ItemController $this */
/* @var Exercise|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup(
    $model,
    'title_' . $model->source_language,
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-1',
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'title_' . $model->source_language, 'title'),
        ),
    )
); ?>
<?php if ($this->workflowData["translateInto"]): ?>
    <?php echo $form->textFieldControlGroup(
        $model, 'title_' . $this->workflowData["translateInto"],
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-2',
            'maxlength' => 255,
        )
    ); ?>
<?php endif; ?>
