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
    <div class="btn-group">
        <?php if (Yii::app()->user->checkAccess('Super Administrator')): ?>
            <?php echo TbHtml::linkButton(
                Yii::t('model', 'Users'),
                array(
                    'color' => $this->action->id === 'admin' ? TbHtml::BUTTON_COLOR_INVERSE : null,
                    'class' => 'action-button',
                    'url' => array('admin'),
                )
            ); ?>
        <?php endif; ?>
    </div>
    <div class="btn-group">
        <?php foreach (MetaData::assignableGroupRoles() as $groupRole => $role): ?>
            <?php if ($model->belongsToGroup('GapminderInternal', $groupRole)): ?>
                <?php echo TbHtml::linkButton(
                    Yii::t('app', 'Remove from {role}', array('{role}' => $role)),
                    array(
                        'class' => 'action-button',
                        'id' => 'removeFromGroup_' . $role,
                        'icon' => TbHtml::ICON_MINUS,
                        'url' => array(
                            'removeFromGroup',
                            'id' => $model->id,
                            'group' => 'GapminderInternal',
                            'role' => $groupRole,
                            'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                        ),
                    )
                ); ?>
            <?php else: ?>
                <?php echo TbHtml::linkButton(
                    Yii::t('app', 'Add to {role}', array('{role}' => $role)),
                    array(
                        'class' => 'action-button',
                        'id' => 'addToGroup_' . $role,
                        'icon' => TbHtml::ICON_PLUS,
                        'url' => array(
                            'addToGroup',
                            'id' => $model->id,
                            'group' => 'GapminderInternal',
                            'role' => $groupRole,
                            'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                        ),
                    )
                ); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>