<?php
$scenario->group('data:clean-db,coverage:full');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register gapminder staff and external test users');

// Register users.
$I->registerGapminderStaff();
$I->registerExternalUsers();

