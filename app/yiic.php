<?php

$root = dirname(__DIR__);

require_once("$root/vendor/autoload.php");
require_once("$root/vendor/yiisoft/yii/framework/yii.php");

// web config files
$main = require("$root/app/config/main.php");
$env = require("$root/app/config/env-" . CONFIG_ENVIRONMENT . ".php");

// merge configurations
$webConfig = CMap::mergeArray($main, $env);

// create base console config from web configuration
$config = array(
    'name'       => $webConfig['name'],
    'language'   => $webConfig['language'],
    'basePath'   => $webConfig['basePath'],
    'aliases'    => $webConfig['aliases'],
    'import'     => $webConfig['import'],
    'components' => $webConfig['components'],
    'modules'    => $webConfig['modules'],
    'params'     => $webConfig['params'],
);

// config file
$consoleConfig = require("$root/app/config/console.php");

// apply console config
$config = CMap::mergeArray($config, $consoleConfig);

// This will use $config and autostart a console application
require_once("$root/vendor/yiisoft/yii/framework/yiic.php");
