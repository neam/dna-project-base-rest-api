<?php

$config =& $gcmsConfig;

$config['components']['email'] = array(
    'class' => 'vendor.nordsoftware.yii-emailer.components.Emailer',
);

// YiiMail
/*
$config['import'][] = 'ext.yii-mail.YiiMailMessage';
$config['components']['mail'] = array_merge(array(
    'class' => 'ext.yii-mail.YiiMail',
    'viewPath' => 'application.views.mail',
), $GLOBALS['env_config']['components-mail']);
*/
