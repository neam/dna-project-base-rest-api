<?php
/* @var nordsoftware\yii_account\controllers\PasswordController $this */
/* @var nordsoftware\yii_account\models\form\ForgotPasswordForm $model */
?>
<?php $this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', 'Recover Password'); ?>
<?php /* $this->breadcrumbs = array(
    Yii::t('user', 'Login') => array('/user/login'),
    Yii::t('user', 'Recover'),
); */ ?>
<div class="recovery-controller recovery-action">
    <h1><?php echo Yii::t('app', 'Recover Password'); ?></h1>
    <?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
        <div class="success">
            <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
        </div>
    <?php else: ?>
        <?php echo TbHtml::beginForm(); ?>
        <?php echo TbHtml::errorSummary($model); ?>
        <?php echo TbHtml::activeTextFieldControlGroup(
            $model,
            'email',
            array(
                'help' => Yii::t('app', 'Please enter your username or email address.'),
            )
        ); ?>
        <?php echo TbHtml::formActions(array(
            TbHtml::submitButton(
                Yii::t('app', 'Recover'),
                array(
                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    'size' => TbHtml::BUTTON_SIZE_LARGE,
                )
            ),
        )); ?>
        <?php echo TbHtml::endForm(); ?>
    <?php endif; ?>
</div>
