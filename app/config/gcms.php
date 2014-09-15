<?php

// Configuration specific to Gapminder School CMS

// Always use UTC
date_default_timezone_set('UTC');

// Setup some inter-app path aliases
$basePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$root = $basePath . DIRECTORY_SEPARATOR . '..';
Yii::setPathOfAlias('root', $root);

// Paths to components
Yii::setPathOfAlias('core', $root . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'core');
Yii::setPathOfAlias('api', $root . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'api');
Yii::setPathOfAlias('external-yii-frontend', $root . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'external-yii-frontend');
Yii::setPathOfAlias('internal-yii-frontend', $root . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'internal-yii-frontend');

$gcmsConfig = array(
    'name' => 'Gapminder CMS API',
    'language' => 'en', // default language, see also components.langHandler
    'theme' => null,
    'sourceLanguage' => 'en', // source code language
    'params' => array(
        'env' => 'development',
        'brand' => \gapminder\envbootstrap\Identity::brand(),
    ),
    'aliases' => array(
        // i18n
        'i18n-columns' => 'vendor.neam.yii-i18n-columns',
        'i18n-attribute-messages' => 'vendor.neam.yii-i18n-attribute-messages',
        // qa-state
        'qa-state' => 'vendor.neam.yii-qa-state',
        // relational-graph-db
        'relational-graph-db' => 'vendor.neam.yii-relational-graph-db',
        // phpoffice libraries
        'phpexcel' => 'vendor.phpoffice.phpexcel.Classes',
        'phpword' => 'vendor.phpoffice.phpword.src',
        'phppowerpoint' => 'vendor.phpoffice.phppowerpoint.Classes',
        // fix hard-coded aliases
        'ext.wrest' => 'vendor.weavora.wrest',
        'ext.wrest.WRestController' => 'vendor.weavora.wrest.WRestController',
        'ext.wrest.WHttpRequest' => 'vendor.weavora.wrest.WHttpRequest',
        'ext.wrest.WRestResponse' => 'vendor.weavora.wrest.WRestResponse',
        'ext.wrest.JsonResponse' => 'vendor.weavora.wrest.JsonResponse',
        'application.gii.Migrate.MigrateCode' => 'vendor.mihanentalpo.yii-sql-migration-generator.Migrate.MigrateCode',
    ),
    'import' => array(
        'i18n-columns.behaviors.I18nColumnsBehavior',
        'i18n-attribute-messages.behaviors.I18nAttributeMessagesBehavior',
        'i18n-attribute-messages.components.MissingTranslationHandler',
        'vendor.motin.yii-owner-behavior.OwnerBehavior',
        'qa-state.behaviors.QaStateBehavior',
        'relational-graph-db.behaviors.RelationalGraphDbBehavior',
        'vendor.weavora.wrest.*',
        'vendor.weavora.wrest.actions.*',
        'vendor.weavora.wrest.behaviors.*',
        'application.components.dashboard.*',
        'application.components.user.*',
        'application.components.validators.*',
        'application.behaviors.*',
        'application.controllers.traits.*',
        'application.models.traits.*',
        'application.models.wrappers.Users',
        // import from core
        'core.app.components.*',
        'core.app.exceptions.*',
    ),
    'modules' => array(
        // code generator
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => YII_GII_PASSWORD,
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', '10.0.2.2'),
            'generatorPaths' => array(
                'vendor.phundament.gii-template-collection', // giix generators
                'vendor.mihanentalpo.yii-sql-migration-generator',
                'bootstrap.gii', // bootstrap generator
            ),
        ),
        'p3media' => array(
            'params' => array(
                'presets' => array(
                    'related-thumb' => array(
                        'name' => 'Related Panel Thumbnail',
                        'commands' => array(
                            'resize' => array(200, 200, 2),
                            'quality' => '100',
                        ),
                        'type' => 'jpg',
                    ),
                    'item-list-thumbnail' => array(
                        'name' => 'Item Thumbnail',
                        'commands' => array(
                            'resize' => array(110, 70, 2),
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'wide-profile-info-picture' => array(
                        'name' => 'Wide Profile Info Picture',
                        'commands' => array(
                            'resize' => array(110, 110, 7),
                            'quality' => 85,
                        ),
                    ),
                    'user-profile-picture' => array(
                        'name' => 'User Profile Picture',
                        'commands' => array(
                            'resize' => array(160, 160, 7), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'user-profile-picture-large' => array(
                        'name' => 'User Profile Picture Large',
                        'commands' => array(
                            'resize' => array(262, 262, 7), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'user-profile-picture-small' => array(
                        'name' => 'User Profile Picture Small',
                        'commands' => array(
                            'resize' => array(70, 70, 7), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'user-profile-picture-mini' => array(
                        'name' => 'User Profile Picture Mini',
                        'commands' => array(
                            'resize' => array(25, 25, 7), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'original-public-webm' => array(
                        //'name'         => 'Original File Public',
                        'originalFile' => true,
                        'savePublic' => true,
                        'type' => 'webm',
                    ),
                    'original-public-mp4' => array(
                        //'name'         => 'Original File Public',
                        'originalFile' => true,
                        'savePublic' => true,
                        'type' => 'mp4',
                    ),
                ),
            ),
        ),
    ),
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '/' => 'site/home',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=' . YII_DB_HOST . (defined('YII_DB_PORT') ? ';port=' . YII_DB_PORT : '') . ';dbname=' . YII_DB_NAME,
            'emulatePrepare' => true,
            'username' => YII_DB_USER,
            'password' => YII_DB_PASSWORD,
            'charset' => 'utf8',
            'enableParamLogging' => true, // Log SQL parameters
            //'schemaCachingDuration'=>3600*24,
        ),
        'dbTest' => array(
            'class'=>'system.db.CDbConnection',
            'connectionString' => 'mysql:host=' . TEST_DB_HOST . (defined('TEST_DB_PORT') ? ';port=' . TEST_DB_PORT : '') . ';dbname=' . TEST_DB_NAME,
            'emulatePrepare' => true,
            'username' => TEST_DB_USER,
            'password' => TEST_DB_PASSWORD,
            'charset' => 'utf8',
            'enableParamLogging' => true, // Log SQL parameters
            //'schemaCachingDuration'=>3600*24,
            // This allows the exportDbConfig to work without a working test database available - so that the scripts then can set it up
            'autoConnect' => false,
        ),
        // Supplied in main config
        'langHandler' => array(),
        // Static messages
        'messages' => array(
            'class' => 'CPhpMessageSource',
        ),
        // Yii core static messages
        'coreMessages' => array(
            'basePath' => null,
            'forceTranslation' => true, // This is necessary to be able to override messages in the default language (en_us currently)
        ),
        // Db messages - component 1 - used for output in views
        'displayedMessages' => array(
            'class' => 'CDbMessageSource',
            'onMissingTranslation' => array('MissingTranslationHandler', 'returnSourceLanguageContents'),
        ),
        // Db messages - component 2 - used for input forms through virtual attributes
        'editedMessages' => array(
            'class' => 'CDbMessageSource',
            'onMissingTranslation' => array('MissingTranslationHandler', 'returnNull'),
        ),
        /*
        'messages' => array(
            'class' => 'P3PhpMessageSource',
            'mappings' => array(
                'en_us' => 'en',
                'es_es' => 'es',
                'fa_ir' => 'fa',
                'hi_in' => 'hi',
                'pt_pt' => 'pt',
                'sv_se' => 'sv',
            )
        ),
        */
        'assetManager' => array(
            'class' => 'AssetManager',
        ),
        'sentry' => array(
            'dns' => SENTRY_DSN,
            'enabledEnvironments' => array(ENV),
            'environment' => ENV,
        ),
    )
);

$config =& $gcmsConfig;
$applicationDirectory =& $basePath;

require($applicationDirectory . '/../../core/app/config/includes/logging.php');
require($applicationDirectory . '/../vendor/neam/yii-workflow-core/config/yii-workflow-core.php');
require($applicationDirectory . '/../vendor/neam/yii-workflow-ui/config/yii-workflow-ui.php');
require($applicationDirectory . '/../vendor/neam/yii-simplicity-theme/config/yii-simplicity-theme.php');
require($applicationDirectory . '/../vendor/neam/yii-restricted-access/config/yii-restricted-access.php');
require($applicationDirectory . '/../vendor/neam/yii-workflow-task-list/config/yii-workflow-task-list.php');

// Extension overrides
$config['aliases']['simplicity-theme.app-views.layout-elements._menu'] = 'application.views.layout-elements._menu';
$config['aliases']['simplicity-theme.app-views.layout-elements._footer'] = 'application.views.layout-elements._footer';

return $gcmsConfig;
