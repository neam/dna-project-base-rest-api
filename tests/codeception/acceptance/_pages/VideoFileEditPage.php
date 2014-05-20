<?php

class VideoFileEditPage extends ItemEditPage
{
    // include url of current page
    static $URL = '?r=videoFile/edit';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $titleField = '#VideoFile_title_en';
    public static $slugField = '#VideoFile_slug_en';
    public static $captionField = '#VideoFile_caption_en';
    public static $aboutField = '#VideoFile_about_en';
    public static $thumbnailField = '#VideoFile_thumbnail_media_id';
    public static $webmField = '#VideoFile_clip_webm_media_id';
    public static $mp4Field = '#VideoFile_clip_mp4_media_id';
    public static $subtitlesField = '#VideoFile_subtitles_en';
    public static $subtitlesImportMediaField = '#VideoFile_subtitles_import_media_id';

    public static $steps = array('info', 'files', 'subtitles', 'related');

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
     * @return VideoFileEditPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
