<?php /** @var Snapshot $model */ ?>

<?php echo $form->textAreaRow($model, 'vizabi_state', array(
    'rows' => 6,
    'cols' => 50,
    'class' => 'span8',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'vizabi_state'),
    ),
)); ?>
