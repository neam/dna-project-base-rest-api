<?php /** @var VideoFile $model */ ?>

<?php echo $form->textFieldRow($model, 'title_' . $model->source_language, array(
    'maxlength' => 255,
    'id' => 'slugit-from-1',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'title_' . $model->source_language, 'title'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textFieldRow($model, 'title_' . $this->workflowData['translateInto'], array(
        'maxlength' => 255,
        'id' => 'slugit-from-2',
    ));
} ?>
