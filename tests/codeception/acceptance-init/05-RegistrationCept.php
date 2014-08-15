<?php
$scenario->group('data:clean-db,coverage:basic');
$scenario->group('data:user-generated,coverage:basic');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that registering a user works');

$datetime = date("YmdHis");

$I->register('testa' . $datetime, 'test', 'test', 'dev+testa' . $datetime . '@gapminder.org', true);

// TODO: Verify that can't login - currently login is enabled immediately:
//$I->cantLogin();

// TODO: Activate the account by having an admin activate it manually

// Verify that user can login and logout
$I->login('testa' . $datetime, 'test');
$I->logout();

$I->register('testb' . $datetime, 'test', 'test', 'dev+testb' . $datetime . '@gapminder.org', true);

// TODO: Verify that login can't be made
//$I->cantLogin();

// TODO: Activate the account by clicking the activation link in the email

// Verify that user can login and logout
$I->login('testb' . $datetime, 'test');
$I->logout();
