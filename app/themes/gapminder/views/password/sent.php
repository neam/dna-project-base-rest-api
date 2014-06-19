<?php
/** @var PasswordController $this */
?>
<div class="password-controller sent-action">
    <div class="row">
        <div class="body">
            <div class="brand-logo">
                <?php echo Html::renderLogoWithLink(); ?>
            </div>
            <p><?php echo Yii::t('app', 'You should promptly receive an email with instructions on how to reset your password.'); ?></p>
            <p>
                <?php echo TbHtml::linkButton(
                    Yii::t('app', 'Home'),
                    array(
                        'block' => true,
                        'color' => TbHtml::BUTTON_COLOR_LINK,
                        'url' => Yii::app()->homeUrl,
                    )
                ); ?>
            </p>
        </div>
    </div>
</div>
