<?php

class I18nCatalogEditPage extends ItemEditPage
{
    // include url of current page
    static $URL = 'i18nCatalog/edit';

    /**
     * @var array the flowSteps
     */
    static $steps = array(
        'info',
        'i18n',
        'import',
    );

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    static $titleField = '#I18nCatalog_title';
    static $slugField = '#I18nCatalog_slug_en';
    static $aboutField = '#I18nCatalog_about';
    static $i18nCategoryField = '#I18nCatalog_i18n_category';
    static $poContentsField = '#I18nCatalog_po_contents';

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
     * @return I18nCatalogEditPage
     */
    public static function of(WebGuy $I)
    {
        return new static($I);
    }
}
