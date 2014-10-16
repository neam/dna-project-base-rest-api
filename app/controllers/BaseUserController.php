<?php

/**
 * User resource controller.
 */
class BaseUserController extends AppRestController
{
    /**
     * @inheritdoc
     */
    public function accessRules()
    {
        return array(
            // Not logged in users can do the following actions.
            array(
                'allow',
                'actions' => array(
                    'preflight',
                    'login',
                    'authenticate',
                    'publicProfile',
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

    /**
     * Login action that uses oauth2 for authenticating the user.
     * Responds to path 'api/<version>/user/login'.
     *
     * @throws CException
     */
    public function actionLogin()
    {
        if (!Yii::app()->hasComponent('oauth2')) {
            throw new CException('Could not find OAuth2Yii/Server component oauth2');
        }

        /* @var \OAuth2Yii\Component\ServerComponent $oauth2 */
        $oauth2 = Yii::app()->getComponent('oauth2');
        $server = $oauth2->getServer();

        if (!$oauth2->getCanGrant()) {
            throw new CException('No grant types enabled');
        }

        if ($oauth2->enableAuthorization) {
            $authorizationStorage = $oauth2->getStorage(OAuth2Yii\Component\ServerComponent::STORAGE_AUTHORIZATION_CODE);
            $server->addGrantType(new OAuth2\GrantType\AuthorizationCode($authorizationStorage));
        }

        if ($oauth2->enableClientCredentials) {
            $clientStorage = $oauth2->getStorage(OAuth2Yii\Component\ServerComponent::STORAGE_CLIENT_CREDENTIALS);
            $server->addGrantType(new OAuth2\GrantType\ClientCredentials($clientStorage));
        }

        if ($oauth2->enableUserCredentials) {
            $userStorage = $oauth2->getStorage(OAuth2Yii\Component\ServerComponent::STORAGE_USER_CREDENTIALS);
            $server->addGrantType(new OAuth2\GrantType\UserCredentials($userStorage));
            $refreshStorage = $oauth2->getStorage(OAuth2Yii\Component\ServerComponent::STORAGE_REFRESH_TOKEN);
            $server->addGrantType(new OAuth2\GrantType\RefreshToken($refreshStorage));
        }

        $request = OAuth2\Request::createFromGlobals();
        $response = $server->handleTokenRequest($request);
        $response->setHttpHeader('Access-Control-Allow-Origin', '*');
        $response->setHttpHeader('Access-Control-Allow-Headers', 'Authorization, Origin, Content-Type, Accept');
        $response->send();
    }

    /**
     * Authenticates that the user is currently "logged in", i.e. a the Authorization header needs to be set and valid.
     * Responds to path 'api/<version>/user/authenticate'.
     */
    public function actionAuthenticate()
    {
        if (!Yii::app()->getUser()->getIsGuest()) {
            $this->sendResponse(200);
        } else {
            $this->sendResponse(401);
        }
    }

    /**
     * Returns the currently logged in users profile.
     * Responds to path 'api/<version>/user/profile'.
     */
    public function actionProfile()
    {
        $model = $this->loadProfile(Yii::app()->getUser()->id);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Returns the user public profile.
     * Responds to path 'api/<version>/user/<accountId>/profile'.
     *
     * @param int $accountId the account model id.
     */
    public function actionPublicProfile($accountId)
    {
        $model = $this->loadProfile($accountId);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Loads the profile model by given account id.
     * Access restrictions are applied.
     *
     * @see ActiveRecord::beforeRead
     * @param int $accountId the account model id.
     * @return RestApiProfile
     */
    protected function loadProfile($accountId)
    {
        $model = RestApiProfile::model()->with('account')->findByAttributes(array('account_id' => (int)$accountId));
        if ($model === null) {
            $this->sendResponse(404);
        }
        return $model;
    }
}
