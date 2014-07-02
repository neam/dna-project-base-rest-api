<?php

class SnapshotViewPage
{
    // include url of current page
    static $URL = '?r=snapshot/view';

    static $noMarkupText = 'No markup to render';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

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
     * @return SnapshotViewPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
