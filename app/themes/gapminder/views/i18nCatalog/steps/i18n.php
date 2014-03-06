<?php
/* @var PoFileController|ItemController $this */
/* @var PoFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php $this->renderPartial('steps/fields/i18n_category', compact('form', 'model')); ?>
<?php $this->renderPartial('steps/fields/po_contents', compact('form', 'model')); ?>
