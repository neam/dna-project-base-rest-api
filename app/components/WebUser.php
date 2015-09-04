<?php

use \Firebase\JWT\JWT;

class WebUser extends \OAuth2Yii\Component\WebUser
{

    use RestrictedAccessWebUserTrait;

    public $auth0UserId = null;

    /**
     * @return null
     */
    public function getAuth0UserId()
    {
        return $this->auth0UserId;
    }

    /**
     * @param null $auth0UserId
     */
    public function setAuth0UserId($auth0UserId)
    {
        $this->auth0UserId = $auth0UserId;
    }

    public $jwtToken = null;

    /**
     * @return null
     */
    public function getJwtToken()
    {
        return $this->jwtToken;
    }

    /**
     * @param null $token
     */
    public function setJwtToken($token)
    {
        $this->jwtToken = $token;
    }

    public $jwtPayload = null;

    /**
     * @return null
     */
    public function getJwtPayload()
    {
        return $this->jwtPayload;
    }

    /**
     * @param null $payload
     */
    public function setJwtPayload($payload)
    {
        $this->jwtPayload = $payload;
    }

    /**
     * @var string the user model ID attribute.
     */
    public $idAttribute = 'id';

    /**
     * @var string the user model name.
     */
    public $modelClass = 'Account';

    public function init()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        Yii::app()->sendCorsHeaders();

        if ($_SERVER['REQUEST_METHOD'] != 'OPTIONS') {

            // Uncomment to enable offline direct auth of dev auth0 user
            //return $this->offlineLocalDevAuth();

            $message = null;
            try {
                $this->authenticateAuth0();
                $this->authorizeAuth0UserLocally($this->getAuth0UserId());
            } catch (Auth0UserIdNotSetException $e) {
                $message = "Current user auth0 id must be available before matching account information can be fetched";
            } catch (NoAccountMatchingAuth0UserIdException $e) {
                $message = "No such user matching our records [and no new matching account was set to automatically be created] {$this->getAuth0UserId()}";
            } catch (Exception $e) {
                if (DEV) {
                    throw $e;
                }
                $message = "Exception: " . $e->getMessage();
            }
            if (!empty($message)) {
                if (!DEV) {
                    $message = "Unauthorized";
                }
                throw new CHttpException(
                    403,
                    $message
                );
            }
        }
        parent::init();
    }

    protected function offlineLocalDevAuth()
    {

        /*
        $this->setAuth0UserId("LXxiWjJBSxaMcROD5XPHaw");
        $account = Account::model()->findByAttributes(["auth0_user_id" => $this->getAuth0UserId()]);

        if ($account === null) {
            throw new CException("No local user matches the offline auth0 id");
        }
        */

        // Simply auto-login as admin user
        $account = Account::model()->findByPk(1);

        $this->setId($account->id);

        return parent::init();

    }

    /**
     * Authenticates a auth0 user by jwt token
     * Sets $this->auth0UserId if a valid auth0 session is encountered
     */
    protected function authenticateAuth0()
    {

        //var_dump(__LINE__, "sid", session_id(), $_GET, $_COOKIE, $_SESSION, Yii::app()->session['foo'], file_get_contents('php://input'));

        $token = null;

        // Allow passing token in request payload (workaround for different domains between client and rest api)
        /*
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body);
        if (isset($data->token)) {
            $token = $data->token;
        }
        */

        // Allow passing token in Authorization header
        $headers = getallheaders();
        if (isset($headers["Authorization"])) {
            $authHeaderToken = str_replace("Bearer ", "", $headers["Authorization"]);
            if (!empty($authHeaderToken)) {
                $token = $authHeaderToken;
            }
        }

        // For debugging
        /*
        if (isset($_GET['jwt_session_token'])) {
            $token = $_GET['jwt_session_token'];
        }
        */

        // For persistence
        /*
            setcookie("jwt_session_token", $token);
            $_COOKIE["jwt_session_token"] = $token;
        */

        if ($token == null) {
            // Anonymous request without authentication information
            header('HTTP/1.0 401 Unauthorized');
            echo "No authorization header sent";
            exit();
        }

        // Validate the token
        $secret = base64_decode(AUTH0_CLIENT_SECRET);
        $secret = AUTH0_CLIENT_SECRET;
        $decoded_token = null;
        try {
            $decoded_token = JWT::decode($token, base64_decode(strtr($secret, '-_', '+/')), ["HS256"]);

        } catch (UnexpectedValueException $ex) {
            throw $ex;
            header('HTTP/1.0 401 Unauthorized');
            echo "Invalid token";
            exit();
        }

        // Validate that this token was made for us
        if ($decoded_token->aud != AUTH0_CLIENT_ID) {
            header('HTTP/1.0 401 Unauthorized');
            echo "Invalid token";
            exit();
        }

        // We have a valid token! authenticated the associated user
        $auth0UserId = $decoded_token->sub;

        // Authorized
        $this->setAuth0UserId($auth0UserId);
        $this->setJwtPayload($decoded_token);
        $this->setJwtToken($token);

    }

    /**
     * Authorizes a auth0 user (or the lack of one) in the context
     * of the Yii application.
     * Sets $this->id if a valid yii user account is found authorized to be logged in.
     *
     * @throws CHttpException
     */
    protected function authorizeAuth0UserLocally($auth0UserId)
    {

        $account = $this->getAccount();

        // Make sure local permissions reflect remote permissions
        $jwtPayload = $this->getJwtPayload();
        $dataProfile = DATA;
        if (isset($jwtPayload->app_metadata->r0->permissions->$dataProfile) && $jwtPayload->app_metadata->r0->permissions->$dataProfile->superuser == 1) {
            $account->superuser = 1;
        }
        //PermissionHelper::addAccountToGroup($this->id, Group::FOO, Role::GROUP_MEMBER);

        // Save authorization activity metadata
        $account->auth0_last_authentication_at = gmdate("Y-m-d H:i:s");
        $account->auth0_last_verified_token = $this->getJwtToken();
        $account->auth0_last_verified_token_expires = $jwtPayload->exp;

        // Save synchronized account info
        if (!$account->save()) {
            throw new SaveException($account);
        }

        // Actually login
        $this->setId($account->id);

    }

    protected function getAccount()
    {
        if (empty($this->auth0UserId)) {
            throw new Auth0UserIdNotSetException();
        }
        $jwtPayload = $this->getJwtPayload();
        if (empty($jwtPayload)) {
            throw new JwtPayloadNotAvailableException();
        }
        $accountModel = Account::model();
        //$accountModel = $accountModel->unrestricted();
        $account = $accountModel->findByAttributes(["auth0_user_id" => $this->getAuth0UserId()]);
        if ($account === null) {

            // Check if we are to automatically create new account (having a permissions object for the data profile means that an account is allowed)
            $dataProfile = DATA;
            if (isset($jwtPayload->app_metadata->r0->permissions->$dataProfile)) {
                $account = new Account();
                $account->auth0_user_id = $this->auth0UserId;
                $account->username = "ua_" . uniqid();
                $account->email = isset($jwtPayload->email) ? $jwtPayload->email : null;
                //$account = $account->unrestricted();
                if (!$account->save()) {
                    throw new SaveException($account);
                }
            } else {
                throw new NoAccountMatchingAuth0UserIdException;
            }

        }
        //$account = $account->unrestricted();
        return $account;
    }

}

class Auth0UserIdNotSetException extends Exception
{

}

class JwtPayloadNotAvailableException extends Exception
{

}

class NoAccountMatchingAuth0UserIdException extends Exception
{

}
