<?php

/**
 * Class UploadFilePage
 *
 * This page is used as a iframe inside a modal (see p3Media/_modal_form.php)
 */
class UploadPopupPage
{
    // include url of current page
    static $URL = '?r=p3media/import/uploadPopup';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    public static $filesField = 'input[name="files[]"]';

    public static $uploadButton = '.start .ui-button';

    public static function iframeName($formId)
    {
        if ($formId[0] === '#') {
            $formId = substr($formId, 1, strlen($formId) - 1);
        }
        return $formId . '-upload-iframe';
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
     * @return UploadFilePage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
