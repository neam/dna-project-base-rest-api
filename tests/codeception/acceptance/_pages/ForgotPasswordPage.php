<?php

class ForgotPasswordPage
{
    // include url of current page
    static $URL = 'account/password/forgot';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $emailField = '#nordsoftware_yii_account_models_form_ForgotPasswordForm_email';
    public static $submitButton = '.form-actions button[type="submit"]';

    //public static $formId = '#signupForm';
    //public static $errorClass = '.has-error';

    public static $afterResetPasswordEmailText = 'You should promptly receive an email with instructions on how to reset your password';
    public static $inResetPasswordEmailText = 'Please click the link below to reset the password for your account';

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: EditPage::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL . $param;
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
