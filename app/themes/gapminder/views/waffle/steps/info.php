<?php
/* @var WaffleController|ItemController $this */
/* @var Waffle|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'title',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'short_title',
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
<?php if ($this->action->id === 'edit'): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'link',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'link'),
            ),
        )
    ); ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'publishing_date',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'publishing_date'),
            ),
        )
    ); ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'url',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'url'),
            ),
        )
    ); ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'license',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'license'),
            ),
        )
    ); ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'license_link',
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'maxlength' => 255,
            'labelOptions' => array(
                'label' => Html::attributeLabelWithTooltip($model, 'license_link'),
            ),
        )
    ); ?>
    <?php $input = $this->widget(
        '\GtcRelation',
        array(
            'model' => $model,
            'relation' => 'wafflePublisher',
            'fields' => 'itemLabel',
            'allowEmpty' => true,
            'style' => 'dropdownlist',
            'htmlOptions' => array(
                'checkAll' => 'all'
            ),
        ),
        true
    ); ?>
    <?php echo $form->customControlGroup($model, 'waffle_publisher_id', $input); ?>
<?php endif; ?>
