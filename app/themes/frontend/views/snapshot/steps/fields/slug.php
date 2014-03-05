<?php /** @var Snapshot $model */ ?>

<?php echo $form->textFieldRow($model, 'slug_' . $model->source_language, array(
    'class' => 'slugit-to-1',
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'slug_' . $model->source_language, 'title'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textFieldRow($model, 'slug_' . $this->workflowData['translateInto'], array(
        'class' => 'slugit-to-2',
        'maxlength' => 255,
    ));
} ?>

<?php Html::jsSlugIt(array(
    '.slugit-from-1' => '.slugit-to-1',
    '.slugit-from-2' => '.slugit-to-2',
)); ?>
