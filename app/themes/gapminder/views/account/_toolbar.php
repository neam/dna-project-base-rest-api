<?php
/** @var Account $model */
?>
<div class="action-buttons">
    <div class="btn-group">
        <?php if ($this->action->id === 'view'): ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'Update'),
                array(
                    'class' => 'action-button',
                    'url' => array('update', 'id' => $model->{$model->tableSchema->primaryKey}),
                )
            ); ?>
            <?php echo TbHtml::button(
                Yii::t('model', 'Delete'),
                array(
                    'color' => TbHtml::BUTTON_COLOR_DANGER,
                    'class' => 'action-button',
                    'submit' => array('delete', 'id' => $model->{$model->tableSchema->primaryKey},
                    'returnUrl' => (Yii::app()->request->getParam('returnUrl')) ? Yii::app()->request->getParam('returnUrl') : $this->createUrl('admin')),
                    'confirm' => Yii::t('model', 'Do you want to delete this item?'),
                )
            ); ?>
        <?php else: ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'Dashboard'),
                array(
                    'color' => $this->action->id === 'dashboard' ? TbHtml::BUTTON_COLOR_INVERSE : null,
                    'class' => 'action-button',
                    'url' => array('dashboard'),
                )
            ); ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'Translations'),
                array(
                    'color' => $this->action->id === 'translations' ? TbHtml::BUTTON_COLOR_INVERSE : null,
                    'class' => 'action-button',
                    'disabled' => true, // TODO: Remove line when the translations view has been implemented.
                    'icon' => TbHtml::ICON_FONT,
                    'url' => array('translations'),
                )
            ); ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'Profile'),
                array(
                    'color' => $this->action->id === 'profile' ? TbHtml::BUTTON_COLOR_INVERSE : null,
                    'class' => 'action-button',
                    'url' => array('profile'),
                )
            ); ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'History'),
                array(
                    'color' => $this->action->id === 'history' ? TbHtml::BUTTON_COLOR_INVERSE : null,
                    'class' => 'action-button',
                    'disabled' => true, // TODO: Remove line when the history view has been implemented.
                    'url' => array('history'),
                )
            ); ?>
        <?php endif; ?>
    </div>
</div>
