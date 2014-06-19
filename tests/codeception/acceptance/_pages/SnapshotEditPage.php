<?php

class SnapshotEditPage extends ItemEditPage
{
    // include url of current page
    static $URL = '?r=snapshot/edit';

    /**
     * @var array the flowSteps
     */
    static $steps = array(
        'info',
        'state',
        'related',
    );

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    static $titleField = '#Snapshot_title_en';
    static $slugField = '#Snapshot_slug_en';
    static $aboutField = '#Snapshot_about_en';
    static $thumbnailField = '#Snapshot_thumbnail_media_id_en';
    static $vizabiStateField = '#Snapshot_vizabi_state';
    static $toolField = '#Snapshot_tool_id';
    static $embedOverrideField = '#Snapshot_embed_override';

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
     * @return SnapshotEditPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
