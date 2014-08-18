<?php

class HomePage
{
    // Default home-page
    static $URL = 'site/home';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $loginLink = '#loginLink';
    public static $logoutLink = '#logoutLink';
    public static $accountMenuLink = '#accountMenuLink';
    public static $homePageMessage = 'building a fact-based world view together';
    public static $joinButtonText = 'Join now';

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
     * @return HomePage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
