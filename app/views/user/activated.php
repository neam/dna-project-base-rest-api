<div class="registration-controller activated-action">
    <div class="row">
        <div class="message-container">
            <div class="brand-logo">
                <h1><?php echo Html::renderLogoWithLink('Gapminder') ?></h1>
            </div>
            <h2 class="heading-small"><?php echo Yii::t('app', 'Congratulations!'); ?></h2>
            <p><?php echo Yii::t('app', 'You have successfully become a member of the Gapminder community! Click on the link below to log in and proceed to the user dashboard.'); ?></p>
            <div class="page-actions">
                <?php echo TbHtml::linkButton(
                    Yii::t('app', 'Log In'),
                    array(
                        'url' => array('/dashboard/index'),
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>