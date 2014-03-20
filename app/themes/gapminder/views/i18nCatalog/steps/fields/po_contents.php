<?php
/* @var I18nCatalogController|ItemController $this */
/* @var I18nCatalog|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
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
