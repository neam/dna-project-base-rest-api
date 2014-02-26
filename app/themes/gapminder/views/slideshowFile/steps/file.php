<?php
/* @var SlideshowFileController|ItemController $this */
/* @var SlideshowFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php // TODO: Fix the file upload widgets. ?>
<?php $this->renderPartial('steps/fields/original_media', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/processed_media', compact('form', 'model')); ?>
