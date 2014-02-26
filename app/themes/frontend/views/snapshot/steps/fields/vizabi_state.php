<?php /** @var Snapshot $model */ ?>

<?php echo $form->textAreaControlGroup($model, 'vizabi_state', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'rows' => 6,
    'cols' => 50,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'vizabi_state'),
    ),
)); ?>
