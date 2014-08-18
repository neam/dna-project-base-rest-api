<?php

class RegistrationPage
{
    // include url of current page
    static $URL = 'account/signup/index';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $usernameField = '#SignupForm_username';
    public static $emailField = '#SignupForm_email';
    public static $passwordField = '#SignupForm_password';
    public static $verifyPasswordField = '#SignupForm_verifyPassword';
    public static $acceptTermsField = '#SignupForm_acceptTerms';
    public static $submitButton = '#signup-submit';

    public static $formId = '#signupForm';
    public static $errorClass = '.has-error';

    public static $introText = 'Thank you for deciding to join the Gapminder community!';
    public static $afterRegistrationText = 'Thank you for your registration.';

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
     * @return RegistrationPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
