<?php
$scenario->group('data:clean-db,coverage:basic');
$I = new ApiGuy($scenario);
$I->wantTo('retrieve composition items via the REST API as defined in api blueprint');

/*
$I->sendGET('composition/todo', array('id' => 1));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseEquals("todo");
*/