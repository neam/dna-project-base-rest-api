<?php /** @var PoFile $model */ ?>

<?php echo $form->textAreaControlGroup($model, 'about', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'rows' => 6,
    'cols' => 50,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'about'),
    ),
)); ?>
