<?php
/* @var nordsoftware\yii_account\controllers\PasswordController $this */
/* @var nordsoftware\yii_account\models\form\ForgotPasswordForm $model */
?>
<?php $this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', 'Recover Password'); ?>
<div class="recovery-controller recovery-action">
    <h1 class="registration-heading text-center"><?php echo Html::renderLogoWithLink(Yii::app()->name); ?></h1>
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
                'help' => Yii::t('app', 'To recover your password, please enter your username or email address.'),
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
