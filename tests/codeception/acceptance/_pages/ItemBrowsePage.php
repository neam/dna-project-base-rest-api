<?php

class ItemBrowsePage
{
    // include url of current page
    static $URL = '';

    public static $addButton = '#addButton';
    public static $editButtonText = 'Edit';
    public static $publishButtonText = 'Publish';
    public static $unPublishButtonText = 'Unpublish';
    public static $viewButtonText = 'View';

    // When item is in group, a minus is displayed before the group name (the group-toggle link), else a plus
    public static $isNotInGroupIdentifier = '.glyphicon.glyphicon-plus';
    public static $isInGroupIdentifier = '.glyphicon.glyphicon-minus';

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: EditPage::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL . $param;
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
     * @return ItemBrowsePage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
