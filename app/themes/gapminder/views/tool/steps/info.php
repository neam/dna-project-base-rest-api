<?php
/** @var ToolController|ItemController $this */
/** @var Tool $model */
/** @var AppActiveForm|TbActiveForm $form */
?>
<?php if ($this->actionUsesEditWorkflow()): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'ref',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'disabled' => !$this->canEditSourceLanguage(),
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'ref', 'ref'),
            ),
        )
    ); ?>
<?php endif; ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'title',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'slug',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextAreaControlGroup(
    $model,
    'about',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
