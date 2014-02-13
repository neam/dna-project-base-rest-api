<?php

class Html extends TbHtml
{
    // App constants.
    const THEME_FRONTEND = 'frontend';
    const THEME_BACKEND2 = 'backend2';

    // HTML class constants.
    const ITEM_FORM_FIELD_CLASS = 'span9';

    /**
     * Registers the head tags.
     */
    public static function registerHeadTags()
    {
        $clientScript = Yii::app()->getClientScript();
        $clientScript->registerMetaTag('width=device-width, initial-scale=1.0', 'viewport');
        $clientScript->registerLinkTag('shortcut icon', null, '/favicon.ico', null, null);
    }

    /**
     * Registers the CSS files for the current theme.
     */
    public static function registerCss()
    {
        $theme = Yii::app()->theme->name;
        $files = array();

        switch ($theme) {
            case self::THEME_FRONTEND:
                $path = 'assets';
                $files = array(
                    'main.css',
                );
                break;

            case self::THEME_BACKEND2:
                $path = 'css';
                $files = array(
                    'backend.css',
                );
                break;
        }

        if (!empty($files)) {
            // Set the CSS path
            $forceCopy = (defined('DEV') && DEV) || !empty($_GET['refresh_assets']) ? true : false;
            $css = Yii::app()->assetManager->publish(
                Yii::app()->theme->basePath . '/' . $path,
                true, // hash by name
                -1, // level
                $forceCopy
            );

            $clientScript = Yii::app()->getClientScript();
            foreach ($files as $file) {
                $clientScript->registerCssFile($css . '/' . $file);
            }
        }
    }

    /**
     * Renders the backend navbar.
     */
    public static function renderBackendNavbar()
    {
        $role = 'Editor'; // required role for rendering backend navbar
        if (Yii::app()->user->checkAccess($role)) {
            app()->controller->renderPartial('application.themes.backend2.views.layouts._navbar');
        }
    }

    /**
     * Registers the Dirty Forms jQuery plugin and binds it to a form element.
     */
    public static function jsDirtyForms()
    {
        self::jsFacebox(); // required by Dirty Forms
        publishJs('/themes/frontend/js/vendor/jquery.dirtyforms.js', CClientScript::POS_HEAD);
        publishJs('/themes/frontend/js/dirty-forms-ckeditor.js', CClientScript::POS_HEAD);
        app()->clientScript->registerScript('registerDirtyForms', "$('form.dirtyforms').dirtyForms();", CClientScript::POS_END);
        publishJs('/themes/frontend/js/toggle-dirty-buttons.js', CClientScript::POS_END); // show action buttons when form is dirty
    }

    /**
     * Registers the Facebox jQuery plugin.
     */
    public static function jsFacebox()
    {
        publishJs('/themes/frontend/js/vendor/facebox/facebox.js', CClientScript::POS_HEAD);
        publishCss('/themes/frontend/js/vendor/facebox/assets/facebox.css');
        $closeImage = app()->baseUrl . '/images/facebox/closelabel.png';
        $loadingImage = app()->baseUrl . '/images/facebox/loading.gif';
        app()->clientScript->registerScript('registerFacebox', "$.facebox.settings.closeImage = '{$closeImage}'; $.facebox.settings.loadingImage = '{$loadingImage}'", CClientScript::POS_END);
    }

    /**
     * Registers the SlugIt jQuery plugin.
     * @param array $fields the from and to IDs (e.g. array('#from' => '#to').
     * @param string $separator the separator. Defaults to '-'.
     */
    public static function jsSlugIt($fields = array(), $separator = '-')
    {
        publishJs('/themes/frontend/js/slugit.js', CClientScript::POS_HEAD);
        foreach ($fields as $from => $to) {
            app()->clientScript->registerScript('slugIt_' . $from, "$('$from').slugIt({output: '$to', separator: '$separator'});", CClientScript::POS_END);
            app()->clientScript->registerScript('slugItOnLoad_' . $to, "if ($('$to').length > 0 && $('$to').val().length === 0) $('$from').trigger(jQuery.Event('keypress', {which: $.ui.keyCode.ESCAPE}));", CClientScript::POS_READY);
        }
    }

    /**
   	 * Generates a tooltip. (This overrides the currently faulty TbHtml::tooltip() method.)
   	 * @param string $label the tooltip link label text.
   	 * @param mixed $url the link url.
   	 * @param string $content the tooltip content text.
   	 * @param array $htmlOptions additional HTML attributes.
   	 * @return string the generated tooltip.
   	 */
    public static function tooltip($label, $url, $content, $htmlOptions = array())
    {
        $htmlOptions['data-toggle'] = 'tooltip'; // this option is missing from TbHtml::tooltip()
        return parent::tooltip($label, $url, $content, $htmlOptions);
    }

    /**
     * Creates a custom label for an ActiveRecord field with an attribute hint tooltip.
     * @param ActiveRecord $model the model.
     * @param string $attribute the model attribute.
     * @param string $hintAttribute the attribute hint (if different). Defaults to $attribute.
     * @return string the label HTMl.
     */
    public static function attributeLabelWithTooltip(ActiveRecord $model, $attribute, $hintAttribute = '', $htmlOptions = array())
    {
        $hintAttribute = !empty($hintAttribute) ? $hintAttribute : $attribute;
        $label = $model->getAttributeLabel($attribute);
        $tooltip = $model->getAttributeHint($hintAttribute)
            ? ' ' . Html::hintTooltip($model->getAttributeHint($hintAttribute), $htmlOptions)
            : '';
        return $label . $tooltip;
    }

