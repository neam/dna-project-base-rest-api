<?php
$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('check that running the simplest acceptance test works');
$I->amOnPage(HomePage::$URL);
$I->see('Welcome to Gapminder', 'h4');
