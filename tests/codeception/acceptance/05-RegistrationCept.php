<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register a test user');
$I->register('test', 'test123', 'test123', 'dev+test@gapminder.org', true);

// Register users.
$I->wantTo('register gapminder staff and external test users');
$I->registerGapminderStaff();
$I->registerExternalUsers();

