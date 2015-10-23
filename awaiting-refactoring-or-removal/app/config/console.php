<?php

$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

$consoleConfig = array(
    'name' => 'Gapminder CMS REST API Console Application',
    'import' => array(
        'application.commands.components.*',
    ),
    'commandMap' => array(),
);

// web config files
$main = require("$applicationDirectory/config/main.php");
$env = require("$applicationDirectory/config/environments/" . CONFIG_ENVIRONMENT . ".php");

// merge configurations
$webConfig = CMap::mergeArray($main, $env);

// create base console config from web configuration
$config = array(
    'name' => $webConfig['name'],
    'language' => $webConfig['language'],
    'basePath' => $webConfig['basePath'],
    'aliases' => $webConfig['aliases'],
    'import' => $webConfig['import'],
    'components' => $webConfig['components'],
    'modules' => $webConfig['modules'],
    'params' => $webConfig['params'],
);

// apply console config
$config = CMap::mergeArray($config, $consoleConfig);

return $config;
