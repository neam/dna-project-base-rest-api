<?php

use \UserApp\Widget\User;

class WebUser extends \OAuth2Yii\Component\WebUser
{

    use RestrictedAccessWebUserTrait;

    public $userAppId = null;

    /**
     * @return null
     */
    public function getUserAppId()
    {
        return $this->userAppId;
    }

    /**
     * @param null $userAppId
     */
    public function setUserAppId($userAppId)
    {
        $this->userAppId = $userAppId;
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
            /*
            $this->authUserapp();
            $this->setId($this->getAccount()->id);
            */
        }
        parent::init();
    }

    public function authUserapp()
    {

        User::setAppId(USERAPP_ID);

        $valid_token = false;
        //var_dump(__LINE__, "ua", User::authenticated(), "sid", session_id(), $_GET, $_COOKIE, $_SESSION, Yii::app()->session['foo'], file_get_contents('php://input'));

        // Allow passing token in request payload (workaround for different domains between client and rest api)
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body);
        if (isset($data->token)) {
            setcookie("ua_session_token", $data->token);
            $_COOKIE["ua_session_token"] = $data->token;
        }

        // Allow passing token in Authorization header
        $headers = getallheaders();
        $authHeaderToken = str_replace("UserappToken ", "", $headers["Authorization"]);
        if (!empty($authHeaderToken)) {
            setcookie("ua_session_token", $authHeaderToken);
            $_COOKIE["ua_session_token"] = $authHeaderToken;
        }

        // For debugging
        if (isset($_GET['ua_session_token'])) {
            setcookie("ua_session_token", $_GET['ua_session_token']);
            $_COOKIE["ua_session_token"] = $_GET['ua_session_token'];
        }

        if (!User::authenticated()) {

            // Get token information
            $token = null;
            switch (true) {
                case isset($_COOKIE["ua_session_token"]):
                    $token = $_COOKIE["ua_session_token"];
                    break;
                default:
                    break;
            }

            if ($token) {
                try {
                    if ($valid_token = User::loginWithToken($token)) {

                        // Authorized
                        /** @var UserApp\Widget\User $userappUser */
                        $userappUser = User::current();
                        $this->setUserAppId($userappUser->user_id);

                    } else {
                        throw new CException("Userapp's User::loginWithToken() returned false");
                    }
                } catch (\UserApp\Exceptions\ServiceException $exception) {
                    throw $exception;
                    //var_dump($exception);
                    $valid_token = false;
                }
            } else {
                // Anonymous request without authentication information
            }
        } else {
            // Authorized since before

            // Double-check that authorized and token match
            // TODO

            // Make sure to set the user as authenticated in Yii
            /** @var UserApp\Widget\User $userappUser */
            $userappUser = User::current();
            $this->setUserAppId($userappUser->user_id);
        }

        if (!$valid_token) {
            // Not authorized
        } else {
        }

    }

    public function getAccount()
    {
        if (empty($this->userAppId)) {
            throw new CHttpException(
                403,
                "Current user userapp id must be available before matching account information can be fetched"
            );
        }
        $accountModel = Account::model();
        // Support querying with and without restricted access behavior attached
        if (method_exists($accountModel, 'unrestricted')) {
            $accountModel = $accountModel->unrestricted();
        }
        $model = $accountModel->findByAttributes(["userapp_user_id" => $this->getUserAppId()]);
        if ($model === null) {
            throw new CHttpException(403, "No such user matching our records");
        }
        return $model;
    }

}
