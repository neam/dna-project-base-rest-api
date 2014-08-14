<?php
/* @var WaffleController|WorkflowUiControllerTrait $this */
/* @var Waffle|ItemTrait $model */
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
    'list_name',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'property_name',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'possessive',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'choice_format',
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
<?php $input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'waffle',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    ),
    true
); ?>
<?php if ($this->actionUsesEditWorkflow()): ?>
    <?php echo $form->customControlGroup($model, 'waffle_id', $input); ?>
<?php endif; ?>
