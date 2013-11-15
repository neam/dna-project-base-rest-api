<?php

// Configuration specific to Gapminder School CMS

$envbootstrap = dirname(__FILE__) . '/../../../common/settings/envbootstrap.php';
if (!is_readable($envbootstrap)) {
    echo "Main envbootstrap file not available.";
    die(2);
}
require_once($envbootstrap);

// Always use UTC
date_default_timezone_set('UTC');

// Setup some inter-app path aliases
$basePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$root = $basePath . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';
Yii::setPathOfAlias('backend', $root . DIRECTORY_SEPARATOR . 'cms');
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
Yii::setPathOfAlias('i18n', $root . DIRECTORY_SEPARATOR . 'i18n');

$gcmsConfig = array(
    'name' => 'Gapminder CMS',
    'language' => 'en', // default language, see also components.langHandler
    'params' => array(
        'env' => 'development',
    ),
    'preload' => array( //'ezc', // trying out if we can lazy-load this instead of preloading it...
    ),
    'aliases' => array(
        // i18n-columns
        'i18n-columns' => 'vendor.neam.yii-i18n-columns',
        // qa-state
        'qa-state' => 'vendor.neam.yii-qa-state',
        // relational-graph-db
        'relational-graph-db' => 'vendor.neam.yii-relational-graph-db',
        // phpoffice libraries
        'phpexcel' => 'vendor.phpoffice.phpexcel.Classes',
        'phpword' => 'vendor.phpoffice.phpword.src',
        'phppowerpoint' => 'vendor.phpoffice.phppowerpoint.Classes',
        // yii graphviz
        'yii-graphviz' => 'vendor.ascendro.yii-graphviz',
        // fix hard-coded aliases
        'application.gii.Migrate.MigrateCode' => 'vendor.mihanentalpo.yii-sql-migration-generator.Migrate.MigrateCode'
    ),
    'import' => array(
        'i18n-columns.behaviors.I18nColumnsBehavior',
        'qa-state.behaviors.QaStateBehavior',
        'relational-graph-db.behaviors.RelationalGraphDbBehavior',
        'application.behaviors.EzcWorkflowBehavior',
        'application.workflows.custom.*',
        'application.workflows.*',
        'application.controllers.traits.*',
        'application.models.wrappers.Users',
        'application.exceptions.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => YII_GII_PASSWORD,
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'vendor.phundament.gii-template-collection', // giix generators
                'vendor.mihanentalpo.yii-sql-migration-generator',
                'bootstrap.gii', // bootstrap generator
            ),
        ),
        'p3media' => array(
            'params' => array(
                'presets' => array(
                    'select2-thumb' => array(
                        'name' => 'Select2 Thumbnail',
                        'commands' => array(
                            'resize' => array(150, 80, 7), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
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
                '/' => 'site/index',
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
            'connectionString' => 'mysql:host=' . TEST_DB_HOST . (defined('TEST_DB_PORT') ? ';port=' . TEST_DB_PORT : '') . ';dbname=' . TEST_DB_NAME,
            'emulatePrepare' => true,
            'username' => TEST_DB_USER,
            'password' => TEST_DB_PASSWORD,
            'charset' => 'utf8',
            'enableParamLogging' => true, // Log SQL parameters
            //'schemaCachingDuration'=>3600*24,
        ),
        'langHandler' => array(
            'languages' => array(
                'en',
                'es',
                'fa',
                'hi',
                'pt',
                'sv',
                'cn',
                'de',
            )
        ),
        // Static messages
        'messages'      => array(
            'class' => 'CPhpMessageSource',
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
        'authManager' => array(
            'class' => 'vendor.codemix.hybridauthmanager.HybridAuthManager',
            'authFile' => Yii::getPathOfAlias('backend') . '/app/data/auth-gcms.php',
        ),
        'assetManager' => array(
            'class' => 'AssetManager',
        ),
        'ezc' => array(
            'class' => 'application.components.EzcComponent',
            'tablePrefix' => 'ezc_',
        ),
        'user' => array(
            'returnUrl' => array('/'),
        )
    )
);

require('logging.php');
//require('mail.php');

return $gcmsConfig;
