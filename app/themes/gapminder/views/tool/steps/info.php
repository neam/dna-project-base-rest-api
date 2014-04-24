<?php
/** @var ToolController|ItemController $this */
/** @var Tool $model */
/** @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/ref', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/title', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/about', compact('form', 'model')); ?>
