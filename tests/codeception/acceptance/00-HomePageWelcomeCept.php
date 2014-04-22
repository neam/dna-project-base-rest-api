<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('check that the homepage shows a welcome message');
$I->amOnPage(HomePage::$URL);
$I->see('Welcome to Gapminder', 'h4');
