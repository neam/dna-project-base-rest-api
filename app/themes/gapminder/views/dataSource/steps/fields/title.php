<?php
/* @var DataSourceController|ItemController $this */
/* @var DataSource|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup(
    $model,
    'title_' . $model->source_language,
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-1',
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'title_' . $model->source_language, 'title'),
        ),
    )
); ?>
<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'title_' . $this->workflowData['translateInto'],
        array(
            'maxlength' => 255,
            'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-2',
        )
    ); ?>
<?php endif; ?>
<?php echo $form->textFieldControlGroup(
    $model,
    'slug_' . $model->source_language,
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-1',
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'slug_' . $model->source_language, 'slug'),
        ),
    )
); ?>
<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'slug_' . $this->workflowData['translateInto'],
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-2',
            'maxlength' => 255,
        )
    ); ?>
<?php endif; ?>
<?php Html::jsSlugIt(
    array(
        '.slugit-from-1' => '.slugit-to-1',
        '.slugit-from-2' => '.slugit-to-2',
    )
); ?>
