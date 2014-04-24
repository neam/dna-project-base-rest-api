<?php
/* @var WaffleCategoryController|ItemController $this */
/* @var WaffleCategory|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup(
    $model,
    'short_name_' . $model->source_language,
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'short_name_' . $model->source_language, 'short_name'),
        ),
    )
); ?>
<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'short_name_' . $this->workflowData['translateInto'],
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
        )
    ); ?>
<?php endif; ?>
