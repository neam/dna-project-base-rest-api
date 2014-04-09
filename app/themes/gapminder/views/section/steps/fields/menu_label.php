<?php
/**
 * @var SectionController $this
 * @var Section $model
 * @var AppActiveForm $form
 */
?>

<?php echo $form->textFieldControlGroup(
    $model,
    'menu_label_' . $model->source_language,
    array(
        'disabled' => !$this->canEditSourceLanguage(),
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'menu_label_' . $model->source_language, 'menu_label'),
        ),
    )
); ?>

<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textFieldControlGroup(
        $model,
        'menu_label_' . $this->workflowData['translateInto'],
        array(
            'maxlength' => 255,
        )
    ); ?>
<?php endif; ?>
