<?php
/* @var SlideshowFileController|ItemController $this */
/* @var SlideshowFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textAreaControlGroup(
    $model,
    'about_en',
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'rows' => 6,
        'cols' => 50,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'about_en', 'about'),
        ),
    )
); ?>
<?php if ($this->workflowData['translateInto']): ?>
    <?php echo $form->textAreaControlGroup(
        $model,
        'about_' . $this->workflowData['translateInto'],
        array(
            'class' => Html::ITEM_FORM_FIELD_CLASS,
            'rows' => 6,
            'cols' => 50,
        )
    ); ?>
<?php endif; ?>
