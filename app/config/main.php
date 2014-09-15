<?php

/**
 * Phundament 3 Application Config File
 * All modules and components have to be declared before installing a new package via composer.
 * See also config.php, for composer installation and update "hooks"
 */

// include gapminder-specific configuration. merged with main configuration in the bottom
$gcmsConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'gcms.php';
$gcmsConfig = require($gcmsConfigFile);

// convenience variables
$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
$baseUrl              = (dirname($_SERVER['SCRIPT_NAME']) == '/' || dirname($_SERVER['SCRIPT_NAME']) == '\\') ? '' :
    dirname($_SERVER['SCRIPT_NAME']);

require($applicationDirectory . '/../../api/app/config/includes/languages.php');
require($applicationDirectory . '/../../api/app/config/includes/languageDirections.php');

// main application configuration
$mainConfig = array(
    'basePath'   => $applicationDirectory,
    'preload'    => array(
        'log',
        'langHandler',
        //'bootstrap',
    ),
    'aliases'    => array(
        // composer
        'root'                                  => $applicationDirectory . '/..',
        'webroot'                               => $applicationDirectory . '/../www',
        'vendor'                                => $applicationDirectory . '/../vendor',
        // componentns
        //'bootstrap'                            => 'vendor.clevertech.yiibooster.src',
        'yiistrap'                              => 'vendor.crisu83.yiistrap',
        // fixing 'hardcoded aliases' from extension (note: you have to use the full path)
        'gii-template-collection'               => 'vendor.phundament.gii-template-collection',
        'app'                                   => 'application',
    ),
    // autoloading model and component classes
    'import'     => array(
        'application.models.*',
        'application.components.*',
        'zii.widgets.*',
        'vendor.phundament.p3media.models.*', // Meta description and keywords (P3Media)
        // imports for components from packages, which do not support composer autoloading
        'vendor.crisu83.yii-rights.components.*', // RWebUser
        //'vendor.clevertech.yiibooster.src.helpers.*', //
        //'vendor.clevertech.yiibooster.src.widgets.*', //
        'vendor.schmunk42.relation.behaviors.GtcSaveRelationsBehavior',
        'vendor.sammaye.auditrail2.models.AuditTrail', //
        'application.helpers.*',
        'application.widgets.*',
    ),
    'modules'    => array(
        // backend for ckeditor styles and templates
        'p3media'              => array(
            'class'  => 'vendor.phundament.p3media.P3MediaModule',
            'params' => array(
                'publicRuntimePath'    => '../www/runtime/p3media',
                'publicRuntimeUrl'     => '/runtime/p3media',
                'protectedRuntimePath' => 'runtime/p3media',
                'presets'              => array(
                    'large'            => array(
                        'name'     => 'Large JPG 1600px',
                        'commands' => array(
                            'resize'  => array(1600, 1600, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'jpg',
                    ),
                    'medium'           => array(
                        'name'     => 'Medium PNG 800px',
                        'commands' => array(
                            'resize'  => array(800, 800, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'png',
                    ),
                    'medium-crop'      => array(
                        'name'     => 'Medium PNG cropped 800x600px',
                        'commands' => array(
                            'resize'  => array(800, 600, 7), // crop
                            'quality' => '85',
                        ),
                        'type'     => 'png',
                    ),
                    'small'            => array(
                        'name'     => 'Small PNG 400px',
                        'commands' => array(
                            'resize'  => array(400, 400, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'png',
                    ),
                    'icon-32'          => array(
                        'name'     => 'Icon PNG 32x32',
                        'commands' => array(
                            'resize' => array(32, 32),
                        ),
                        'type'     => 'png'
                    ),
                    'download'         => array(
                        'name'         => 'Download File',
                        'originalFile' => true,
                        'attachment'   => true,
                    ),
                    'original'         => array(
                        //'name'         => 'Original File', // uncomment name to enable preset in dropdowns
                        'originalFile' => true,
                    ),
                    'original-public'  => array(
                        //'name'         => 'Original File Public',
                        'originalFile' => true,
                        'savePublic'   => true,
                    ),
                    'p3media-ckbrowse' => array(
                        'commands' => array(
                            'resize' => array(150, 120), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                    'p3media-manager'  => array(
                        'commands' => array(
                            'resize' => array(300, 200), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                    'p3media-upload'   => array(
                        'commands' => array(
                            'resize' => array(60, 30), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                )
            ),
        ),
    ),
    // application components
    'components' => array(
        'request' => array(
            'class' => 'HttpRequest',
            'baseUrl'    => $baseUrl,
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
            // Provides support authorization item sorting.
            'defaultRoles' => array('Authenticated', 'Guest'),
        ),
        'cache'         => array(
            'class' => 'CDummyCache',
        ),
        'errorHandler'  => array(
            'class' => 'AppErrorHandler',
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'image'         => array(
            'class'  => 'vendor.phundament.p3extensions.components.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
        ),
        'langHandler'   => array(
            'class'     => 'vendor.phundament.p3extensions.components.P3LangHandler',
            'languages' => array_keys($languages), // available languages, eg. 'lv', 'ru', 'fr'
        ),
        'log'           => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
        'messages'      => array(
            'class' => 'CDbMessageSource',
            //'onMissingTranslation'  => configured in env-development.php,
        ),
        'sentry' => array(
            'class' => 'vendor.crisu83.yii-sentry.components.SentryClient',
            'dns' => null,
            'enabledEnvironments' => array('production', 'staging'),
            'environment' => null, // set in the environment config file
        ),
        'urlManager'    => array(
            'class'          => 'vendor.phundament.p3extensions.components.P3LangUrlManager',
            'showScriptName' => true, // enable mod_rewrite in .htaccess if this is set to false
            'appendParams'   => false, // in general more error resistant
            'urlFormat'      => 'get', // use 'path', otherwise rules below won't work
            'rules'          => array(
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
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'     => array(
        'languages'            => $languages,
        'languageDirections'   => $languageDirections,
    ),
);

return CMap::mergeArray($mainConfig, $gcmsConfig);
