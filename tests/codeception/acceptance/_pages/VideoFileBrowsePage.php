<?php

class VideoFileBrowsePage extends ItemBrowsePage
{
    // include url of current page
    static $URL = '?r=videoFile/browse';

    public static function addToGroupButton($group, $id)
    {
        return parent::addToGroupButton($group, 'VideoFile', $id);
    }

    public static function removeFromGroupButton($group, $id)
    {
        return parent::removeFromGroupButton($group, 'VideoFile', $id);
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
