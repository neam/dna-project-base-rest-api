<?php

// convenience variables
$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
$projectRoot = $applicationDirectory . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';
$baseUrl = (dirname($_SERVER['SCRIPT_NAME']) == '/' || dirname($_SERVER['SCRIPT_NAME']) == '\\') ? '' :
    dirname($_SERVER['SCRIPT_NAME']);

// main application configuration
$mainConfig = array(
    'basePath' => $applicationDirectory,
    'aliases' => array(
        'root' => $projectRoot,
        'app' => $applicationDirectory,
        'vendor' => $applicationDirectory . '/../vendor',
        'dna' => $projectRoot . '/dna',
        'app' => 'application',
        // fix hard-coded aliases
        'ext.wrest' => 'vendor.weavora.wrest',
        'ext.wrest.WRestController' => 'vendor.weavora.wrest.WRestController',
        'ext.wrest.WHttpRequest' => 'vendor.weavora.wrest.WHttpRequest',
        'ext.wrest.WRestResponse' => 'vendor.weavora.wrest.WRestResponse',
        'ext.wrest.JsonResponse' => 'vendor.weavora.wrest.JsonResponse',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.components.*',
        'vendor.weavora.wrest.*',
        'vendor.weavora.wrest.actions.*',
        'vendor.weavora.wrest.behaviors.*',
    ),
    // put rest-api-specific p3media presets here
    'modules' => array(
        'p3media' => array(
            'params' => array(
                'presets' => array()
            ),
        ),
    ),
    // application components
    'components' => array(
        'request' => array(
            'baseUrl' => $baseUrl,
        ),
        'urlManager' => array(
            'rules' => array(

                // rest api rules
                // slugs are required to be prefixed by an ":" character, due to rule collisions
                array('api/<controller>/delete', 'pattern' => 'api/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'DELETE'),
                array('api/<controller>/update', 'pattern' => 'api/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'PUT'),
                array('api/<controller>/list', 'pattern' => 'api/<controller:\w+>', 'verb' => 'GET'),
                array('api/<controller>/get', 'pattern' => 'api/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'GET'),
                array('api/<controller>/create', 'pattern' => 'api/<controller:\w+>', 'verb' => 'POST'),
                array('api/<controller>/<action>', 'pattern' => 'api/<controller:\w+>/<action:\w+>', 'verb' => 'GET'),
                array('api/<controller>/<action>', 'pattern' => 'api/<controller:\w+>/<action:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'GET'),
                // rest api cors rules
                array('api/<model>/preflight', 'pattern' => 'api/<model:\w+>', 'verb' => 'OPTIONS'),
                array('api/<model>/preflight', 'pattern' => 'api/<model:\w+>/<_id:\d+>', 'verb' => 'OPTIONS'),
                array('api/<model>/preflight', 'pattern' => 'api/<model:\w+>/subtitles', 'verb' => 'OPTIONS'),

            ),
        ),
    ),
);

$config = $mainConfig;

// Import the DNA classes and configuration
require($projectRoot . '/dna/dna-api-revisions/' . YII_DNA_REVISION . '/include.php');

// Extensions' includes
include($applicationDirectory . '/../vendor/neam/yii-dna-debug-modes-and-error-handling/config/error-handling.php');
include($applicationDirectory . '/../vendor/neam/yii-dna-debug-modes-and-error-handling/config/debug-modes.php');

// Uncomment to easily see the active merged configuration
//echo "<pre>";print_r($config);echo "</pre>";die();

return $config;
