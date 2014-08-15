<?php
$scenario->group('data:clean-db,coverage:paranoid');
$scenario->group('data:user-generated,coverage:paranoid');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('check that no 504 gateway timeout occurs when a request takes quite a long time');
$I->amOnPage(HomePage::$URL);
$I->see('Welcome to Gapminder', 'h4');
$I->amOnPage('site/sleeper');
$I->see('I woke up after 30 seconds');

