<?php
$scenario->group('data:clean-db');
$scenario->group('data:user-generated');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('check that no 504 gateway timeout occurs when a request takes quite a long time');
$I->amOnPage(HomePage::$URL);
$I->see(HomePage::$homePageMessage);
$I->amOnPage('site/sleeper');
$I->see('I woke up after 30 seconds');

