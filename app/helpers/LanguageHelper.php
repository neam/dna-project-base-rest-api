<?php

/**
 * Static helper class for handling languages in the application.
 */
class LanguageHelper
{
    /**
     * Returns a list of all supported languages in the application.
     *
     * Format:
     * array('en' => 'English', ... )
     *
     * @return array data about the languages.
     * @throws CException if no languages are defined in the application config.
     */
    static public function getLanguageList()
    {
        if (!isset(Yii::app()->params['languages'])) {
            throw new CException('No languages defined in application "params" config.');
        }
        return Yii::app()->params['languages'];
    }

    /**
     * Returns a list of all language directions in the application.
     *
     * Format:
     * array('en' => 'ltr', ... )
     *
     * @return array data about the languages.
     * @throws CException if no languages are defined in the application config.
     */
    static public function getLanguageDirections()
    {
        if (!isset(Yii::app()->params['languageDirections'])) {
            throw new CException('No language directions defined in application "params" config.');
        }
        return Yii::app()->params['languageDirections'];
    }

    /**
     * Returns a list of all supported languages in the application with the direction info, i.e. "ltr" or "rtl".
     *
     * Format:
     * array('en' => array('name' => 'English', 'direction' => 'ltr'), ... )
     *
     * @return array the language list.
     * @throws CException if language direction cannot be found for a language.
     */
    static public function getLanguageListWithDirection()
    {
        $result = array();
        $languages = self::getLanguageList();
        $directions = self::getLanguageDirections();
        foreach ($languages as $code => $name) {
            if (!isset($directions[$code])) {
                throw new CException(sprintf('No language direction defined in app config for "%s".', $code));
            }
            $result[$code] = array(
                'name' => $name,
                'direction' => $directions[$code],
            );
        }
        return $result;
    }

    /**
     * Returns all language codes supported by the application.
     * The codes are a mixed bag of ISO 639-1 codes and language locales.
     *
     * @return array the list of codes.
     */
    static public function getCodes()
    {
        return array_keys(self::getLanguageList());
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
        $languages = self::getLanguageList();
        if (!isset($languages[$code])) {
            throw new CException(sprintf('Failed to find language name for code "%s".', $code));
        }
        return $languages[$code];
    }
}