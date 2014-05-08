<?php

/**
 * WebApplication class file.
 * @inheritDoc
 */
class WebApplication extends CWebApplication
{
    // Application constants
    const THEME_FRONTEND = 'frontend';
    const THEME_BACKEND2 = 'backend2';

    // TODO update this automatically.
    /**
     * @var string application version
     */
    public $version = '0.4.0';

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
        return Yii::app()->params['languages'];
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
}
