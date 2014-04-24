<?php
/* @var WaffleController|ItemController $this */
/* @var Waffle|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/title', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/short_title', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/description', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/link', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/publishing_date', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/url', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/license', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/license_link', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/publisher', compact('form', 'model')); ?>
