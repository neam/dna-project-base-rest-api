<?php /** @var Tool $model */ ?>

<?php echo $form->textAreaRow($model, 'embed_template', array(
    'rows' => 6,
    'cols' => 50,
    'class' => 'span8',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'embed_template'),
    ),
)); ?>
