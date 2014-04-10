<?php
/** @var Account $model */
?>
<div class="btn-toolbar">
    <div class="btn-group">
        <?php if ($this->action->id === 'view'): ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'Update'),
                array(
                    'icon' => TbHtml::ICON_EDIT,
                    'url' => array('update', 'id' => $model->{$model->tableSchema->primaryKey}),
                )
            ); ?>
            <?php echo TbHtml::button(
                Yii::t('model', 'Delete'),
                array(
                    'color' => TbHtml::BUTTON_COLOR_DANGER,
                    'icon' => TbHtml::ICON_REMOVE,
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
                    'icon' => TbHtml::ICON_TH_LARGE,
                    'url' => array('dashboard'),
                )
            ); ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'Translations'),
                array(
                    'color' => $this->action->id === 'translations' ? TbHtml::BUTTON_COLOR_INVERSE : null,
                    'disabled' => true, // TODO: Remove line when the translations view has been implemented.
                    'icon' => TbHtml::ICON_FONT,
                    'url' => array('translations'),
                )
            ); ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'Profile'),
                array(
                    'color' => $this->action->id === 'profile' ? TbHtml::BUTTON_COLOR_INVERSE : null,
                    'icon' => TbHtml::ICON_USER,
                    'url' => array('profile'),
                )
            ); ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'History'),
                array(
                    'color' => $this->action->id === 'history' ? TbHtml::BUTTON_COLOR_INVERSE : null,
                    'disabled' => true, // TODO: Remove line when the history view has been implemented.
                    'icon' => TbHtml::ICON_TIME,
                    'url' => array('history'),
                )
            ); ?>
        <?php endif; ?>
    </div>
</div>
