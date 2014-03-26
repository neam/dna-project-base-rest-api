<?php

class RegisterationPage
{
    // include url of current page
    static $URL = '?r=user/registration';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $usernameField = '#AppRegistrationForm_username';
    public static $passwordField = '#AppRegistrationForm_password';
    public static $verifyPasswordField = '#AppRegistrationForm_verifyPassword';
    public static $emailField = '#AppRegistrationForm_email';
    public static $acceptTermsField = '#AppRegistrationForm_acceptTerms';

    public static $submitButton = '#registration-form button[type=submit]';

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
     * @return RegisterationPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}