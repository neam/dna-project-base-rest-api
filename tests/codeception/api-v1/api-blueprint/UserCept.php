<?php
$scenario->group('data:test-db,coverage:basic');
$I = new ApiGuy($scenario);

$I->wantTo('login user via the REST API as defined in api blueprint');
$I->sendPOST('user/login', array(
    'grant_type' => 'password',
    'client_id' => 'TestClient',
    'username' => 'admin',
    'password' => 'admin'
));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
// We cannot check the access_token here, as we don't know it when testing against real db.
$I->seeResponseContainsJson(array('token_type' => 'bearer', 'expires_in' => 3600, 'scope' => null));
// Bu we can grab it, which will fail if is not present, and use it in the next request.
$accessToken = $I->grabDataFromJsonResponse('access_token');

$I->wantTo('check if user is logged in via the REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendPOST('user/authenticate');
// If response code is 200, the token is valid and user is logged in, else we get a 401
$I->seeResponseCodeIs(200);
