<?php
/* @var VideoFileController|ItemController $this */
/* @var VideoFile $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup($model, 'caption_' . $model->source_language, array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'disabled' => !$this->canEditSourceLanguage(),
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'caption_' . $model->source_language, 'caption'),
    ),
)); ?>
<?php if ($this->workflowData['translateInto']) {
    echo $form->textFieldControlGroup($model, 'caption_' . $this->workflowData['translateInto'], array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'maxlength' => 255,
    ));
} ?>
