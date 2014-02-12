<?php

$dir     = realpath(dirname(__FILE__) . '/..') . '/';

// register composer autoloader
require_once(dirname(__FILE__) . '/../vendor/autoload.php');

// load Yii
require_once($dir . 'vendor/yiisoft/yii/framework/yii.php');

// config files
$console = require($dir . 'app/config/console.php');

// Check for optional local console-local.php configuration file
if (file_exists($dir . 'app/config/console-local.php')) {
    $consoleLocal = require($dir . 'app/config/console-local.php');
    $config       = CMap::mergeArray($config, $consoleLocal);
}

// This will use $config and autostart a console application
require_once($dir . 'vendor/yiisoft/yii/framework/yiic.php');
