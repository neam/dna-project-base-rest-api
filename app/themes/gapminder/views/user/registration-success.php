<div class="registration-controller registrationsuccess-action">
    <div class="row">
        <div class="message-container">
            <div class="brand-logo">
                <h1><?php echo Html::renderLogoWithLink('Gapminder') ?></h1>
            </div>
            <p><?php echo Yii::t('app', 'Thank you for registering! You will receive a confirmation email as soon as your application has been reviewed.'); ?></p>
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