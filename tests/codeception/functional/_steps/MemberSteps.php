<?php
namespace TestGuy;

class MemberSteps extends \TestGuy
{
    function login($username, $password)
    {
        $I = $this;
        $I->amOnPage('?r=user/login');
        $I->fillField('UserLogin[username]', $username);
        $I->fillField('UserLogin[password]', $password);
        $I->click('form button[type=submit]');
        $I->see('Admin');
        $I->see('Logout');
        $I->dontSee('Login', '#frontend-navbar');
        $I->dontSee('Login', '#backend-navbar');
    }

    function logout()
    {
        $I = $this;

    }

    function register()
    {
        $I = $this;

    }

    function forgotPassword()
    {
        $I = $this;

    }

}