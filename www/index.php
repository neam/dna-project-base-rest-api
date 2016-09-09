<?php

namespace barebones;

use ErrorException;
use SentryErrorHandling;

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

// Use set_error_handler() to change error messages into ErrorException
function exception_error_handler($severity, $message, $file, $line)
{
    if (!(error_reporting() & $severity)) {
        // This error code is not included in error_reporting
        return;
    }
    throw new ErrorException($message, 0, $severity, $file, $line);
}

set_error_handler("\\barebones\\exception_error_handler");

// activate error handling via sentry
$sentry = defined('SENTRY_DSN') && !empty(SENTRY_DSN);
if ($sentry) {
    SentryErrorHandling::activate(SENTRY_DSN);
}

try {

    // include barebones helper class
    require_once($appRoot . '/app/components/Barebones.php');

    // the most barebones response class possible
    Barebones::init(new App(), new RequestHandler());
    /** @var RequestHandler $requestHandler */
    $requestHandler = Barebones::$requestHandler;

    // handle OPTIONS requests in the most barebones manner possible
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        $requestHandler->sendCorsHeaders();
        exit();
    }

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

    // use barebones php request processing for performance
    $request = parse_url($_SERVER['REQUEST_URI']);
    $requestParts = explode("/", $request["path"]);

    // controller
    $controllerClass = ucfirst($requestParts[3]) . "Controller";
    if (empty($requestParts[3]) || !class_exists($controllerClass)) {
        throw new HttpException(400, 'Route not handled');
    }

    /** @var \AppRestController $controller */
    $controller = new $controllerClass();

    // id param
    $id = null;

    // action method
    $actionMethod = null;

    // controller/:action *
    if (!empty($requestParts[4]) && !ctype_digit($requestParts[4])) {
        $actionMethod = "action" . ucfirst($requestParts[4]);
    } else {

        if (empty($requestParts[4])) {

            if ($controller->request->getIsPostRequest()) {
                // controller PUT
                $actionMethod = "actionCreate";
            } else {
                // controller *
                $actionMethod = "actionList";
            }

        } else {

            // controller/<id> *
            $id = $requestParts[4];

            if ($controller->request->getIsPutRequest()) {
                // controller/<id> PUT
                $actionMethod = "actionUpdate";
            } elseif ($controller->request->getIsDeleteRequest()) {
                // controller/<id> DELETE
                $actionMethod = "actionDelete";
            } else {
                // controller/<id> *
                $actionMethod = "actionGet";
            }

        }

    }

    if (!method_exists($controller, $actionMethod)) {
        throw new HttpException(400, 'Route not handled');
    }

    // set id param
    $controller->request->setParam('id', $id);

    // execute action
    $controller->$actionMethod();

    /*
    } catch (\PDOException $e) {
        $requestHandler->displayException($e);
        throw $e;
    } catch (\Propel\Runtime\Connection\Exception\ConnectionException $e) {
        $requestHandler->displayException($e);
        throw $e;
    } catch (PropelException $e) {
        $requestHandler->displayException($e);
        throw $e;
    } catch (HttpException $e) {
        $requestHandler->displayException($e);
        throw $e;
    */
} catch (\Exception $e) {
    // Ensures that the exception is logged to error log
    SentryErrorHandling::logException($e);
    if ($sentry) {
        // Ensures that the exception is sent to sentry
        SentryErrorHandling::captureException($e);
    }
    // Ensures a proper response is returned to the client
    $requestHandler->displayException($e);
} catch (\Error $e) {
    // Ensures that the exception is logged to error log
    SentryErrorHandling::logException($e);
    if ($sentry) {
        // Ensures that the exception is sent to sentry
        SentryErrorHandling::captureException($e);
    }
    // Ensures a proper response is returned to the client
    $requestHandler->displayException($e);
}

