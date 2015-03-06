<?php

$approot = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$root = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

// include composer autoloaders
require_once("$approot/vendor/autoload.php");
require_once("$root/vendor/autoload.php");
require_once("$root/dna/vendor/autoload.php");

// Make app config available as PHP constants
require("$root/vendor/neam/php-app-config/include.php");

// include yii
if (DEV) {
    require_once("$approot/vendor/yiisoft/yii/framework/yii.php");
} else {
    require_once("$approot/vendor/yiisoft/yii/framework/yiilite.php");
}

// config files
require_once("$root/dna/config/DnaConfig.php");
DnaConfig::bootstrap();
if (DEV) {
    $main = require("$approot/app/config/main.php");
} else {
    $main = require("$approot/app/config/cached-main.php");
}
$env = require("$approot/app/config/environments/" . CONFIG_ENVIRONMENT . ".php");

// define YII_DEBUG in config files
if (defined('YII_DEBUG') && YII_DEBUG) {
    error_reporting(E_ALL | E_STRICT);
}

// merge configurations
$config = CMap::mergeArray($main, $env);

// start web application
require_once("$approot/app/components/WebApplication.php");
Yii::createApplication('WebApplication', $config)->run();
