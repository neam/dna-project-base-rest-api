<?php
$scenario->group('data:user-generated');
$I = new ApiGuy($scenario);
$I->wantTo('retrieve go-required items via the REST API');
$I->sendGET('i18nCatalog/get', array('id' => 3));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
