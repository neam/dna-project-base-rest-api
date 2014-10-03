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
        // fix hard-coded aliases
        'OAuth2Yii' => 'vendor.codemix.oauth2yii.src.OAuth2Yii',
        'ext.wrest' => 'vendor.weavora.wrest',
        'ext.wrest.WRestController' => 'vendor.weavora.wrest.WRestController',
        'ext.wrest.WHttpRequest' => 'vendor.weavora.wrest.WHttpRequest',
        'ext.wrest.WRestResponse' => 'vendor.weavora.wrest.WRestResponse',
        'ext.wrest.JsonResponse' => 'vendor.weavora.wrest.JsonResponse',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.components.*',
        'application.controllers.*',
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
        'v1' => array(
            // API version 1 specific configuration goes in here
        ),
    ),
    // application components
    'components' => array(
        'oauth2' => array(
            'class' => 'OAuth2Yii\Component\ServerComponent',
            'userClass' => 'OAuth2User',
            'enableAuthorization' => false,
            'enableImplicit' => false,
            'enableUserCredentials' => true,
            'enableClientCredentials' => false,
        ),
        'request' => array(
            'baseUrl' => $baseUrl,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'useStrictParsing' => true,
            'showScriptName' => false,
            'rules' => array(
                // rest api rules
                // OAuth2 token endpoint for authenticating a user.
                array('<version>/user/login', 'pattern' => 'api/<version:v\d+>/user/login', 'verb' => 'POST'),
                // slugs are required to be prefixed by an ":" character, due to rule collisions
                array('<version>/<controller>/delete', 'pattern' => 'api/<version:v\d+>/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'DELETE'),
                array('<version>/<controller>/update', 'pattern' => 'api/<version:v\d+>/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'PUT'),
                array('<version>/<controller>/list', 'pattern' => 'api/<version:v\d+>/<controller:\w+>', 'verb' => 'GET'),
                array('<version>/<controller>/get', 'pattern' => 'api/<version:v\d+>/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'GET'),
                array('<version>/<controller>/create', 'pattern' => 'api/<version:v\d+>/<controller:\w+>', 'verb' => 'POST'),
                array('<version>/<controller>/<action>', 'pattern' => 'api/<version:v\d+>/<controller:\w+>/<action:\w+>', 'verb' => 'GET'),
                array('<version>/<controller>/<action>', 'pattern' => 'api/<version:v\d+>/<controller:\w+>/<action:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'GET'),
                // rest api cors rules
                array('<version>/<model>/preflight', 'pattern' => 'api/<model:\w+>', 'verb' => 'OPTIONS'),
                array('<version>/<model>/preflight', 'pattern' => 'api/<model:\w+>/<_id:\d+>', 'verb' => 'OPTIONS'),
                array('<version>/<model>/preflight', 'pattern' => 'api/<model:\w+>/subtitles', 'verb' => 'OPTIONS'),
            ),
        ),
        'user' => array(
            'class' => 'WebUser',
            'loginUrl' => null,
            'allowAutoLogin' => false,
        ),
        'session' => array (
            'cookieMode' => 'none',
        ),
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

$config = $mainConfig;

// Import the DNA classes and configuration
require($projectRoot . '/dna/dna-api-revisions/' . YII_DNA_REVISION . '/include.php');

// Extensions' includes
include($applicationDirectory . '/../vendor/neam/yii-dna-debug-modes-and-error-handling/config/error-handling.php');
include($applicationDirectory . '/../vendor/neam/yii-dna-debug-modes-and-error-handling/config/debug-modes.php');

// This is a REST application, so we want' to handle errors accordingly.
$config['components']['errorHandler'] = array(
    'class' => 'YiiDnaRestErrorHandler',
);

// Uncomment to easily see the active merged configuration
//echo "<pre>";print_r($config);echo "</pre>";die();

return $config;
