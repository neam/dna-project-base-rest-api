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

    /*
     * Translatable fields
     */
    public static $titleField = '#VideoFile_title_en';
    public static $slugField = '#VideoFile_slug_en';
    public static $captionField = '#VideoFile_caption_en';
    public static $aboutField = '#VideoFile_about_en';
    public static $subtitlesField = '#VideoFile_subtitles';

    public static $titleFieldPt = '#VideoFile_title_pt';
    public static $slugFieldPt = '#VideoFile_slug_pt';
    public static $captionFieldPt = '#VideoFile_caption_pt';
    public static $aboutFieldPt = '#VideoFile_about_pt';
    public static $subtitlesFieldPt = '#VideoFile_subtitles_pt';

    /*
     * Non-translatable fields
     */
    public static $webmField = '#VideoFile_clip_webm_media_id';
    public static $mp4Field = '#VideoFile_clip_mp4_media_id';
    public static $subtitlesImportMediaField = '#VideoFile_subtitles_import_media_id';
    public static $thumbnailField = '#VideoFile_thumbnail_media_id';
    public static $relatedField = '#VideoFile_related';

    public static $webmUploadNewContext = '.webm';
    public static $mp4mUploadNewContext = '.mp4';

    public static $webmModalFormId = '#item-form-webm';
    public static $mp4ModalFormId = '#item-form-mp4';
    public static $webmModalId = '#item-form-webm-modal';
    public static $mp4ModalId = '#item-form-mp4-modal';


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
