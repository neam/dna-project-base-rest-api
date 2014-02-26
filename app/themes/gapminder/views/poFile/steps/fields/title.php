<?php
/* @var PoFileController|ItemController $this */
/* @var PoFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup(
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
