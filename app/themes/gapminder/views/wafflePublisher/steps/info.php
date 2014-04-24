<?php
/* @var WafflePublisherController|ItemController $this */
/* @var WafflePublisher|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/ref', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/name', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/description', compact('form', 'model')); ?>
