<?php
/* @var VideoFileController|ItemController $this */
/* @var VideoFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->select2ControlGroup($model, 'original_media_id', $model->getRelatedVideoOptions()); ?>
