<?php
/* @var PoFileController|ItemController $this */
/* @var PoFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/title', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/about', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/file', compact('form', 'model')); ?>
