<?php
/* @var array $roles */
?>
<?php if (empty($ghas)): ?>
    <div class="alert alert-error">
        <?php echo Yii::t('account', 'You do not have any permissions assigned.'); ?>
        <?php echo Yii::t('account', 'Only administrators can assign permissions.'); ?>
        <?php //echo Yii::t('account', 'Please apply for a permission.'); ?>
    </div>
<?php else: ?>
    <?php foreach ($ghas as $gha): ?>
        <?php echo TbHtml::linkButton(
            $gha->group->attributes['title'] . ' ' . substr(PermissionHelper::roleIdToName($gha->attributes['role_id']), 5),
            array(
                'icon' => TbHtml::ICON_MINUS,
                'class' => 'action-button',
                'size' => TbHtml::BUTTON_SIZE_XS,
                'url' => array(
                    'removeFromGroup',
                    'id' => $model->id,
                    'group' => PermissionHelper::groupIdToName($gha->attributes['group_id']),
                    'role' => PermissionHelper::roleIdToName($gha->attributes['role_id']),
                    'returnUrl' => TbHtml::encode(Yii::app()->request->url),
                ),
            )
        ); ?>
        <?php //var_dump($gha->group->attributes, $gha->attributes); ?>
    <?php endforeach; ?>
<?php endif; ?>
