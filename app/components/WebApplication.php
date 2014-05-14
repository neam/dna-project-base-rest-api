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
}
