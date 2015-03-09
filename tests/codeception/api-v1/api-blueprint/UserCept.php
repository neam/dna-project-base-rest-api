<?php
$scenario->group('data:test-db,coverage:basic');
$I = new \ApiGuy\ApiClientSteps($scenario);

$accessToken = $I->authenticateAsAdmin();

$I->wantTo('check if user is logged in via the REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendPOST('user/authenticate');
// If response code is 200, the token is valid and user is logged in, else we get a 401
$I->seeResponseCodeIs(200);
