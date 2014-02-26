<?php
/* @var TextDocController|ItemController $this */
/* @var TextDoc|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/original_media', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/processed_media', compact('form', 'model')); ?>
