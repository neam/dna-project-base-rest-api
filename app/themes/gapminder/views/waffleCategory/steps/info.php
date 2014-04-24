<?php
/* @var WaffleController|ItemController $this */
/* @var Waffle|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/ref', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/list_name', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/property_name', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/possessive', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/choice_format', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/description', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/waffle', compact('form', 'model')); ?>
