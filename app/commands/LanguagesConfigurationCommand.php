<?php

/**
 * Helpers to build configuration arrays of valid languages
 *
 * Class AuthorizationHierarchyCommand
 */
class LanguagesConfigurationCommand extends CConsoleCommand
{

    public function actionBuildGoogleAnalyticsSet()
    {

        $languages = array(
            "ar" => "العربية",
            "bg" => "Български",
            "ca" => "Català",
            "cs" => "Čeština",
            "da" => "Dansk",
            "de" => "Deutsch",
            "en_gb" => "UK English", // ga had this key as en_uk
            "en_us" => "US English",
            "el" => "Ελληνικά",
            "es" => "Español",
            "fi" => "Suomi",
            "fil" => "Filipino",
            "fr" => "Français",
            "hi" => "हिंदी",
            "hr" => "Hrvatski",
            "hu" => "Magyar",
            "id" => "Bahasa Indonesia",
            "iw" => "עברית",
            "it" => "Italiano",
            "ja" => "日本語",
            "ko" => "한국어",
            "lt" => "Lietuvių",
            "lv" => "Latviešu valoda",
            "nl" => "Nederlands",
            "no" => "Norsk",
            "pl" => "Polski",
            "pt_br" => "Português (Brasil)",
            "pt_pt" => "Português (Portugal)",
            "ro" => "Română",
            "ru" => "Русский",
            "sk" => "Slovenský",
            "sl" => "Slovenščina",
            "sr" => "Српски",
            "sv" => "Svenska",
            "th" => "ไทย",
            "tr" => "Türkçe",
            "uk" => "Українська",
            "vi" => "Tiếng Việt",
            "zh_cn" => "中文 (简体)",
            "zh_tw" => "中文 (繁體)",
        );

        foreach ($languages as $language => $label) {
            LocaleData::getInstance($language);
        }

        var_export($languages);

    }

    public function actionBuild()
    {
        $enLocale = LocaleData::getInstance('en');
        $data = $enLocale->getData();
        var_export($data["languages"]);
    }

}
