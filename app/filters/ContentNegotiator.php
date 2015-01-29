<?php

/**
 * Filter for negotiating the application language.
 *
 * When the `$languages` is specified, ContentNegotiator will support application language negotiation based on the
 * value of the GET parameter `$languageParam` and the `Accept-Language` http header, in that order.
 * If a match is found, the `Yii::app()->language` property will be set to the chosen language.
 *
 * Usage as controller filter:
 *
 * .....
 * public function filters()
 * {
 *     return array(
 *         array(
 *             'application.filters.ContentNegotiator',
 *             'languages' => array('en', 'en_us', 'sv'),
 *         )
 *     );
 * }
 * .....
 */
class ContentNegotiator extends CFilter
{
    /**
     * @var string the name of the GET parameter that specifies the application language.
     * If this property is empty or not set, the language will be determined based on the `Accept-Language` header, if
     * `$readAcceptLanguage` is set to true, otherwise the language is set based on application default.
     */
    public $languageParam = '_lang';

    /**
     * @var bool if the http `Accept-Language` header should be used to determine the preferred language.
     */
    public $readHeaderAcceptLanguage = false;

    /**
     * @var array a list of supported languages as recognized by the application (e.g. `en`, `en_us`, `sv`).
     * If this property is empty or not set, language negotiation will be skipped.
     */
    public $languages = array();

    /**
     * @inheritdoc
     */
    protected function preFilter($filterChain)
    {
        $this->negotiate();
        return true;
    }

    /**
     * Negotiates the application language.
     */
    protected function negotiate()
    {
        if (!empty($this->languages)) {
            Yii::app()->language = $this->negotiateLanguage();
        }
    }

    /**
     * Negotiates the application language.
     *
     * @return string the chosen language.
     */
    protected function negotiateLanguage()
    {
        // First try the `_lang` GET param.
        if (!empty($this->languageParam) && ($preferredLanguage = Yii::app()->getRequest()->getParam($this->languageParam)) !== null) {
            if (($language = $this->getSupportedLanguage($preferredLanguage)) !== false) {
                return $language;
            }
        }
        // Then try the `Accept-Language` header.
        if ($this->readHeaderAcceptLanguage) {
            foreach (Yii::app()->getRequest()->getPreferredLanguages() as $preferredLanguage) {
                if (($language = $this->getSupportedLanguage($preferredLanguage)) !== false) {
                    return $language;
                }
            }
        }
        // Fall back on the already defined application language.
        return Yii::app()->language;
    }

    /**
     * Returns the application language code based on preferred language if it is supported.
     *
     * @param string $preferredLanguage the preferred language.
     * @return bool|string the application language code or false if not supported.
     */
    protected function getSupportedLanguage($preferredLanguage)
    {
        $preferredLanguage = \CLocale::getCanonicalID($preferredLanguage);
        return in_array($preferredLanguage, $this->languages) ? $preferredLanguage : false;
    }
}
