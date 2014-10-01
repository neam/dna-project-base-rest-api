<?php
$scenario->group('data:user-generated,coverage:basic');
$I = new ApiGuy($scenario);
$I->wantTo('retrieve go-required items via the REST API');

/*
$I->sendGET('i18nCatalog/get', array('id' => 3));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
*/

$I->sendGET('language/list');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

/*
$I->sendGET('i18nCatalog/poJson', array('id' => 4, 'lang' => 'en'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('i18nCatalog/poJson', array('id' => 4, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('videoFile/get', array('id' => 2, 'lang' => 'en'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('videoFile/get', array('id' => 2, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('snapshot/get', array('id' => 5, 'lang' => 'en'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGET('snapshot/get', array('id' => 5, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
*/

/*
$I->sendGET('videoFile/subtitles', array('id' => 2, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
// TODO currently this does not respond with JSON, but plain text
//$I->seeResponseIsJson();

$I->sendGET('videoFile/subtitles', array('id' => 2, 'lang' => 'fa'));
$I->seeResponseCodeIs(200);
// TODO currently this does not respond with JSON, but plain text
//$I->seeResponseIsJson();
*/
