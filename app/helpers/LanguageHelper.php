<?php

/**
 * Static helper class for handling languages in the application.
 */
class LanguageHelper
{
    /**
     * Returns a list of all supported languages in the application.
     *
     * @return array data about the languages.
     * @throws CException if no languages are defined in the application config.
     */
    static public function getList()
    {
        if (!isset(Yii::app()->params['languages'])) {
            throw new CException('No languages defined in application "params" config.');
        }
        return Yii::app()->params['languages'];
    }

    /**
     * Returns all language codes supported by the application.
     * The codes are a mixed bag of ISO 639-1 codes and language locales.
     *
     * @return array the list of codes.
     */
    static public function getCodes()
    {
        return array_keys(self::getList());
    }

    /**
     * Returns the language name for given language code.
     *
     * @param string $code the language code used as key in the language list in application config.
     * @return string the name of the language.
     * @throws CException if the language name cannot be found.
     */
    static public function getName($code)
    {
        $languages = self::getList();
        if (!isset($languages[$code], $languages[$code]['name'])) {
            throw new CException(sprintf('Failed to find language name for code "%s".', $code));
        }
        return $languages[$code]['name'];
    }
}