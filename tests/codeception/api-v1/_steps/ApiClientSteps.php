<?php
namespace ApiGuy;

class ApiClientSteps extends \ApiGuy
{
    const ADMIN_USER_USERNAME = 'admin';
    const ADMIN_USER_PASSWORD = 'admin';
    const TEST_USER_USERNAME = 'testuser';
    const TEST_USER_PASSWORD = 'demo1234Q';

    public function authenticateAsAdmin()
    {
        $I = $this;
        $accessToken = $I->authenticate(static::ADMIN_USER_USERNAME, static::ADMIN_USER_PASSWORD);
        return $accessToken;
    }

    public function authenticateAsTestUser()
    {
        $I = $this;
        $accessToken = $I->authenticate(static::TEST_USER_USERNAME, static::TEST_USER_PASSWORD);
        return $accessToken;
    }

    public function authenticate($username, $password)
    {
        $I = $this;

        $I->wantTo('login user via the REST API as defined in api blueprint');
        $I->sendPOST('user/login', array(
            'grant_type' => 'password',
            'client_id' => 'TestClient',
            'username' => $username,
            'password' => $password
        ));
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        // We cannot check the access_token here, as we don't know it when testing against real db.
        $I->seeResponseContainsJson(array('token_type' => 'bearer', 'expires_in' => 3600, 'scope' => null));
        // Bu we can grab it, which will fail if is not present, and use it in the next request.
        $accessToken = $I->grabDataFromJsonResponse('access_token');

        return $accessToken;
    }
}