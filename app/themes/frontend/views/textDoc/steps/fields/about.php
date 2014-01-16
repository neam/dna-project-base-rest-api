<?php /** @var TextDoc $model */ ?>

<?php echo $form->textAreaRow($model, 'about_' . $model->source_language, array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'rows' => 6,
        'cols' => 50,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'about_' . $model->source_language, 'about'),
        ),
    )); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textAreaRow($model, 'about_' . $this->workflowData['translateInto'], array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'rows' => 6,
            'cols' => 50,
        ));
} ?>
