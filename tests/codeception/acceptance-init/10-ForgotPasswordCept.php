<?php
$scenario->group('data:user-generated,coverage:basic');
$scenario->group('data:clean-db,coverage:basic');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('verify that a password reset email is sent');

// clear old emails from MailCatcher
$I->resetEmails();

// use form to send password reset email
$I->amOnPage(ForgotPasswordPage::$URL);

$I->fillField(ForgotPasswordPage::$emailField, 'webmaster@example.com');
$I->click(ForgotPasswordPage::$submitButton);
$I->waitForText(ForgotPasswordPage::$afterResetPasswordEmailText, 10);

$I->seeInLastEmail(ForgotPasswordPage::$inResetPasswordEmailText);

// TODO: Verify that password can be reset and the user then can login with the new password
// ...