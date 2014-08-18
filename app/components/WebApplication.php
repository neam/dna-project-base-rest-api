<?php

/**
 * WebApplication class file.
 * @inheritDoc
 */
class WebApplication extends CWebApplication
{
    // Theme constants
    const THEME_FRONTEND = 'frontend';
    const THEME_BACKEND2 = 'backend2';

    // View layout constants
    const LAYOUT_MAIN = '//layouts/main';
    const LAYOUT_REGULAR = '//layouts/regular';
    const LAYOUT_MINIMAL = '//layouts/minimal';
    const LAYOUT_NARROW = '//layouts/narrow';

    /**
	 * Initializes the application.
	 * This method overrides the parent implementation by properly registering the errorHandler shutdown function to catch fatal errors
     */
    public function init() {
		parent::init();
        // Needs to be registered here to be able to catch fatal errors
        register_shutdown_function(array(Yii::app()->errorHandler, 'onShutdown'));
    }

    /**
     * @var string application version
     * TODO: Update this automatically.
     */
    public $version = '0.6.0';

    /**
     * Registers CSS files.
     */
    public function registerCss()
    {
        $theme = Yii::app()->theme->name;

        // TODO: Refactor this.
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

            default:
                $path = 'assets';
                $files = array('main.css');
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
     * Registers JavaScript files.
     */
    public function registerScripts()
    {
        $this->ga->registerTracking();
        $this->yiistrap->registerAllScripts();
        Html::jsDirtyForms(); // TODO: Load this only when needed.
    }

    /**
     * Returns all available languages.
     * @return array
     */
    public function getLanguages()
    {
        return LanguageHelper::getLanguageList();
    }

    /**
     * Returns a language name by the given language code.
     * @param string $languageCode
     * @return string
     */
    public function getLanguageNameByCode($languageCode)
    {
        $languages = $this->getLanguages();

        return (isset($languages[$languageCode]))
            ? $languages[$languageCode]
            : $languageCode;
    }

    public function clientConfigJson()
    {
        return
            CJSON::encode(
            array(
                'baseUrl' => baseUrl(),
                'cacheBuster' => $this->resolveCacheBuster(),
            )
        );
    }

    /**
     * Returns the cache buster for this application.
     * @return string cache buster.
     */
    public function resolveCacheBuster()
    {
        return md5(YII_DEBUG ? time() : $this->version);
    }

    /**
     * Returns the user role specific home URL (overrides CApplication::getHomeUrl)
     * @return string
     */
    public function getHomeUrl()
    {
        return !user()->isAdmin() && (user()->isTranslator || user()->isReviewer)
            ? app()->createUrl('/dashboard/index')
            : app()->createUrl('/site/index');
    }

    /**
     * Returns the root breadcrumb label.
     * @return string
     */
    public function getBreadcrumbRootLabel()
    {
        return Yii::t('app', 'Gapminder Community');
    }

    /**
     * Renders a footer link.
     * @param string $label
     * @param string $paramKey the Yii::app()->params key mapped to the corresponding page ID.
     * @param array $htmlOptions
     * @return string
     */
    public function renderFooterLink($label, $paramKey, array $htmlOptions = array())
    {
        $url = '#';
        $label = Yii::t('app', $label);

        $params = Yii::app()->params;

        if (isset($params['pages']) && isset($params['pages'][$paramKey])) {
            $url = TbHtml::normalizeUrl($params['pages'][$paramKey]);
        }

        return TbHtml::link($label, $url, $htmlOptions);
    }
}
