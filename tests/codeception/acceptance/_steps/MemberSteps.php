<?php
namespace WebGuy;

class MemberSteps extends \WebGuy
{
    function login($username, $password)
    {
        $I = $this;
        $I->amOnPage('?r=user/login');
        $I->fillField('UserLogin[username]', $username);
        $I->fillField('UserLogin[password]', $password);
        $I->click('form button[type=submit]');
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