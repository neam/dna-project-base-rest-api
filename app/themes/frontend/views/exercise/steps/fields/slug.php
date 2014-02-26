<?php echo $form->textFieldControlGroup($model, 'slug_' . $model->source_language, array(
    'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-1',
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'slug_' . $model->source_language, 'slug'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textFieldControlGroup($model, 'slug_' . $this->workflowData['translateInto'], array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-2',
        'maxlength' => 255,
    ));
} ?>

<?php Html::jsSlugIt(array(
    '.slugit-from-1' => '.slugit-to-1',
    '.slugit-from-2' => '.slugit-to-2',
)); ?>
