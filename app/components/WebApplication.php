<?php

/**
 * WebApplication class file.
 * @inheritDoc
 */
class WebApplication
{
    use SendCorsHeadersMethodTrait;

    public function displayException(Exception $e)
    {
        $response = [];
        $response["status"] = ($e instanceof CHttpException) ? $e->statusCode : 500;
        if (YII_DEBUG) {
            $className = get_class($e);
            $response["message"] = "{$className}({$e->getCode()}): {$e->getMessage()} ({$e->getFile()}:{$e->getLine()})";
            $response["trace"] = $e->getTrace();
        }
        echo json_encode($response);
    }

}
