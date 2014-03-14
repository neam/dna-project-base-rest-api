<?php
/* @var I18nCatalogController|ItemController $this */
/* @var I18nCatalog|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php if (!$this->workflowData['translateInto']): ?>
    <?php $this->renderPartial('steps/fields/i18n_category', compact('form', 'model')); ?>
    <?php $this->renderPartial('steps/fields/po_contents', compact('form', 'model')); ?>
<?php else: ?>
    <?php $this->renderPartial('translate/po_contents', array(
        'model' => $model,
        'form' => $form,
    )); ?>
<?php endif; ?>