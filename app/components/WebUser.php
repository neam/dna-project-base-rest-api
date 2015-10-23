<?php

use barebones\Barebones;
use barebones\HttpException;
use propel\models\Account;
use propel\models\AccountQuery;
use propel\models\Auth0User;
use propel\models\Auth0UserQuery;

class WebUser
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
     * @var string the id.
     */
    public $id = null;

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function __construct() {
        $this->init();
    }

    public function init()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        Barebones::$requestHandler->sendCorsHeaders();

        if ($_SERVER['REQUEST_METHOD'] != 'OPTIONS') {

            // Enable offline direct auth of dev auth0 user
            if (defined('LOCAL_OFFLINE_DATA') && !empty(LOCAL_OFFLINE_DATA)) {
                return $this->offlineLocalDevAuth();
            }

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
                throw new HttpException(
                    403,
                    $message
                );
            }
        }

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
        $account = AccountQuery::create()->findOneById(1);

        $this->setId($account->getId());

    }

    /**
     * Authenticates a auth0 user by jwt token
     * Sets $this->auth0UserId if a valid auth0 session is encountered
     */
    protected function authenticateAuth0()
    {
        $valid_decoded_token = unserialize(AUTH0_VALID_DECODED_TOKEN_SERIALIZED);
        $auth0UserId = $valid_decoded_token->sub;
        $token = AUTH0_REQUEST_TOKEN;

        // Authorized
        $this->setAuth0UserId($auth0UserId);
        $this->setJwtPayload($valid_decoded_token);
        $this->setJwtToken($token);

    }

    /**
     * Authorizes a auth0 user (or the lack of one) in the context
     * of the Yii application.
     * Sets $this->id if a valid yii user account is found authorized to be logged in.
     *
     * @throws HttpException
     */
    protected function authorizeAuth0UserLocally()
    {

        $auth0User = $this->getAuth0User();
        $account = $this->getAccount();

        // Make sure local permissions reflect remote permissions
        $jwtPayload = $this->getJwtPayload();
        $dataProfile = DATA;
        if (isset($jwtPayload->app_metadata->r0->permissions->$dataProfile) && $jwtPayload->app_metadata->r0->permissions->$dataProfile->superuser == 1) {
            $account->superuser = 1;
        }
        //PermissionHelper::addAccountToGroup($this->id, Group::FOO, Role::GROUP_MEMBER);

        // Save authorization activity metadata
        $auth0User->setAuth0LastAuthenticationAt(gmdate("Y-m-d H:i:s"));
        $auth0User->setAuth0LastVerifiedToken($this->getJwtToken());
        $auth0User->setAuth0LastVerifiedTokenExpires($jwtPayload->exp);

        // Save synchronized account info
        if (!$auth0User->save()) {
            throw new SaveException($auth0User);
        }

        // Actually login
        $this->setId($account->getId());

    }

    protected function getAuth0User()
    {
        if (empty($this->auth0UserId)) {
            throw new Auth0UserIdNotSetException();
        }
        $jwtPayload = $this->getJwtPayload();
        if (empty($jwtPayload)) {
            throw new JwtPayloadNotAvailableException();
        }
        $auth0UserModel = Auth0User::model();
        $auth0User = $auth0UserModel->findByAttributes(
            ["auth0_app" => AUTH0_APP, "auth0_user_id" => $this->getAuth0UserId()]
        );
        if ($auth0User === null) {
            // Create new auth0 user entry
            $auth0User = new Auth0User();
            $auth0User->auth0_app = AUTH0_APP;
            $auth0User->auth0_user_id = $this->getAuth0UserId();
            if (!$auth0User->save()) {
                throw new SaveException($auth0User);
            }
        }
        return $auth0User;
    }

    protected function getAccount()
    {
        $auth0User = $this->getAuth0User();
        $jwtPayload = $this->getJwtPayload();
        if (empty($jwtPayload)) {
            throw new JwtPayloadNotAvailableException();
        }

        $transaction = Barebones::$app->db->beginTransaction();

        try {

            if (empty($auth0User->account)) {

                // Check if we are to automatically create new account (having a permissions object for the data profile means that an account is allowed)
                $dataProfile = DATA;
                if (isset($jwtPayload->app_metadata->r0->permissions->$dataProfile)) {
                    $account = $this->ensureActiveMatchingAccount($auth0User, $jwtPayload);
                } else {
                    throw new NoAccountMatchingAuth0UserIdException;
                }

            }

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
            throw $e;
        }

        return $auth0User->account;
    }

    /**
     * First match against linked accounts (TODO)
     * Then match against email (since it is a unique attribute in the local database)
     */
    protected function ensureActiveMatchingAccount(Auth0User &$auth0User, $jwtPayload)
    {
        // First match against linked accounts (TODO)
        // TODO find by attributes $auth0UserModel

        $accountModel = Account::model();
        $account = null;

        if (isset($jwtPayload->email)) {
            // We may already have an account with this email with another auth0 app, check this first
            $accountByEmail = $accountModel->findByAttributes(["email" => $jwtPayload->email]);
            if (!empty($accountByEmail)) {
                $account = $accountByEmail;
            }
        }

        if (empty($account)) {
            $account = new Account();
            $account->username = "auth0_" . uniqid();
        }

        $account->password = uniqid() . uniqid();
        $account->email = isset($jwtPayload->email) ? $jwtPayload->email : null;

        //$account = $account->unrestricted();
        if (!$account->save()) {
            throw new SaveException($account);
        }
        $auth0User->account_id = $account->id;
        $auth0User->account = $account;
        if (!$auth0User->save()) {
            throw new SaveException($auth0User);
        }

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
