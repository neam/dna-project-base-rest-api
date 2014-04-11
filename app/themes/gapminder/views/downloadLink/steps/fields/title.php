<?php
/**
 * @var DownloadLinkController $this
 * @var DownloadLink $model
 * @var AppActiveForm $form
 */
?>

<?php echo $form->textFieldControlGroup(
    $model,
    'title_' . $model->source_language,
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 255,
        'label' => Html::attributeLabelWithTooltip($model, 'title_' . $model->source_language, 'title'),
    )
); ?>
