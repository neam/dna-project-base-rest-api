<?php

class VideoFileBrowsePage extends ItemBrowsePage
{
    // include url of current page
    static $URL = '?r=videoFile/browse';

    public static function modelContext($title)
    {
        return '#VideoFile_' . str_replace(' ', '_', $title);
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
     * @return VideoFileBrowsePage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
