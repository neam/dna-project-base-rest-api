<?php
/** @var ToolController|WorkflowUiControllerTrait $this */
/** @var Tool $model */
/** @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textAreaControlGroup($model, 'embed_template', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'rows' => 6,
    'cols' => 50,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'embed_template'),
    ),
)); ?>
