<?php

class AccountViewPage
{
    // include url of current page
    static $URL = 'account/view';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $toggleGroupRoleLinkPrefix = '#toggleGroupRole_';

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
     * @return AccountViewPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }

    public static function generateToggleGroupRoleLinkSelector($group, $role)
    {
        return self::$toggleGroupRoleLinkPrefix . "{$group}_{$role}";
    }
}
