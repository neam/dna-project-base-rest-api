<?php echo $form->textFieldControlGroup($model, 'link', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'link'),
    ),
)); ?>
