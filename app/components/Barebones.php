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

    public static function activate($sentryDsn)
    {

        // Init sentry
        $sentryClient = new \Raven_Client($sentryDsn);
        $errorHandler = new \Raven_ErrorHandler($sentryClient);

        // Register error handler callbacks
        set_error_handler(array($errorHandler, 'handleError'));
        set_exception_handler(array($errorHandler, 'handleException'));

        // Handle fatal errors
        if (false) {
            register_shutdown_function(
                function () {
                    $error = error_get_last();
                    if ($error !== null) {

                        // The information that we show to the end-user
                        $publicInfo = array(
                            'code' => 500,
                        );

                        // Set the error as public when in debug mode
                        if (YII_DEBUG) {
                            $publicInfo["error"] = $error;
                        }

                        // Error has already been reported by sentry - redirect to error-page instead of letting the user stare
                        // at a white screen of death
                        $errorQs = http_build_query($publicInfo);

                        $isFatal = ($error["type"] == E_ERROR);

                        // todo: fix hard-coded path
                        if (strpos(Yii::app()->request->requestUri, "api/v1/error") === false) {

                            $url = Yii::app()->request->baseUrl . "/api/v1/error?$errorQs";
                            if (!headers_sent($filename, $linenum)) {
                                header("Location: $url");
                                exit;
                            } else {
                                throw new Exception(
                                    "Shutdown handler error redirect to $url failed since headers were sent in $filename on line $linenum. Error: " . print_r(
                                        $error,
                                        true
                                    )
                                );
                                exit;
                            }

                        } else {
                            // Error when loading site/error - we can't do much but throw an exception about the error
                            throw new Exception("Error when loading site/error: " . print_r($error, true));
                        }
                    }
                }
            );
        }
        // Necessary in order for locations to work
        ini_set('display_errors', false);

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
        $response = [];
        $response["status"] = ($e instanceof HttpException) ? $e->statusCode : 500;
        if (YII_DEBUG) {
            $className = get_class($e);
            $response["message"] = "{$className}({$e->getCode()}): {$e->getMessage()} ({$e->getFile()}:{$e->getLine()})";
            $response["trace"] = $e->getTrace();
        }
        $this->sendResponse(500, $response);
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
        parent::__construct($message, $code);
    }
}
