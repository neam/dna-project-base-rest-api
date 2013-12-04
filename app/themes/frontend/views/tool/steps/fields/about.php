<?php /** @var Tool $model */ ?>

<?php echo $form->textAreaRow($model, 'about_en', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'rows' => 6,
    'cols' => 50,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'about_en', 'about'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textAreaRow($model, 'about_' . $this->workflowData['translateInto'], array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'rows' => 6,
        'cols' => 50,
    ));
} ?>
