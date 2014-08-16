<?php
/* @var SignupController $this */
/* @var string $activateUrl */
/* @var string $username */
?>
<?php $signupUrl = $this->createAbsoluteUrl('/account/signup'); ?>
<?php echo Yii::t(
    'app',
    'Please confirm your email address and activate your new Gapminder account <strong>{username}</strong> by clicking on the following link: {activationLink}',
    array(
        '{activationLink}' => TbHtml::link($activateUrl, $activateUrl),
        '{username}' => $username,
    )
); ?><br>
<br>
<?php echo Yii::t('app', 'Thanks'); ?><br>
<?php echo Yii::t('app', 'Gapminder Foundation'); ?><br>
<br>
<?php echo Yii::t(
    'app',
    '
    (Your email address was provided to us by someone requesting to create a new account at
    {signupUrl}. If you did not provide the address, this email message must come to you as a
    surprise. We apologize for the inconvenience and would kindly ask you to inform us about the
    misuse so that we may investigate the cause. Please send us an email at {infoEmail}. We are
    very sorry!)
    ',
    array(
        '{signupUrl}' => TbHtml::link($signupUrl, $signupUrl),
        '{infoEmail}' => Yii::app()->params['adminEmail'],
    )
); ?>
