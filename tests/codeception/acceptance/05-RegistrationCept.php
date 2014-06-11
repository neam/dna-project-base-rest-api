<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('register a test user');
$I->register('test', 'test', 'test', 'dev+test@gapminder.org', true);

// Register users.
$I->wantTo('register gapminder staff and external test users');
$I->registerGapminderStaff();
$I->registerExternalUsers();

