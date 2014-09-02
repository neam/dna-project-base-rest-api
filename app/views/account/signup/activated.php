<?php
/** @var SignupController $this */
?>
<div class="signup-controller done-action">
    <div class="row">
        <div class="message-container">
            <div class="brand-logo">
                <h1><?php echo Html::renderLogoWithLink('Gapminder') ?></h1>
            </div>
            <h2 class="heading-small"><?php echo Yii::t('app', 'Congratulations!'); ?></h2>
            <?php // NOTE! parts of the following text is used by acceptance tests to test activation success. ?>
            <p><?php echo Yii::t('app', 'You have successfully become a member of the Gapminder community! Click on the link below to sign in.'); ?></p>
            <div class="page-actions">
                <?php echo TbHtml::linkButton(
                    Yii::t('app', 'Sign In'),
                    array(
                        'url' => Yii::app()->user->loginUrl,
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>