<?php
/* @var VectorGraphicController|ItemController $this */
/* @var VectorGraphic|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/original_media', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/processed_media', compact('form', 'model')); ?>
