<?php
/* @var GuiSectionController|WorkflowUiControllerTrait $this */
/* @var GuiSection|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php if ($this->actionUsesEditWorkflow()): ?>
    <?php echo $form->itemTitleTextFieldControlGroup(
        $model,
        'title',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'title'),
            ),
        )
    ); ?>
    <?php echo $form->itemSlugTextFieldControlGroup(
        $model,
        'slug',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'slug'),
            ),
        )
    ); ?>
    <?php $input = $this->widget(
        '\GtcRelation',
        array(
            'model' => $model,
            'relation' => 'i18nCatalog',
            'fields' => 'itemLabel',
            'allowEmpty' => true,
            'style' => 'dropdownlist',
            'htmlOptions' => array(
                'checkAll' => 'all'
            ),
        ),
        true
    ); ?>
    <?php echo $form->customControlGroup($model, 'i18n_catalog_id', $input); ?>
<?php endif; ?>
