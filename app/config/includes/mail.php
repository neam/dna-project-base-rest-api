<?php

$config =& $gcmsConfig;

$config['components']['email'] = array(
    'class' => 'vendor.nordsoftware.yii-emailer.components.Emailer',
    'transportType' => 'smtp',
    'smtpOptions' => array(
        'host' => SMTP_HOST,
        'username' => SMTP_USERNAME,
        'password' => SMTP_PASSWORD,
        'port' => SMTP_PORT,
        'timeout' => 2,
        'encryption' => SMTP_ENCRYPTION
    ),
);

// YiiMail
/*
$config['import'][] = 'ext.yii-mail.YiiMailMessage';
$config['components']['mail'] = array_merge(array(
    'class' => 'ext.yii-mail.YiiMail',
    'viewPath' => 'application.views.mail',
), $GLOBALS['env_config']['components-mail']);
*/
