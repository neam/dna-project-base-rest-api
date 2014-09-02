<?php
$scenario->group('data:clean-db,coverage:basic');
$scenario->group('data:user-generated,coverage:basic');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that registering a user works');

// clear old emails from MailCatcher
$I->resetEmails();

$datetime = date("YmdHis");

$I->register('testa' . $datetime, 'testtest', 'testtest', $email = 'dev+testa' . $datetime . '@gapminder.org', true);
$I->seeInLastEmailTo($email, 'Please confirm your email address and activate your new Gapminder account');

// Verify that can't login
$I->cantLogin('testa' . $datetime, 'testtest', 'Your account has not yet been activated.');

// Activate the account by having an admin activate it manually
$I->login('admin', 'admin');
$I->activateMember('testa' . $datetime);
$I->logout();

// Verify that user can login and logout
$I->login('testa' . $datetime, 'testtest');
$I->logout();

$I->register('testb' . $datetime, 'testtest', 'testtest', $email = 'dev+testb' . $datetime . '@gapminder.org', true);
$I->seeInLastEmailTo($email, 'Please confirm your email address and activate your new Gapminder account');

// Verify that can't login
$I->cantLogin('testb' . $datetime, 'testtest', 'Your account has not yet been activated.');

// Activate the account by clicking the activation link in the email
$matches = $I->grabMatchesFromLastEmailTo($email, '@<a href="([^"]*)">.*?activate.*?</a>@');
$activationLink = html_entity_decode($matches[1], null, 'UTF-8');
$I->executeInSelenium(function (\WebDriver $webdriver) use ($activationLink) {
    $webdriver->get($activationLink);
});
//TODO: Use instead of executeInSelenium above after our PR gets accepted:
//$I->navigateTo($activationLink);
$I->waitForText('Click on the link below to sign in', 10);
$I->click('Sign In');
$I->seeInCurrentUrl(LoginPage::$URL);

// Verify that user can login and logout
$I->login('testb' . $datetime, 'testtest');
$I->logout();
