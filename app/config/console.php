<?php

$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
$projectRoot = $applicationDirectory . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$config = array(
    'name' => 'Gapminder CMS REST API Console Application',
    'basePath' => $applicationDirectory,
    'aliases' => array(
        'root' => $projectRoot,
        'app' => $applicationDirectory,
        'vendor' => $applicationDirectory . '/../vendor',
        'dna' => $projectRoot . '/dna',
    ),
    'import' => array(
        'application.commands.components.*',
        'application.behaviors.*',
        'application.components.*',
        'application.controllers.*',
        'application.interfaces.*',
        'application.models.*',
    ),
    'commandMap' => array(),
    'components' => array(
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);

require($projectRoot . '/dna/dna-api-revisions/' . YII_DNA_REVISION . '/include.php');
$env = require("$applicationDirectory/config/environments/" . CONFIG_ENVIRONMENT . ".php");

// Unset unused configs that come from the dna config.
unset($config['theme']);

// merge configurations
return CMap::mergeArray($config, $env);
