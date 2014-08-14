<?php

$root = dirname(__DIR__);

require_once("$root/vendor/autoload.php");
require_once("$root/vendor/yiisoft/yii/framework/yii.php");

// config file
$consoleConfig = require("$root/app/config/console.php");

// This will use $config and autostart a console application
require_once("$root/vendor/yiisoft/yii/framework/yiic.php");
