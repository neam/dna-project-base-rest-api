<?php
namespace WebGuy;

use HomePage;
use LoginPage;
use ProfilePage;
use RegisterationPage;

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
        $I->amOnPage(RegisterationPage::$URL);
        $I->fillField(RegisterationPage::$usernameField, $username);
        $I->fillField(RegisterationPage::$passwordField, $password);
        $I->fillField(RegisterationPage::$verifyPasswordField, $verifyPassword);
        $I->fillField(RegisterationPage::$emailField, $email);
        $acceptTerms
            ? $I->checkOption(RegisterationPage::$acceptTermsField)
            : $I->uncheckOption(RegisterationPage::$acceptTermsField);
        $I->click(RegisterationPage::$submitButton);
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