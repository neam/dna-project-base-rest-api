<?php
$scenario->group('data:clean-db,coverage:basic');

$I = new WebGuy\MemberSteps($scenario);

$I->wantTo('change password');

$datetime = date("YmdHis");

$username = 'testd' . $datetime;

$I->register($username, 'testtest', 'testtest', 'dev+' . $username . '@gapminder.org', true);

$I->login('admin', 'admin');
$I->activateMember($username);
$I->logout();

$I->login($username, 'testtest');

$I->amOnPage(ProfilePage::$URL);
$I->click('Change password');
$I->fillField(ChangePasswordPage::$fieldPassword, 'newpassword');
$I->fillField(ChangePasswordPage::$fieldVerifyPassword, 'newpassword');
$I->click(ChangePasswordPage::$submitButton);

$I->logout();

$I->login($username, 'newpassword');




