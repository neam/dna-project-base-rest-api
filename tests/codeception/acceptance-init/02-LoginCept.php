<?php
$scenario->group('data:clean-db,coverage:minimal');

$I = new WebGuy\MemberSteps($scenario);

$I->wantTo('login and see result');
$I->login('admin', 'admin');
$I->waitForText(HomePage::$homePageMessage, 20);
$I->see(HomePage::$homePageMessage);
