<?php
/* @var WaffleCategoryController|ItemController $this */
/* @var WaffleCategory|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup(
    $model,
    'url',
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'url'),
        ),
    )
); ?>
