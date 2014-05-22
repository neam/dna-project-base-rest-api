<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);

$root = dirname(__DIR__);

require_once("$root/vendor/autoload.php");
require_once("$root/vendor/yiisoft/yii/framework/yii.php");
require_once("$root/app/components/WebApplication.php");

// config files
$main = require("$root/app/config/main.php");
$env = require("$root/app/config/env-" . CONFIG_ENVIRONMENT . ".php");

// define YII_DEBUG in config files
if (defined('YII_DEBUG') && YII_DEBUG) {
    error_reporting(E_ALL | E_STRICT);
}

// merge configurations
$config = CMap::mergeArray($main, $env);

// start web application
Yii::createApplication('WebApplication', $config)->run();
