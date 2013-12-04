<?php /** @var PoFile $model */ ?>

<?php echo $form->textFieldRow($model, 'title', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'title'),
    ),
)); ?>
