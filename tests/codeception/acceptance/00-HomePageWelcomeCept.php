<?php
$scenario->group('data:clean-db');
$scenario->group('data:user-generated');
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('check that the homepage shows a welcome message');
$I->amOnPage(HomePage::$URL);
$I->see('Welcome to Gapminder', 'h4');
