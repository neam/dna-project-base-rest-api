<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);

return array(
    'modules' => array(
        'user' => array(
            'captcha' => array('registration' => false),
            'sendActivationMail' => false, // TODO: use mailcatcher instead
        ),
    ),
    'components' => array(
        'assetManager' => array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . "../../www/assets",
            // needed when running from global codecept.phar installation
        ),
        'db' => array(
            'connectionString' => 'mysql:host=' . TEST_DB_HOST . (defined('TEST_DB_PORT') ? ';port=' . TEST_DB_PORT : '') . ';dbname=' . TEST_DB_NAME,
            'emulatePrepare' => true,
            'username' => TEST_DB_USER,
            'password' => TEST_DB_PASSWORD,
            'charset' => 'utf8',
            'enableParamLogging' => true, // Log SQL parameters
            //'schemaCachingDuration'=>3600*24,
        ),
        'fixture'      => array(
            'class' => 'system.test.CDbFixtureManager',
        ),
    ),
);
