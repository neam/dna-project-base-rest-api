<?php /** @var PoFile $model */ ?>

<?php echo $form->textAreaRow($model, 'about', array(
    'rows' => 6,
    'cols' => 50,
    'class' => 'span8',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'about'),
    ),
)); ?>
