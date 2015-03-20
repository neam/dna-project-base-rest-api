<?php

$approot = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$root = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

// include composer autoloaders
require_once("$approot/vendor/autoload.php");
require_once("$root/vendor/autoload.php");
require_once("$root/dna/vendor/autoload.php");

// Make app config available as PHP constants
require("$root/vendor/neam/php-app-config/include.php");

// include barebones helper class
require_once($root . '/dna/components/Barebones.php');

// Use barebones php for public item GET requests for performance
// todo: currently broken due to new classes implemented for translation support.
//if (strpos($_SERVER['REQUEST_URI'], "/api/v1/item/") === 0 || strpos($_SERVER['REQUEST_URI'], "/api/v1/error") === 0) {
//    $actionroot = $approot . "/barebones/v1/item";
//    require_once($approot . "/app/traits/RestApiControllerTrait.php");
//    require_once($actionroot . "/BarebonesV1ItemController.php");
//    $barecontroller = new BarebonesV1ItemController($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
//    if ($barecontroller->requestIsHandled()) {
//        require_once($approot . "/barebones/bootstrap.php");
//        $barecontroller->run();
//        die();
//    }
//}

// include yii
if (DEV) {
    require_once("$approot/vendor/yiisoft/yii/framework/yii.php");
} else {
    require_once("$approot/vendor/yiisoft/yii/framework/yiilite.php");
}

// config files
require_once("$root/dna/config/DnaConfig.php");
DnaConfig::bootstrap();
$main = require("$approot/app/config/main.php");
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
