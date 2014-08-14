<?php

class AccountAdminPage
{
    // include url of current page
    static $URL = '?r=restrictedAccess/admin/manageAccounts';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $viewLinkPrefix = '#viewLink_';
    public static $activateLinkPrefix = '#activateLink_';

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
     * @return AccountAdminPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }

    public static function generateViewLinkSelector($username)
    {
        return self::$viewLinkPrefix . $username;
    }

    public static function generateActivateLinkSelector($username)
    {
        return self::$activateLinkPrefix . $username;
    }
}