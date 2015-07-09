<?php

/**
 * WebApplication class file.
 * @inheritDoc
 */
class WebApplication extends CWebApplication
{
    use YiiDnaRestApplicationTrait;

    public function sendCorsHeaders()
    {
        header("Access-Control-Allow-Origin: http://" . CORS_ACL_ORIGIN_HOST);
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept");
    }

}
