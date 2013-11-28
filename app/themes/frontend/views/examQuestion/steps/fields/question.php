<?php echo $form->textFieldRow($model, 'question_' . $model->source_language, array(
    'id' => 'slugit-from-1',
    'maxlength' => 200,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'question_' . $model->source_language, 'question'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textFieldRow($model, 'question_' . $this->workflowData['translateInto'], array(
        'id' => 'slugit-from-2',
        'maxlength' => 255,
    ));
} ?>
