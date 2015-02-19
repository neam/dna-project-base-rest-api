<?php
$scenario->group('data:test-db,coverage:basic');
$I = new ApiGuy($scenario);

$I->wantTo('retrieve custom page translations via the REST API as defined in api blueprint');
$I->sendGET('item/translation/666/test/page');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    // todo: data
));

$I->wantTo('save custom page translations via the REST API as defined in api blueprint');
$accessToken = $I->login('admin', 'admin');
$I->amBearerAuthenticated($accessToken);
$I->sendPOST('item/translation/666/test/page', array(
    // todo: data
));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    // todo: data
));
