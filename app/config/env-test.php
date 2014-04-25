<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);

return array(
    'modules' => array(
        'user' => array(
            'captcha' => array('registration' => false),
        ),
    ),
    'components' => array(
        'assetManager' => array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . "../../www/assets",
            // needed when running from global codecept.phar installation
        ),
        'fixture'      => array(
            'class' => 'system.test.CDbFixtureManager',
        ),
        'urlManager' => array(
            'showScriptName' => true, // this must be here
        ),
    ),
);
