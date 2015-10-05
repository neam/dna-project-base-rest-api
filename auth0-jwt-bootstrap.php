<?php

use \Firebase\JWT\JWT;

$token = null;

// Allow local offline mode with fake token
if (LOCAL_OFFLINE_DEV) {
    $fake_decoded_token = new stdClass();
    $fake_decoded_token->aud = 'auth0-fake-client-id-local-offline-dev';
    define('AUTH0_VALID_DECODED_TOKEN_SERIALIZED', serialize($fake_decoded_token));
}

// Allow passing token in Authorization header
$headers = getallheaders();
if (isset($headers["Authorization"])) {
    $authHeaderToken = str_replace("Bearer ", "", $headers["Authorization"]);
    if (!empty($authHeaderToken)) {
        $token = $authHeaderToken;
    }
}

if ($token == null) {
    // Anonymous request without authentication information
    header('HTTP/1.0 401 Unauthorized');
    echo "No authorization header sent";
    exit();
}

define('AUTH0_REQUEST_TOKEN', $token);

// Support multiple auth0 clients
if (!defined("AUTH0_CLIENT_SECRET")) {
    $auth0_client_secrets = explode(",", AUTH0_CLIENT_SECRETS);
} else {
    $auth0_client_secrets = [AUTH0_CLIENT_SECRET];
}
if (!defined("AUTH0_CLIENT_ID")) {
    $auth0_client_ids = explode(",", AUTH0_CLIENT_IDS);
} else {
    $auth0_client_ids = [AUTH0_CLIENT_SECRET];
}
// Default to a default app name if no multiple apps are set
if (!defined("AUTH0_APPS")) {
    define("AUTH0_APPS", "default");
}
$auth0_apps = explode(",", AUTH0_APPS);

$valid_decoded_token = null;
try {

    foreach ($auth0_client_secrets as $k => $auth0_client_secret) {

        // Validate the token
        $secret = $auth0_client_secret;
        $id = $auth0_client_ids[$k];
        $app = $auth0_apps[$k];

        $decoded_token = null;
        try {
            $decoded_token = JWT::decode($token, base64_decode(strtr($secret, '-_', '+/')), ["HS256"]);
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            continue;
        } catch (UnexpectedValueException $ex) {
            throw $ex;
        }

        // Validate that this token was made for us
        if ($decoded_token->aud === $id) {
            // We have a valid token!
            $valid_decoded_token = $decoded_token;
            define('AUTH0_VALID_DECODED_TOKEN_SERIALIZED', serialize($valid_decoded_token));
            define("AUTH0_CLIENT_ID", $valid_decoded_token->aud);
            define("AUTH0_APP", $app);
            break;
        }

    }

} catch (Exception $e) {
    //throw $e;
    header('HTTP/1.0 401 Unauthorized');
    echo "Invalid token [e]";
    exit();
}

if (empty($valid_decoded_token)) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Invalid token [nv]";
    exit();
}

// We have a valid token!
