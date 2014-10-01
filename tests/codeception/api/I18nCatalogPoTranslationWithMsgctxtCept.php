<?php
// TODO: Reactivate this test after having made available the data created during the automated frontend testing
$scenario->group('data:clean-db,coverage:integration');
$I = new ApiGuy($scenario);
$I->wantTo('check .po file translations containing msgctxt for i18nCatalog items retrieved via the REST API');

$I->sendGET('i18nCatalog/poJson', array('id' => 1, 'lang' => 'pt_br'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"metal\u0004Chain":[null,"Corrente"]');
$I->seeResponseContains('"restaurant\u0004Chain":[null,"Cadeia"]');
