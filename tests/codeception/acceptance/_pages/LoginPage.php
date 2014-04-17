<?php

class LoginPage
{
    // include url of current page
    static $URL = '?r=user/login';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $usernameField = '#UserLogin_username';
    public static $passwordField = '#UserLogin_password';

    public static $submitButton = '#login-form button[type=submit]';

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: EditPage::route('/123-post');
     */
     public static function route($param)
     {
        return static::$URL.$param;
     }

    /**
     * @var WebGuy;
     */
    protected $webGuy;

    public function __construct(WebGuy $I)
    {
        $this->webGuy = $I;
    }

    /**
     * @return LoginPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}