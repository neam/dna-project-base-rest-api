<?php /** @var PoFile $model */ ?>

<?php echo $form->textFieldRow($model, 'title', array(
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'title'),
    ),
)); ?>
