<?php
/** @var SignupController $this */
?>
<div class="signup-controller done-action">
    <div class="row">
        <div class="message-container">
            <div class="brand-logo">
                <h1><?php echo Html::renderLogoWithLink('Gapminder') ?></h1>
            </div>
            <?php // NOTE! the following text ("Thank you for your registration.") is used by acceptance tests to test registration success. ?>
            <p><?php echo Yii::t('app', 'Thank you for your registration. You will promptly receive a confirmation email.'); ?></p>

            <div class="page-actions">
                <?php echo TbHtml::linkButton(
                    Yii::t('app', 'Back to Front Page'),
                    array(
                        'url' => Yii::app()->homeUrl,
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>
