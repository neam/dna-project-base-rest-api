<?php
/**
 * @var PageController $this
 * @var Page $model
 * @var AppActiveForm $form
 */
?>

<?php echo $form->textAreaControlGroup(
    $model,
    'about_' . $model->source_language,
    array(
        'disabled' => !$this->canEditSourceLanguage(),
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'about_' . $model->source_language, 'about'),
        ),
    )
); ?>

<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textAreaControlGroup(
        $model,
        'about_' . $this->workflowData['translateInto']
    ); ?>
<?php endif; ?>
