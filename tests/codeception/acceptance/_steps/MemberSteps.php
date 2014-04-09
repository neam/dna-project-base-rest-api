<?php
namespace WebGuy;

use HomePage;
use LoginPage;
use ProfilePage;
use RegistrationPage;

class MemberSteps extends \WebGuy
{
    function login($username, $password)
    {
        $I = $this;
        $I->amOnPage(LoginPage::$URL);
        $I->fillField(LoginPage::$usernameField, $username);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$submitButton);
    }

    function logout()
    {
        $I = $this;
        $I->amOnPage(HomePage::$URL);
        $I->click(HomePage::$accountMenuLink);
        $I->click(HomePage::$logoutLink);
    }

    function register($username, $password, $verifyPassword, $email, $acceptTerms)
    {
        $I = $this;
        $I->amOnPage(RegistrationPage::$URL);
        $I->fillField(RegistrationPage::$usernameField, $username);
        $I->fillField(RegistrationPage::$passwordField, $password);
        $I->fillField(RegistrationPage::$verifyPasswordField, $verifyPassword);
        $I->fillField(RegistrationPage::$emailField, $email);
        $acceptTerms
            ? $I->checkOption(RegistrationPage::$acceptTermsField)
            : $I->uncheckOption(RegistrationPage::$acceptTermsField);
        $I->click(RegistrationPage::$submitButton);

        // todo activate account using mailcatcher

    }

    function joinGroup($group)
    {
        $I = $this;
        $I->amOnPage(ProfilePage::$URL);
        $I->click("#addToGroup_$group");
        $I->see("Remove from $group", "#removeFromGroup_$group");
    }

    function leaveGroup($group)
    {
        $I = $this;
        $I->amOnPage(ProfilePage::$URL);
        $I->click("#removeFromGroup_$group");
        $I->see("Add to $group", "#addToGroup_$group");
    }
}