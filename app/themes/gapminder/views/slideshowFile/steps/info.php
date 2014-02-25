<?php
/* @var SlideshowFileController|ItemController $this */
/* @var SlideshowFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/title', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/about', compact('form', 'model')); ?>
