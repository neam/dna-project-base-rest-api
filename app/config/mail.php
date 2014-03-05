<?php

$config =& $gcmsConfig;

// YiiMail

$config['import'][] = 'ext.yii-mail.YiiMailMessage';
$config['components']['mail'] = array_merge(array(
    'class' => 'ext.yii-mail.YiiMail',
    'viewPath' => 'application.views.mail',
), $GLOBALS['env_config']['components-mail']);
