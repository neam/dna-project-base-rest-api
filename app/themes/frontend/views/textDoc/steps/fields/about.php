<?php /** @var TextDoc $model */ ?>

<?php echo $form->textAreaRow($model, 'about_' . $model->source_language, array(
    'rows' => 6,
    'cols' => 50,
    'class' => 'span8',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'about_' . $model->source_language, 'about'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textAreaRow($model, 'about_' . $this->workflowData['translateInto'], array(
        'rows' => 6,
        'cols' => 50,
        'class' => 'span8'
    ));
} ?>
