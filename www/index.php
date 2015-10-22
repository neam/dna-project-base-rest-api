<?php

namespace barebones;

$appRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$root = dirname(
        __FILE__
    ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app';

// include composer autoloaders
require_once("$appRoot/vendor/autoload.php");
require_once("$appRoot/../rest-api-dna/vendor/autoload.php");
require_once("$root/vendor/autoload.php");
require_once("$root/dna/vendor/autoload.php");

// root-level bootstrap logic, including propel orm init
require("$root/bootstrap.php");

try {

    // include barebones helper class
    require_once($appRoot . '/app/components/Barebones.php');

    // the most barebones response class possible
    Barebones::init(new App(), new RequestHandler());
    $requestHandler = Barebones::$requestHandler;

    // handle OPTIONS requests in the most barebones manner possible
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        $requestHandler->sendCorsHeaders();
        exit();
    }

    // activate error handling via sentry - note: this runs ini_set('display_errors', false)
    SentryErrorHandling::activate(SENTRY_DSN);

    // detect api version
    foreach (array('v0', 'v1', 'v2') as $apiVersion) {
        if (strpos($_SERVER['REQUEST_URI'], "/api/{$apiVersion}/") === 0) {
            define('API_VERSION', $apiVersion);
            break;
        }
    }
    if (!defined('API_VERSION')) {
        throw new HttpException(500, 'No API_VERSION specified');
    }

    // use barebones php for API requests for performance
    $requestParts = explode("/", $_SERVER['REQUEST_URI']);
    $controllerClass = ucfirst($requestParts[3]) . "Controller";

    if (empty($requestParts[3]) || !class_exists($controllerClass)) {
        throw new HttpException(400, 'Route not handled');
    }

    $controller = new $controllerClass();
    $actionMethod = "action" . ucfirst($requestParts[4]);

    if (empty($requestParts[4]) || !method_exists($controller, $actionMethod)) {
        throw new HttpException(400, 'Route not handled');
    }

    $controller->$actionMethod();

} catch (\PDOException $e) {
    $requestHandler->displayException($e);
    throw $e;
} catch (\Propel\Runtime\Connection\Exception\ConnectionException $e) {
    $requestHandler->displayException($e);
    throw $e;
} catch (\Exception $e) {
    $requestHandler->displayException($e);
    throw $e;
}
