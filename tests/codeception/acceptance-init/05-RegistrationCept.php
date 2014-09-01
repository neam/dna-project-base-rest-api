<?php
$scenario->group('data:clean-db,coverage:basic');
$scenario->group('data:user-generated,coverage:basic');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that registering a user works');

// clear old emails from MailCatcher
$I->resetEmails();

$datetime = date("YmdHis");

$I->register('testa' . $datetime, 'testtest', 'testtest', 'dev+testa' . $datetime . '@gapminder.org', true);

// Verify that can't login
$I->cantLogin('testa' . $datetime, 'testtest', 'Your account has not yet been activated.');

// TODO: Activate the account by having an admin activate it manually

// Verify that user can login and logout
$I->login('testa' . $datetime, 'testtest');
$I->logout();

$I->register('testb' . $datetime, 'testtest', 'testtest', 'dev+testb' . $datetime . '@gapminder.org', true);

// Verify that can't login
$I->cantLogin('testb' . $datetime, 'testtest', 'Your account has not yet been activated.');

// TODO: Activate the account by clicking the activation link in the email

// Verify that user can login and logout
$I->login('testb' . $datetime, 'testtest');
$I->logout();
