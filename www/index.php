<?php

$root = dirname(__DIR__);

// include composer autoloader
require_once("$root/vendor/autoload.php");

// include envbootstrap
require("$root/app/config/envbootstrap/include.php");

// include yii
require_once("$root/vendor/yiisoft/yii/framework/yii.php");

// config files
$main = require("$root/app/config/main.php");
$env = require("$root/app/config/environments/" . CONFIG_ENVIRONMENT . ".php");

// define YII_DEBUG in config files
if (defined('YII_DEBUG') && YII_DEBUG) {
    error_reporting(E_ALL | E_STRICT);
}

// merge configurations
$config = CMap::mergeArray($main, $env);

// start web application
require_once("$root/app/components/WebApplication.php");
Yii::createApplication('WebApplication', $config)->run();
