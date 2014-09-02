<?php
$scenario->group('data:clean-db,coverage:basic');

$I = new WebGuy\MemberSteps($scenario);

$I->wantTo('verify that registering a user works');

$datetime = date("YmdHis");

$username = 'testc' . $datetime;

$I->register($username, 'testtest', 'testtest', 'dev+' . $username . '@gapminder.org', true);

$I->login('admin', 'admin');
$I->activateMember($username);
$I->logout();

$I->login($username, 'testtest');

$I->completeProfileLanguagesTask(array('English'));
