<?php echo $form->textFieldRow($model, 'question_' . $model->source_language, array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-1',
        'maxlength' => 200,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'question_' . $model->source_language, 'question'),
        ),
    )); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textFieldRow($model, 'question_' . $this->workflowData['translateInto'], array(
            'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-2',
            'maxlength' => 255,
        ));
} ?>
