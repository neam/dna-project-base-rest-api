<?php
$scenario->group('data:clean-db');
$scenario->group('data:user-generated');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('check that the homepage shows a message');
$I->amOnPage(HomePage::$URL);
$I->waitForText(HomePage::$homePageMessage, 20);
$I->see(HomePage::$homePageMessage);
