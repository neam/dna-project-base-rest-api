<?php

trait RestApiControllerTrait
{

    public $codes = Array(
        200 => array('OK' => 'OK'),
        204 => array('No Content' => 'No Content'),
        400 => array('Bad Request' => 'Bad Request'),
        401 => array('Unauthorized' => 'You must be authorized to view this page.'),
        402 => array('Payment Required' => 'Payment Required'),
        403 => array('Forbidden' => 'Forbidden'),
        404 => array('Not Found' => 'The requested URL was not found.'),
        500 => array('Internal Server Error' => 'The server encountered an error processing your request.'),
        501 => array('Not Implemented' => 'The requested method is not implemented.'),
    );

    public function sendStatusHeader($status = 200)
    {
        $errorCodeKey = array_keys($this->codes[$status]);
        $statusText = array_shift($errorCodeKey);
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $statusText;
        header($status_header);
    }

    public function sendContentTypeHeaders($contentType = 'application/json')
    {
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-type: $contentType");
    }

    public function sendResponseHeaders($status = 200)
    {

        // status
        $this->sendStatusHeader($status);

        // cors
        if ($status !== 200) {
            // Currently nginx sets these headers for us when status is 200
            \barebones\Barebones::$requestHandler->sendCorsHeaders();
        }

        // content type headers
        $this->sendContentTypeHeaders('application/json');

    }

    public function sendResponse($status = 200, $body)
    {
        $this->sendResponseHeaders($status);
        echo json_encode($body);
    }

}