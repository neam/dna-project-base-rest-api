<?php

// Configuration specific to Gapminder School CMS

$envbootstrap = dirname(__FILE__) . '/../../../common/settings/envbootstrap.php';
if (!is_readable($envbootstrap))
{
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

$gscmsConfig = array(
	'name' => 'Gapminder School CMS',
	'language' => 'en', // default language, see also components.langHandler
	'aliases' => array(
		// i18n-columns
        'i18n-columns' => 'vendor.neam.yii-i18n-columns',
	),
	'import' => array(
		'i18n-columns.behaviors.I18nColumnsBehavior',
	),
	'modules' => array(
		// uncomment the following to enable the Gii tool
		'gii' => array(
			'password' => YII_GII_PASSWORD,
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
	)
);

return $gscmsConfig;
