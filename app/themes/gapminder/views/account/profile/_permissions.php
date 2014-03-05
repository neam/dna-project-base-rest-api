<?php
/* @var array $roles */
?>
<?php if (empty($roles)): ?>
    <div class="alert alert-error">
        <?php echo Yii::t('account', 'You do not have any permissions assigned.'); ?>
        <?php echo Yii::t('account', 'Only administrators can assign permissions.'); ?>
        <?php //echo Yii::t('account', 'Please apply for a permission.'); ?>
    </div>
<?php else: ?>
    <?php print implode(', ', $roles); ?>
<?php endif; ?>