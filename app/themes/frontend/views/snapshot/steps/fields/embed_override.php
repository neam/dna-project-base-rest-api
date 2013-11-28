<?php /** @var Snapshot $model */ ?>

<?php echo $form->textAreaRow($model, 'embed_override', array(
    'rows' => 6,
    'cols' => 50,
    'class' => 'span8',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'embed_override'),
    ),
)); ?>
