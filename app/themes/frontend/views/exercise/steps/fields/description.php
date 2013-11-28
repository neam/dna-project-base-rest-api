<?php echo $form->textAreaRow($model, 'description_' . $model->source_language, array(
    'rows' => 6,
    'cols' => 50,
    'class' => 'span8',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'description_' . $model->source_language, 'description'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textAreaRow($model, 'description_' . $this->workflowData['translateInto'], array(
        'rows' => 6,
        'cols' => 50,
        'class' => 'span8',
    ));
} ?>
