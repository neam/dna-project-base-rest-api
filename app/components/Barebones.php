<?php
/**
 * Helper classes to perform certain operations in barebones php withour requiring Yii
 */

namespace barebones;

use FluentPDO;
use Exception;
use ItemTypes;

/**
 * Helper class to perform some operations with barebones php
 *
 * Class Barebones
 */
class Barebones
{
    static public $app;
    static public $requestHandler;

    static public function init(App $app, RequestHandler $requestHandler)
    {
        static::$app = $app;
        static::$requestHandler = $requestHandler;
    }

    /**
     * Currently simply returns the original string
     *
     * @param $category
     * @param $message
     * @param array $params
     * @param null $source
     * @param null $language
     * @return mixed
     */
    public static function t($category, $message, $params = array(), $source = null, $language = null)
    {
        return $message;
    }

    const PUBLIC_GROUP_ID = 1;
    const PUBLIC_VISIBILITY = 'visible';

    public static function restrictQueryToPublishedItems(&$query)
    {

        if (!in_array($query->getFromTable(), ItemTypes::where('is_access_restricted'))) {
            return;
        }

        $query->leftJoin(
            '`node_has_group` AS `nhg_public` ON (' . $query->getFromAlias() . '.`node_id` = `nhg_public`.`node_id`' .
            ' AND `nhg_public`.`group_id` = ' . intval(static::PUBLIC_GROUP_ID) .
            ' AND `nhg_public`.`visibility` = \'' . static::PUBLIC_VISIBILITY . '\')'
        )->where('nhg_public.id IS NOT NULL');

    }

}

class SentryErrorHandling
{

    static public $client;

    public static function activate($sentryDsn)
    {

        // Init sentry
        static::$client = new \Raven_Client($sentryDsn);

        /*
        // Capture a message
        $event_id = $client->getIdent($client->captureMessage('my log message'));
        if ($client->getLastError() !== null) {
            printf('There was an error sending the event to Sentry: %s', $client->getLastError());
        }

        // Capture an exception
        $event_id = $client->getIdent($client->captureException($ex));

        // Provide some additional data with an exception
        $event_id = $client->getIdent($client->captureException($ex, array(
            'extra' => array(
                'php_version' => phpversion()
            ),
        )));

        // Give the user feedback
        echo "Sorry, there was an error!";
        echo "Your reference ID is " . $event_id;
        */

        // Install error handlers and shutdown function to catch fatal errors
        $error_handler = new \Raven_ErrorHandler(static::$client);
        $error_handler->registerExceptionHandler();
        $error_handler->registerErrorHandler();
        $error_handler->registerShutdownFunction();

    }

    public static function captureException(\Exception $e)
    {
        $event_id = static::$client->getIdent(static::$client->captureException($e));
        if (static::$client->getLastError() !== null) {
            error_log(sprintf('There was an error sending the event to Sentry: %s', static::$client->getLastError()));
        }
    }

}

class Db
{
    public $command;

    public function createCommand()
    {
        if (empty($this->command)) {
            $this->command = new FluentPDO(Barebones::pdo());
        }
        return $this->command;
    }

}

class App
{

    public $language = "en";

    public $db;

    public $user;

    public $request;

    public function __construct()
    {
        $baseUrl = ($_SERVER['HTTPS'] === 'off' ? 'http' : 'https')
            . "://"
            . $_SERVER['HTTP_HOST'];

        $this->request = (object) [
            "requestUri" => $_SERVER['REQUEST_URI'],
            "baseUrl" => $baseUrl,
        ];
    }

    public function getUser()
    {
        if (empty($this->user)) {
            $this->user = new \WebUser();
        }
        return $this->user;
    }

}

class RequestHandler
{
    use \SendCorsHeadersMethodTrait;
    use \RestApiControllerTrait;

    public function displayException(Exception $e)
    {
        $statusCode = ($e instanceof HttpException) ? $e->statusCode : 500;
        $response = [];
        $response["status"] = $statusCode;
        if (YII_DEBUG) {
            $className = get_class($e);
            $response["debug"] = [];
            $response["debug"]["message"] = "{$className}({$e->getCode()}): {$e->getMessage()} ({$e->getFile()}:{$e->getLine()})";
            $response["debug"]["trace"] = $e->getTrace();
        }
        $this->sendResponse($statusCode, $response);
    }

}

class HttpException extends Exception
{
    /**
     * @var integer HTTP status code, such as 403, 404, 500, etc.
     */
    public $statusCode;

    /**
     * Constructor.
     * @param integer $status HTTP status code, such as 404, 500, etc.
     * @param string $message error message
     * @param integer $code error code
     */
    public function __construct($status, $message = null, $code = 0)
    {
        $this->statusCode = $status;
        if (is_null($message)) {
            $message = "HTTP Exception - status code: $status";
        }
        parent::__construct($message, $code);
    }
}