    /**
     * Creates a tooltip for a model attribute hint.
     * @param string $content the tooltip content.
     * @return string the tooltip HTML.
     */
    public static function hintTooltip($content, $htmlOptions = array())
    {
        return isset($content)
            ? Html::tooltip(TbHtml::icon(TbHtml::ICON_QUESTION_SIGN), '#', $content, $htmlOptions)
            : '';
    }

    /**
     * Registers the assets for jquery comments
     */
    public static function assetsJqueryComments()
    {

        $cs = Yii::app()->clientScript;
        $forceCopy = defined('DEV') && DEV && !empty($_GET['refresh_assets']) ? true : false;
        $assets = Yii::app()->assetManager->publish(
            Yii::app()->theme->basePath . '/assets/jquery.comments/',
            true, // hash by name
            -1, // level
            $forceCopy); // forceCopy
        //$cs->registerCssFile($assets . '/css/jquery.comment.css', CClientScript::POS_HEAD); // TODO: Find out why these styles only work in Safari.
        $cs->registerScriptFile($assets . '/js/jquery.comment.js', CClientScript::POS_END);

    }

    public static function initJqueryComments($selector = "#commentSection", $context = array())
    {

        $localization = array(
            "headerText" => Yii::t('evaluate', 'Comments'),
            "commentPlaceHolderText" => Yii::t('evaluate', 'Add a comment...'),
            "sendButtonText" => Yii::t('evaluate', 'Send'),
            "replyButtonText" => Yii::t('evaluate', 'Reply'),
            "deleteButtonText" => Yii::t('evaluate', 'Delete'),
        );

        app()->clientScript->registerScript('initJqueryComments-' . $selector, '$(document).ready(function () {
    $("' . $selector . '").comments({
        getCommentsUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcList?limit=1000&' . http_build_query($context) . '",
        postCommentUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcCreate?' . http_build_query($context) . '",
        deleteCommentUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcDelete?' . http_build_query($context) . '",
        localization: ' . json_encode($localization) . '
    });
});', CClientScript::POS_END);
    }

    /**
     * Returns a list of available languages (language codes, e.g. 'en_us').
     * @return array
     */
    public static function getLanguages()
    {
        $languages = array(
            'en'    => Yii::t('language', 'English'),
            'es'    => Yii::t('language', 'Spanish'),
            'hi'    => Yii::t('language', 'Hindi'),
            'pt'    => Yii::t('language', 'Portuguese'),
            'sv'    => Yii::t('language', 'Swedish'),
            'de'    => Yii::t('language', 'German'),
            'zh'    => Yii::t('language', 'Chinese'),
            'ar'    => Yii::t('language', 'Arabic'),
            'bg'    => Yii::t('language', 'Bulgarian'),
            'ca'    => Yii::t('language', 'Catalan'),
            'cs'    => Yii::t('language', 'Czech'),
            'da'    => Yii::t('language', 'Danish'),
            'en_gb' => Yii::t('language', 'English (United Kingdom)'),
            'en_us' => Yii::t('language', 'English (United States)'),
            'el'    => Yii::t('language', 'Greek'),
            'fi'    => Yii::t('language', 'Finnish'),
            'fil'   => Yii::t('language', 'Filipino'),
            'fr'    => Yii::t('language', 'French'),
            'hr'    => Yii::t('language', 'Croatian'),
            'hu'    => Yii::t('language', 'Hungarian'),
            'id'    => Yii::t('language', 'Indonesian'),
            'iw'    => Yii::t('language', 'Hebrew'),
            'it'    => Yii::t('language', 'Italian'),
            'ja'    => Yii::t('language', 'Japanese'),
            'ko'    => Yii::t('language', 'Korean'),
            'lt'    => Yii::t('language', 'Lithuanian'),
            'lv'    => Yii::t('language', 'Latvian'),
            'nl'    => Yii::t('language', 'Dutch'),
            'no'    => Yii::t('language', 'Norwegian'),
            'pl'    => Yii::t('language', 'Polish'),
            'pt_br' => Yii::t('language', 'Portuguese (Brazil)'),
            'pt_pt' => Yii::t('language', 'Portuguese (Portugal)'),
            'ro'    => Yii::t('language', 'Romanian'),
            'ru'    => Yii::t('language', 'Russian'),
            'sk'    => Yii::t('language', 'Slovak'),
            'sl'    => Yii::t('language', 'Slovenian'),
            'sr'    => Yii::t('language', 'Serbian'),
            'th'    => Yii::t('language', 'Thai'),
            'tr'    => Yii::t('language', 'Turkish'),
            'uk'    => Yii::t('language', 'Ukranian'),
            'vi'    => Yii::t('language', 'Vietnamese'),
            'zh_cn' => Yii::t('language', 'Chinese (PRC)'),
            'zh_tw' => Yii::t('language', 'Chinese (Taiwan & Hong Kong)'),
        );

        asort($languages); // sort alphabetically

        return $languages;
    }
}
