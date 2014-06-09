<?php

class VideoFileTranslatePage extends \ItemEditPage
{
    // include url of current page
    static $URL = '?r=videoFile/translate';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    public static function titleField($langCode)
    {
        return '#VideoFile_title_' . $langCode;
    }

    public static function slugField($langCode)
    {
        return '#VideoFile_slug_' . $langCode;
    }

    public static function captionField($langCode)
    {
        return '#VideoFile_caption_' . $langCode;
    }

    public static function aboutField($langCode)
    {
        return '#VideoFile_about_' . $langCode;
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
     * @return VideoFileTranslatePage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
