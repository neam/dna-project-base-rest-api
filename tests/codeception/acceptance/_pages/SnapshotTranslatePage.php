<?php

class SnapshotTranslatePage
{
    // include url of current page
    static $URL = 'snapshot/translate';

    /**
     * @var array the flowSteps of the translation workflow
     */
    static $steps = array('info');

    static function titleField($langCode)
    {
        return '#Snapshot_title_' . $langCode;
    }

    static function slugField($langCode)
    {
        return '#Snapshot_slug_' . $langCode;
    }

    static function aboutField($langCode)
    {
        return '#Snapshot_about_' . $langCode;
    }

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
     * @return SnapshotTranslatePage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
