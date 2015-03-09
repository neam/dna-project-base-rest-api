<?php
/* @var string $approot */
/* @var string $root */

use barebones\Barebones;
use barebones\CHttpException;

/* @var string $actionroot */
class BarebonesV1ItemController
{

    use RestApiControllerTrait;

    protected $request_method;
    protected $request_uri;
    protected $handled = false;

    public function __construct($request_method, $request_uri)
    {
        $this->request_method = $request_method;
        $this->request_uri = $request_uri;
    }

    public function requestIsHandled()
    {
        if (strpos($this->request_uri, "/api/v1/item/") !== 0) {
            return false;
        }
        if (strpos($this->request_uri, "/test/composition") !== false) {
            return false;
        }
        if (strpos($this->request_uri, "/test/page") !== false) {
            return false;
        }
        if ($this->request_method == "OPTIONS") {
            return true;
        }
        if ($this->request_method == "GET") {
            return $this->requestIsForItemByRoute();
        }
        return false;
    }

    protected function requestIsForItemByRoute()
    {
        $idOrRoute = $this->requestedItemRoute();
        if (ctype_digit($idOrRoute)) {
            return false;
        }
        return true;
    }

    public function run()
    {
        if ($this->request_method == "OPTIONS") {
            return $this->actionPreflight();
        }
        if ($this->request_method == "GET") {
            $urlEncodedRoute = $this->requestedItemRoute();
            $route = urldecode($urlEncodedRoute);
            try {
                $this->actionGetByRoute($route);
            } catch (CHttpException $e) {
                $this->sendResponseHeaders(404);
                echo json_encode([
                    "status" => 404,
                    "message" => "Not Found",
                    "trace" => $e->getMessage(),
                ]);
                die();
            } catch (Exception $e) {
                $this->sendResponseHeaders(500);
                echo json_encode([
                    "status" => 500,
                    "message" => "Internal Server Error",
                    "trace" => (DEV ? $e->getMessage() : ""),
                ]);
                die();
            }
        }
        throw new Exception("Unhandled request");
    }

    protected function requestedItemRoute()
    {
        $path = parse_url("http://example.com" . $this->request_uri, PHP_URL_PATH);
        $idOrRoute = str_replace("/api/v1/item/", "", rtrim($path, "/"));
        return $idOrRoute;
    }

    public function sendResponseHeaders($status = 200, $bodyParams = array(), $options = array())
    {

        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);

        // cors headers
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept");

        // language
        $contentLanguage = Yii::app()->language;
        header("Content-Language: $contentLanguage");

        // content type headers
        $contentType = 'application/json';
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-type: $contentType");

    }

    /**
     * Returns the requested item resource.
     * Responds to path 'api/<version>/item/{route}'.
     * This endpoint is public but the resources are restricted by "RestrictedAccessBehavior".
     *
     * @param string $route the route of the item to get, e.g."/1234", "/terms".
     */
    public function actionGetByRoute($route)
    {

        if (ctype_digit($route)) {
            throw new CHttpException(404, sprintf('Invalid route %s - routes must start with "/".', $route));
        }

        $command = Barebones::fpdo()
            ->from('route')
            ->select('item.id, item.model_class, route.translation_route_language')
            ->leftJoin('item ON item.node_id=route.node_id')
            ->where('route.route = :route', array(':route' => $route));

        $row = $command->fetch();

        $modelId = (int) $row['id'];
        $modelClass = (string) $row['model_class'];
        $table = strtolower($modelClass);
        // Set the application language to the route language.
        // This way we know which language the item and it's relations should be returned in.
        if (!empty($row['translation_route_language']) && Yii::app()->language !== $row['translation_route_language']) {
            Yii::app()->language = $row['translation_route_language'];
        }

        if (empty($modelId) || empty($modelClass)) {
            throw new CHttpException(404, sprintf('Could not find node by route %s.', $route));
        }
        if (!isset(self::$classMap[$modelClass])) {
            throw new CHttpException(404, sprintf('Could not find resource for %s.', $modelClass));
        }
        unset($row);

        $resourceModelClass = self::$classMap[$modelClass];

        $model = $resourceModelClass::model()->findByPk($modelId);

        //var_dump($model->flowSteps(), $model->getAllAttributes());

        $response = $model->getAllAttributes();

        //echo $responseTemplate;
        $encoded = json_encode($response);
        if (!$encoded) {
            throw new Exception("JSON encoding error: " . json_last_error_msg());
        }

        $this->sendResponseHeaders(200);
        echo $encoded;

        // end request
        die();

    }

}