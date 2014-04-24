<?php
/* @var WaffleController|ItemController $this */
/* @var Waffle|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php if ($this->action->id === 'edit'): ?>
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
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'short_name',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php $input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'waffleCategory',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    ),
    true
); ?>
<?php if ($this->action->id === 'edit'): ?>
    <?php echo $form->customControlGroup($model, 'waffle_category_id', $input); ?>
<?php endif; ?>
