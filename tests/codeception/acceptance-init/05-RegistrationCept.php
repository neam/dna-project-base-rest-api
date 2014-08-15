<?php
$scenario->group('data:clean-db');
$scenario->group('data:user-generated');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that registering a user works');

$datetime = date("YmdHis");

$I->register('test-' . $datetime, 'test', 'test', 'dev+test-' . $datetime . '@gapminder.org', true);

// TODO: Verify that login can't be made
//$I->cantLogin();

// TODO: Activate the account by clicking the activation link in the email

// Verify that user can login
$I->login('test-' . $datetime, 'test');
