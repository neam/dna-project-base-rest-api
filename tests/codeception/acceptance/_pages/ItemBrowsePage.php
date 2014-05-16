<?php

class ItemBrowsePage
{
    // include url of current page
    static $URL = '';

    public static $addButton = '#addButton';

    public static function addToGroupButton($group, $type, $id)
    {
        return '#addToGroup' . $group . $type . '_' . $id;
    }

    public static function removeFromGroupButton($group, $type, $id)
    {
        return '#removeFromGroup' . $group . $type . '_' . $id;
    }

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
