<?php

/**
 * Class MobilePage
 *
 * This page object has fields/methods that are exclusive for
 * mobile layouts (think of it as MobileLayout instead of page)
 */
class MobilePage
{
    // include url of current page
    public static $URL = '';


    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    public static $navbarToggle = '.btn-navbar.navbar-toggle';

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
     * @return MobilePage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
