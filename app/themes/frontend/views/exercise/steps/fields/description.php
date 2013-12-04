<?php echo $form->textAreaRow($model, 'description_' . $model->source_language, array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'rows' => 6,
    'cols' => 50,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'description_' . $model->source_language, 'description'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textAreaRow($model, 'description_' . $this->workflowData['translateInto'], array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'rows' => 6,
        'cols' => 50,
    ));
} ?>
