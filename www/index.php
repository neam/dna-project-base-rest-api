<?php

$appRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$root = dirname(
        __FILE__
    ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app';

// include composer autoloaders
require_once("$appRoot/vendor/autoload.php");
require_once("$root/vendor/autoload.php");
require_once("$root/dna/vendor/autoload.php");

// root-level bootstrap logic, including propel orm init
require("$root/bootstrap.php");

try {

    // the most barebones app possible
    $app = new WebApplication();

    // handle OPTIONS requests in the most barebones manner possible
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        $app->sendCorsHeaders();
        exit();
    }

    // include barebones helper class
    require_once($root . '/dna/components/Barebones.php');

    // activate error handling via sentry - note: this runs ini_set('display_errors', false)
    \barebones\SentryErrorHandling::activate(SENTRY_DSN);

    // detect api version
    foreach (array('v0', 'v1', 'v2') as $apiVersion) {
        if (strpos($_SERVER['REQUEST_URI'], "/api/{$apiVersion}/") === 0) {
            define('API_VERSION', $apiVersion);
            break;
        }
    }
    if (!defined('API_VERSION')) {
        throw new \barebones\CHttpException(500, 'No API_VERSION specified');
    }

    // use barebones php for API requests for performance
    $requestParts = explode("/", $_SERVER['REQUEST_URI']);
    $controller = $requestParts[2];

    var_dump(__LINE__, $controller);die();

    $actionRoot = $appRoot . "/barebones/{$apiVersion}/item";
    $ctrlName = "Barebones{$apiVersion}ItemController";

    require_once("{$actionRoot}/{$ctrlName}.php");
    $bareCtrl = new $ctrlName($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    if (!$bareCtrl->requestIsHandled()) {
        throw new \barebones\CHttpException(400, 'Route not handled');
    }

    $bareCtrl->run();

} catch (PDOException $e) {
    $app->displayException($e);
    throw $e;
} catch (\Propel\Runtime\Connection\Exception\ConnectionException $e) {
    $app->displayException($e);
    throw $e;
} catch (Exception $e) {
    $app->displayException($e);
    throw $e;
}
