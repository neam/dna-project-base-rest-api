<?php echo $form->textFieldRow($model, 'title_' . $model->source_language, array(
    'id' => 'slugit-from-1',
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'title_' . $model->source_language, 'title'),
    ),
)); ?>

<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'title_' . $this->workflowData["translateInto"], array(
        'id' => 'slugit-from-2',
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'maxlength' => 255,
    ));
} ?>
