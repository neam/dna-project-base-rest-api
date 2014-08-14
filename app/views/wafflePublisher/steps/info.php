<?php
/* @var WafflePublisherController|WorkflowUiControllerTrait $this */
/* @var WafflePublisher|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php if ($this->actionUsesEditWorkflow()): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'ref',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'ref'),
            ),
        )
    ); ?>
<?php endif; ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'name',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextAreaControlGroup(
    $model,
    'description',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
