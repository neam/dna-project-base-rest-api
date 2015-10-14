<?php

// convenience variables
$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
$projectRoot = $applicationDirectory . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app';
$baseUrl = (dirname($_SERVER['SCRIPT_NAME']) == '/' || dirname($_SERVER['SCRIPT_NAME']) == '\\') ? '' :
    dirname($_SERVER['SCRIPT_NAME']);

// main application configuration
$mainConfig = array(
    'basePath' => $applicationDirectory,
    'aliases' => array(
        'root' => $projectRoot,
        'rest-api' => $applicationDirectory,
        'rest-api-dna' => $applicationDirectory . '/../../rest-api-dna/app',
        'vendor' => $applicationDirectory . '/../vendor',
        'dna' => $projectRoot . '/dna',
        // fix hard-coded aliases
        //'OAuth2Yii' => 'vendor.codemix.oauth2yii.src.OAuth2Yii',
    ),
    'modules' => array(
        // API version 0 (neamtime workaround to not interfere with upstream api versions)
        'v0' => array(
            'class' => 'rest-api-dna.modules.v0.V0Module',
            'import' => array(
                // base classes
                'rest-api.behaviors.*',
                'rest-api.components.*',
                'rest-api.controllers.*',
                'rest-api.interfaces.*',
                'rest-api.models.*',
                'rest-api.models.*',
                'rest-api.traits.*',
                'vendor.weavora.wrest.*',
                'vendor.weavora.wrest.actions.*',
                // v0 specific classes
                'rest-api-dna.modules.v0.behaviors.*',
                'rest-api-dna.modules.v0.components.*',
                'rest-api-dna.modules.v0.controllers.*',
                'rest-api-dna.modules.v0.interfaces.*',
                'rest-api-dna.modules.v0.models.base.*',
                'rest-api-dna.modules.v0.models.*',
            ),
        ),
        // API version 1
        'v1' => array(
            'import' => array(
                // base classes
                'rest-api.behaviors.*',
                'rest-api.components.*',
                'rest-api.controllers.*',
                'rest-api.interfaces.*',
                'rest-api.models.*',
                'rest-api.traits.*',
                'vendor.weavora.wrest.*',
                'vendor.weavora.wrest.actions.*',
                // v1 specific classes
                'rest-api.modules.v1.behaviors.*',
                'rest-api.modules.v1.components.*',
                'rest-api.modules.v1.controllers.*',
                'rest-api.modules.v1.interfaces.*',
                'rest-api.modules.v1.models.*',
            ),
        ),
        // API version 2
        'v2' => array(
            'import' => array(
                // base classes
                'rest-api.behaviors.*',
                'rest-api.components.*',
                'rest-api.controllers.*',
                'rest-api.interfaces.*',
                'rest-api.models.*',
                'rest-api.traits.*',
                'vendor.weavora.wrest.*',
                'vendor.weavora.wrest.actions.*',
                // v2 specific classes
                'rest-api.modules.v2.behaviors.*',
                'rest-api.modules.v2.components.*',
                'rest-api.modules.v2.components.factories.*',
                'rest-api.modules.v2.components.translators.*',
                'rest-api.modules.v2.controllers.*',
                'rest-api.modules.v2.interfaces.*',
                'rest-api.modules.v2.models.*',
                'rest-api.modules.v2.models.blocks.*',
            ),
        ),
    ),
    // rest-api components
    'components' => array(
        'itemTranslatorFactory' => array(
            'class' => 'ItemTranslatorFactory',
        ),
        'sirTrevorBlockFactory' => array(
            'class' => 'SirTrevorBlockFactory',
        ),
        /*
        'oauth2' => array(
            'class' => 'OAuth2Yii\Component\ServerComponent',
            'userClass' => 'OAuth2User',
            'clientClass' => 'OAuth2Client',
            'enableAuthorization' => false,
            'enableImplicit' => false,
            'enableUserCredentials' => true,
            'enableClientCredentials' => false,
        ),
        */
        'request' => array(
            'baseUrl' => $baseUrl,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'useStrictParsing' => true,
            'showScriptName' => false,
            'rules' => array(
                // These are special endpoints used for testing purposes only.
                // It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.
                array('<version>/item/getByNodeId', 'pattern' => '<version:v\d+>/item/<node_id:\d+>/test/<itemType:\w+>', 'verb' => 'GET'),
                array('<version>/item/getByNodeId', 'pattern' => '<version:v\d+>/item/<node_id:\d+>/test/<itemType:\w+>/<lang:[\w-]+>', 'verb' => 'GET'),
                array('<version>/item/getByRoute', 'pattern' => '<version:v\d+>/item/<route:[\w-\/]+>/test-by-route/<itemType:\w+>', 'verb' => 'GET'),
                array('<version>/item/getByRoute', 'pattern' => '<version:v\d+>/item/<route:[\w-\/]+>/test-by-route/<itemType:\w+>/<lang:[\w-]+>', 'verb' => 'GET'),
                array('<version>/translation/get', 'pattern' => '<version:v\d+>/translation/<nodeId:\d+>/test/<itemType:\w+>', 'verb' => 'GET'),
                array('<version>/translation/update', 'pattern' => '<version:v\d+>/translation/<nodeId:\d+>/test/<itemType:\w+>', 'verb' => 'PUT, POST'),

                // custom rules
                array('<version>/profile/get', 'pattern' => '<version:v\d+>/profile', 'verb' => 'GET'),
                array('<version>/profile/update', 'pattern' => '<version:v\d+>/profile', 'verb' => 'PUT'),
                array('<version>/user/login', 'pattern' => '<version:v\d+>/user/login', 'verb' => 'POST'),
                array('<version>/profile/get', 'pattern' => '<version:v\d+>/user/profile', 'verb' => 'GET'),
                array('<version>/profile/update', 'pattern' => '<version:v\d+>/user/profile', 'verb' => 'PUT'),
                array('<version>/user/authenticate', 'pattern' => '<version:v\d+>/user/authenticate', 'verb' => 'POST'),
                array('<version>/profile/public', 'pattern' => '<version:v\d+>/user/<accountId:\d+>/profile', 'verb' => 'GET'),
                array('<version>/translation/get', 'pattern' => '<version:v\d+>/translation/<nodeId:\d+>', 'verb' => 'GET'),
                array('<version>/translation/update', 'pattern' => '<version:v\d+>/translation/<nodeId:\d+>', 'verb' => 'PUT, POST'),
                array('<version>/item/getByNodeId', 'pattern' => '<version:v\d+>/item/<node_id:\d+>', 'verb' => 'GET'),
                array('<version>/item/getByRoute', 'pattern' => '<version:v\d+>/item/<route:[\w-\/]+>', 'verb' => 'GET'),

                // auth requests
                array('<version>/auth/loginNotify', 'pattern' => '<version:v\d+>/auth/loginNotify', 'verb' => 'POST'),
                array('<version>/auth/logoutNotify', 'pattern' => '<version:v\d+>/auth/logoutNotify', 'verb' => 'POST'),
                array('<version>/auth/loginNotify', 'pattern' => '<version:v\d+>/auth/loginNotify', 'verb' => 'GET'), // for dev
                array('<version>/auth/logoutNotify', 'pattern' => '<version:v\d+>/auth/logoutNotify', 'verb' => 'GET'), // for dev

                // common CRUD rules
                // slugs are required to be prefixed by an ":" character, due to rule collisions
                array('<version>/<controller>/list', 'pattern' => '<version:v\d+>/<controller:\w+>', 'verb' => 'GET'),
                array('<version>/<controller>/create', 'pattern' => '<version:v\d+>/<controller:\w+>', 'verb' => 'POST'),
                array('<version>/<controller>/get', 'pattern' => '<version:v\d+>/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'GET'),
                array('<version>/<controller>/update', 'pattern' => '<version:v\d+>/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'PUT'),
                array('<version>/<controller>/delete', 'pattern' => '<version:v\d+>/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'DELETE'),
                array('<version>/<controller>/<action>', 'pattern' => '<version:v\d+>/<controller:\w+>/<action:\w+>/<id:\d+>', 'verb' => 'GET'),

                // special CRUD rules
                array('<version>/<controller>/suggestions', 'pattern' => '<version:v\d+>/<controller:\w+>/suggestions', 'verb' => 'POST'),
                array('<version>/<controller>/addEconomacsFileByUrl', 'pattern' => '<version:v\d+>/<controller:\w+>/addEconomacsFileByUrl', 'verb' => 'POST'),
                array('<version>/<controller>/suggestions', 'pattern' => '<version:v\d+>/<controller:\w+>/suggestions', 'verb' => 'GET'), // for dev
                array('<version>/<controller>/addEconomacsFileByUrl', 'pattern' => '<version:v\d+>/<controller:\w+>/addEconomacsFileByUrl', 'verb' => 'GET'), // for dev

                // CORS rules
                // todo: the cors allow methods are currently hard-coded. think of better solution.

                // custom rules
                array('<version>/profile/preflight', 'pattern' => '<version:v\d+>/user/profile', 'verb' => 'OPTIONS'),
                array('<version>/profile/preflight', 'pattern' => '<version:v\d+>/user/<accountId:\d+>/profile', 'verb' => 'OPTIONS'),
                array('<version>/item/preflight', 'pattern' => '<version:v\d+>/item/<id:\d+|[\w-\/]+>', 'verb' => 'OPTIONS'),
                // common rules
                array('<version>/<controller>/preflight', 'pattern' => '<version:v\d+>/<controller:\w+>', 'verb' => 'OPTIONS'),
                array('<version>/<controller>/preflight', 'pattern' => '<version:v\d+>/<controller:\w+>/<action:\w+>', 'verb' => 'OPTIONS'),
                array('<version>/<controller>/preflight', 'pattern' => '<version:v\d+>/<controller:\w+>/<id:\d+|\:[\w-]+>', 'verb' => 'OPTIONS'),
                array('<version>/<controller>/preflight', 'pattern' => '<version:v\d+>/<controller:\w+>/<action:\w+>/<id:\d+>', 'verb' => 'OPTIONS'),
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
                    'class' => '\neam\yii_streamlog\LogRoute', // output to stdout/err
                    'levels' => 'error, warning',
                ),
//                array(
//                    'class' => 'CProfileLogRoute',
//                    'report' => 'summary',
//                ),
            ),
        ),
        'dbSchemaCache' => array(
            'class' => 'CApcCache',
        ),
        'db'=>array(
//            'enableParamLogging' => true,
//            'enableProfiling' => true,
            'schemaCacheID' => 'dbSchemaCache',
            'schemaCachingDuration' => 172800, // 48 hours
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

// Not used in rest api and should thus not be loaded (performance reasons)
unset($config['modules']['gii']);
unset($config['behaviors']['eventBridge']);
unset($config['components']['events']);
unset($config['components']['workflowUi']);
unset($config['components']['langHandler']);
unset($config['components']['authManager']);

// Uncomment to easily see the active merged configuration
//echo "<pre>";print_r($config);echo "</pre>";die();

return $config;
