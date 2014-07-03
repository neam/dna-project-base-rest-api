<?php

class DashboardPage
{
    // include url of current page
    static $URL = '?r=dashboard/index';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    static $startTaskButton = 'Start Translating';
    static $continueTaskButton = 'Continue Translating';

    public static function translateModelContext($title, $type, $language)
    {
        return "#translation_{$language}_{$type}_" . str_replace(' ', '_', $title);
    }

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
     * @return DashboardPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
