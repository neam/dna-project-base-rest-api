<?php
/* @var DownloadLinkController|ItemController $this */
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
<strong>TODO: add file_media_id input</strong>
