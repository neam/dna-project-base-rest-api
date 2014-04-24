<?php
/* @var VideoFileController|ItemController $this */
/* @var VideoFile $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textAreaControlGroup($model, 'subtitles_' . $model->source_language, array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'disabled' => !$this->canEditSourceLanguage(),
    'rows' => 50,
    'cols' => 50,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'subtitles_' . $model->source_language, 'subtitles'),
    ),
)); ?>