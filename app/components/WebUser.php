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
            $message = null;
            try {
                $this->authenticateUserapp();
                $this->authorizeUserappUserLocally();
            } catch (UserAppIdNotSetException $e) {
                $message = "Current user userapp id must be available before matching account information can be fetched";
            } catch (NoAccountMathchingUserAppIdException $e) {
                $message = "No such user matching our records [and no new matching account was set to automatically be created]";
            } catch (Exception $e) {
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

    /**
     * Authenticates a userapp user by userapp token
     * Sets $this->userAppId if a valid userapp session is encountered
     *
     * @throws CException
     * @throws Exception
     * @throws \UserApp\Exceptions\ServiceException
     */
    protected function authenticateUserapp()
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
        if (isset($headers["Authorization"])) {
            $authHeaderToken = str_replace("UserappToken ", "", $headers["Authorization"]);
            if (!empty($authHeaderToken)) {
                setcookie("ua_session_token", $authHeaderToken);
                $_COOKIE["ua_session_token"] = $authHeaderToken;
            }
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

    /**
     * Authorizes a userapp user (or the lack of one) in the context
     * of the Yii application.
     * Sets $this->id if a valid yii user account is found authorized to be logged in.
     *
     * @throws CHttpException
     */
    protected function authorizeUserappUserLocally()
    {

        $userappUser = User::current();
        $account = $this->getAccount();

        // Make sure local permissions reflect remote permissions
        if ($userappUser->hasPermission("admin_in_data_profile__" . DATA)) {
            $account->superuser = 1;
        }
        //PermissionHelper::addAccountToGroup($this->id, Group::FOO, Role::GROUP_MEMBER);

        // Update current heartbeat
        $account->userapp_last_heartbeat_at = User::getSession()->get('ua_last_heartbeat_at');

        // Save synchronized account info
        if (!$account->save()) {
            throw new SaveException($account);
        }

        // Actually login
        $this->setId($account->id);

    }

    protected function getAccount()
    {
        if (empty($this->userAppId)) {
            throw new UserAppIdNotSetException();
        }
        $accountModel = Account::model();
        //$accountModel = $accountModel->unrestricted();
        $account = $accountModel->findByAttributes(["userapp_user_id" => $this->getUserAppId()]);
        if ($account === null) {

            // Check if we are to automatically create new account
            $userappUser = User::current();
            if ($userappUser->hasPermission("account_in_data_profile__" . DATA)) {
                $account = new Account();
                $account->userapp_user_id = $userappUser->user_id;
                $account->username = "ua_" . uniqid();
                $account->email = $userappUser->email;
                //$account = $account->unrestricted();
                if (!$account->save()) {
                    throw new SaveException($account);
                }
            } else {
                throw new NoAccountMathchingUserAppIdException;
            }

        }
        //$account = $account->unrestricted();
        return $account;
    }

}

class UserAppIdNotSetException extends Exception
{

}

class NoAccountMathchingUserAppIdException extends Exception
{

}
