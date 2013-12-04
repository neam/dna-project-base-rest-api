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

<?php echo $form->textFieldRow($model, 'slug_' . $model->source_language, array(
    'id' => 'slugit-to-1',
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'slug_' . $model->source_language, 'slug'),
    ),
)); ?>

<?php if ($this->workflowData["translateInto"]) {
    echo $form->textFieldRow($model, 'slug_' . $this->workflowData["translateInto"], array(
        'id' => 'slugit-to-2',
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'maxlength' => 255,
    ));
} ?>

<?php Html::jsSlugIt(array(
    '#slugit-from-1' => '#slugit-to-1',
    '#slugit-from-2' => '#slugit-to-2',
)); ?>
