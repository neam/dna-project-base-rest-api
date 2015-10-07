<?php

$appRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$root = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app';

// include composer autoloaders
require_once("$appRoot/vendor/autoload.php");
require_once("$root/vendor/autoload.php");
require_once("$root/dna/vendor/autoload.php");

// HHVM SCRIPT_NAME difference vs php-fpm workaround
if (defined('HHVM_VERSION')) {
    $_SERVER['DOCUMENT_ROOT'] = $_SERVER['NGINX_DOCUMENT_ROOT'];
    $_SERVER['SCRIPT_NAME'] = $_SERVER['NGINX_SCRIPT_NAME'];
    $_SERVER['PHP_SELF'] = $_SERVER['NGINX_SCRIPT_NAME'];
}

// root-level bootstrap logic
require("$root/bootstrap.php");

// the most barebones app possible
require_once("$appRoot/app/traits/SendCorsHeadersMethodTrait.php");

class BootstrapWebApplication
{
    use SendCorsHeadersMethodTrait;

    public function displayException(Exception $e)
    {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

$app = new BootstrapWebApplication();

// handle OPTIONS requests in the most barebones manner possible
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    $app->sendCorsHeaders();
    exit();
}

// include barebones helper class
require_once($root . '/dna/components/Barebones.php');

// Use barebones php for public item GET requests for performance
// todo: enable API V2 once it works.
foreach (array('v1'/*, 'v2'*/) as $apiVersion) {
    if (strpos($_SERVER['REQUEST_URI'], "/api/{$apiVersion}/item/") === 0 || strpos($_SERVER['REQUEST_URI'], "/api/{$apiVersion}/error") === 0) {
        $actionRoot = $appRoot . "/barebones/{$apiVersion}/item";
        require_once($appRoot . "/app/traits/RestApiControllerTrait.php");
        $ctrlName = "Barebones{$apiVersion}ItemController";
        require_once("{$actionRoot}/{$ctrlName}.php");
        $bareCtrl = new $ctrlName($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
        if ($bareCtrl->requestIsHandled()) {
            require_once($appRoot . "/barebones/bootstrap.php");
            $bareCtrl->run();
            die();
        }
    }
}

// include yii
if (DEV) {
    require_once("$appRoot/vendor/yiisoft/yii/framework/yii.php");
} else {
    require_once("$appRoot/vendor/yiisoft/yii/framework/yiilite.php");
}

// config files
require_once("$root/dna/config/DnaConfig.php");
DnaConfig::bootstrap();
$main = require("$appRoot/app/config/main.php");
$env = require("$appRoot/app/config/environments/" . CONFIG_ENVIRONMENT . ".php");

// define YII_DEBUG in config files
if (defined('YII_DEBUG') && YII_DEBUG) {
    error_reporting(E_ALL | E_STRICT);
}

// merge configurations
$config = CMap::mergeArray($main, $env);

// start web application
require_once("$appRoot/app/components/WebApplication.php");

try {
    Yii::createApplication('WebApplication', $config)->run();
} catch (PDOException $e) {
    $app->displayException($e);
    //throw $e;
} catch (\Propel\Runtime\Connection\Exception\ConnectionException $e) {
    $app->displayException($e);
    throw $e;
}
