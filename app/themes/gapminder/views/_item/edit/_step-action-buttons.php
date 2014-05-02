<div class="step-action-buttons">
    <?php /*
    <?php echo TbHtml::linkButton(
        Yii::t('model', 'Reset'),
        array(
            'color' => TbHtml::BUTTON_COLOR_LINK,
            'url' => Yii::app()->request->url,
            'class' => 'btn-dirtyforms ignoredirty',
        )
    ); ?>
    */ ?>
    <?php echo TbHtml::linkButton(
        Yii::t('model', 'Cancel'),
        array(
            'color' => TbHtml::BUTTON_COLOR_LINK,
            'url' => array('browse'),
            'class' => 'btn-dirtyforms ignoredirty',
        )
    ); ?>
    <?php echo TbHtml::linkButton(
        Yii::t('model', 'Previous'),
        array(
            'color' => TbHtml::BUTTON_COLOR_LINK,
            'url' => '#', // TODO: Add link to previous step.
            'class' => 'btn-dirtyforms ignoredirty',
        )
    ); ?>
    <?php echo TbHtml::submitButton(
        Yii::t('model', 'Next'),
        array(
            'class' => 'btn-dirtyforms',
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'name' => 'save-changes',
        )
    ); ?>
</div>
