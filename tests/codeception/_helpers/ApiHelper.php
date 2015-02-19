<?php
namespace Codeception\Module;

// here you can define custom functions for ApiGuy 

class ApiHelper extends \Codeception\Module
{
    const OAUTH_GRANT_TYPE_PASSWORD = 'password';
    const OAUTH_CLIENT_ID = 'TestClient';

    /**
     * User login.
     *
     * @param string $username the username.
     * @param string $password the password.
     * @return string the OAuth access token received upon successful login.
     */
    public function login($username, $password)
    {
        $this->sendPOST('user/login', array(
            'grant_type' => self::OAUTH_GRANT_TYPE_PASSWORD,
            'client_id' => self::OAUTH_CLIENT_ID,
            'username' => $username,
            'password' => $password
        ));
        $this->seeResponseCodeIs(200);
        $this->seeResponseIsJson();
        // We cannot check the access_token here, as we don't know it when testing against real db.
        $this->seeResponseContainsJson(array('token_type' => 'bearer', 'expires_in' => 3600, 'scope' => null));
        // But we can grab it, which will fail if is not present, and return it.
        return $this->grabDataFromJsonResponse('access_token');
    }
}
