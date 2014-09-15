<?php

$root = dirname(__DIR__);

// include composer autoloader
require_once("$root/vendor/autoload.php");

// include envbootstrap
require("$root/../core/envbootstrap/include.php");

// include yii
require_once("$root/vendor/yiisoft/yii/framework/yii.php");

// config file
$consoleConfig = require("$root/app/config/console.php");

// This will use $config and autostart a console application
require_once("$root/vendor/yiisoft/yii/framework/yiic.php");
