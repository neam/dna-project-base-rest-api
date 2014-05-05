<?php /* @var ItemEditUi $this */ ?>
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
        Yii::t('app', 'Cancel'),
        array(
            'color' => TbHtml::BUTTON_COLOR_LINK,
            'url' => array('browse'),
            'class' => 'btn-dirtyforms ignoredirty',
        )
    ); ?>
    <?php /* TODO: Add the previous button when auto-saving has been implemented.
    <?php echo TbHtml::linkButton(
        Yii::t('app', 'Previous'),
        array(
            'color' => TbHtml::BUTTON_COLOR_LINK,
            'url' => '#',
            'class' => 'btn-dirtyforms ignoredirty',
        )
    ); ?>
    */ ?>
    <?php echo TbHtml::submitButton(
        $this->getSubmitButtonLabel(),
        array(
            'class' => 'btn-dirtyforms',
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'name' => 'save-changes',
        )
    ); ?>
</div>
