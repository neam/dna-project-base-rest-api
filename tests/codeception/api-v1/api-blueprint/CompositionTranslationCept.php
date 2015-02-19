<?php
$scenario->group('data:test-db,coverage:basic');
$I = new ApiGuy($scenario);

$I->wantTo('retrieve go item translations via the REST API as defined in api blueprint');
$I->sendGET('item/translation/666/test/composition');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    // todo: data
));

$I->wantTo('save go item translations via the REST API as defined in api blueprint');
$accessToken = $I->login('admin', 'admin');
$I->amBearerAuthenticated($accessToken);
$I->sendPOST('item/translation/666/test/composition', array(
    // todo: data
));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    // todo: data
));
