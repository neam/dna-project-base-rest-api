<?php
$scenario->group('data:clean-db,coverage:basic');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that registering a user works');

$datetime = date("YmdHis");

$I->register('test_a-' . $datetime, 'test', 'test', 'dev+test_a-' . $datetime . '@gapminder.org', true);

// TODO: Verify that can't login - currently login is enabled immediately:
//$I->cantLogin();

// TODO: Activate the account by having an admin activate it manually


// Verify that user can login
$I->login('test-' . $datetime, 'test');

$I->register('test_b-' . $datetime, 'test', 'test', 'dev+test_b-' . $datetime . '@gapminder.org', true);

// TODO: Verify that login can't be made
//$I->cantLogin();

// TODO: Activate the account by clicking the activation link in the email

// Verify that user can login
$I->login('test_b-' . $datetime, 'test');
