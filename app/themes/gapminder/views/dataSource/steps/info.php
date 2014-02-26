<?php
/* @var DataSourceController|ItemController $this */
/* @var DataSource|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/title', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/about', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/link', compact('form', 'model')); ?>
