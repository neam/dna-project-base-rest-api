<?php
/* @var I18nCatalogController|WorkflowUiControllerTrait $this */
/* @var I18nCatalog|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php if (!$this->workflowData['translateInto']): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'i18n_category',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'i18n_category'),
            ),
        )
    ); ?>
    <?php echo $form->textAreaControlGroup(
        $model,
        'po_contents_' . $model->source_language,
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'disabled' => !$this->canEditSourceLanguage(),
            'rows' => 6,
            'cols' => 50,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'po_contents'),
            ),
        )
    ); ?>
<?php else: ?>
    <?php $this->renderPartial('translate/po_contents', array(
        'model' => $model,
        'form' => $form,
    )); ?>
<?php endif; ?>
