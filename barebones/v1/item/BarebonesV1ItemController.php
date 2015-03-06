<?php
/* @var string $approot */
/* @var string $root */

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
        if ($this->request_method == "OPTIONS") {
            return true;
        }
        if ($this->request_method == "GET") {
            return $this->requestIsForPublicItemByRoute();
        }
        return false;
    }

    protected function requestIsForPublicItemByRoute()
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
            return $this->actionGet();
        }
        throw new Exception("Unhandled request");
    }

    protected function requestedItemRoute()
    {
        $path = parse_url("http://example.com" . $this->request_uri, PHP_URL_PATH);
        $idOrRoute = str_replace("/api/v1/item/", "", rtrim($path, "/"));
        return $idOrRoute;
    }

    public function actionGet()
    {
        echo "TODO";
    }

}