<?php
trait SendCorsHeadersMethodTrait {

    static public function sendCorsHeaders()
    {

        // Currently nginx sets these headers for us
        return;

        if (!empty($_SERVER['HTTP_ORIGIN'])) {

            $allowed_origins = explode(",", CORS_ACL_ORIGIN_HOSTS);
            $http_origin = $_SERVER['HTTP_ORIGIN'];
            $response_allowed_origin = $allowed_origins[0];
            foreach ($allowed_origins as $allowed_origin) {
                if (strpos($http_origin, "://" . $allowed_origin) !== false) {
                    $response_allowed_origin = $http_origin;
                }
            }

            header("Access-Control-Allow-Origin: " . $response_allowed_origin);
            header("Access-Control-Allow-Credentials: true");

        }

        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept, X-Data-Profile");
    }

}