<?php /** @var Snapshot $model */ ?>

<?php echo $form->textAreaRow($model, 'embed_override', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'rows' => 6,
    'cols' => 50,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'embed_override'),
    ),
)); ?>
