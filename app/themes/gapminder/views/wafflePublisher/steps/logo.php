<?php
/* @var WaffleController|ItemController $this */
/* @var Waffle|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/image_small', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/image_large', compact('form', 'model')); ?>
