<?php
/* @var DownloadLinkController|WorkflowUiControllerTrait $this */
/* @var DownloadLink|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'title',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>

<?php echo $form->select2ControlGroup(
    $model,
    'file_media_id',
    $model->getFileOptions(),
    array(
        'empty' => Yii::t('app', 'None'),
    )
); ?>

<?php echo TbHtml::button(
    Yii::t('app', 'Upload'),
    array(
        'block' => true,
        'class' => 'upload-btn',
        'data-toggle' => 'modal',
        'data-target' => '#' . $form->id . '-modal',
    )
); ?>

<?php $this->renderPartial(
    '//p3Media/_modal_form',
    array(
        'formId' => $form->id,
        'inputSelector' => "#DownloadLink_file_media_id",
        'model' => new P3Media(),
        'pk' => 'id',
        'field' => 'itemLabel',
    )
); ?>
