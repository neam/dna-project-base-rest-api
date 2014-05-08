<?php
// TODO uncomment once v0.4 is released (user-generated data is currently missing some entries)
/*
$scenario->group('data:user-generated');
$I = new ApiGuy($scenario);
$I->wantTo('retrieve go-required items via the REST API');

$I->sendGET('i18nCatalog/get', array('id' => 3));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('language/list');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('i18nCatalog/poJson', array('id' => 4, 'lang' => 'en'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('i18nCatalog/poJson', array('id' => 4, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('videoFile/poJson', array('id' => 2, 'lang' => 'en'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('videoFile/poJson', array('id' => 2, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('snapshot/poJson', array('id' => 5, 'lang' => 'en'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('snapshot/poJson', array('id' => 5, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('en/videoFile/subtitles', array('id' => 2, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('fa/videoFile/subtitles', array('id' => 2, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

*/

