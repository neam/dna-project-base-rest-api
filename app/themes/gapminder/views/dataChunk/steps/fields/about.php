<?php
/* @var DataChunkController|ItemController $this */
/* @var DataChunk|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textAreaControlGroup(
    $model,
    'about_' . $model->source_language,
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'rows' => 6,
        'cols' => 50,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'about_' . $model->source_language, 'about'),
        ),
    )
); ?>
<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textAreaRow(
        $model,
        'about_' . $this->workflowData['translateInto'],
        array(
            'ControlGroups' => 6,
            'cols' => 50,
            'class' => 'span8',
        )
    ); ?>
<?php endif; ?>
