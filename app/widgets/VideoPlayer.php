<?php

/**
 * VideoPlayer class.
 */
class VideoPlayer extends CWidget
{
    public $videoUrl;
    public $subtitleUrl;
    public $srcLang;

    public function init()
    {
        parent::init();
        $this->_initSrcLang();
        $this->_registerAssets();
    }

    public function run()
    {
        parent::run();
        $this->_registerPlayerJs();
        $this->render('view', array(
            'videoUrl' => $this->videoUrl,
            'subtitleUrl' => $this->subtitleUrl,
            'playerUrl' => $this->getPlayerUrl(),
            'srcLang' => $this->srcLang,
        ));
    }

    /**
     * Returns the video player URL.
     * @return string
     */
    public function getPlayerUrl()
    {
        return request()->baseUrl . '/../components/mediaelement/build/flashmediaelement.swf';
    }

    /**
     * Returns the raw video URL.
     * @return string
     */
    public function getRawVideoUrl()
    {
        return rawurlencode($this->videoUrl);
    }

    /**
     * Checks if the video exists.
     * @return boolean
     */
    public function videoExists()
    {
        // TODO: Improve this check.
        return !empty($this->videoUrl);
    }

    /**
     * Initializes the source language.
     */
    protected function _initSrcLang()
    {
        if (!isset($this->srcLang)) {
            $this->srcLang = substr(app()->language, 0, 2);
        }
    }

    /**
     * Registers the JS and CSS assets.
     */
    protected function _registerAssets()
    {
        app()->params['bowerAssets'] = app()->assetManager->publish(
            Yii::getPathOfAlias('bower-components'),
            true // hash by name
        );

        $assetsPath = app()->params['bowerAssets'];

        app()->clientScript->registerScriptFile($assetsPath . '/mediaelement/build/mediaelement-and-player.min.js');
        app()->clientScript->registerCssFile($assetsPath . '/mediaelement/build/mediaelementplayer.min.css');
    }

    /**
     * Registers the video player JS.
     */
    protected function _registerPlayerJs()
    {
        $js = <<<EOF
$(document).ready(function () {
    $('video').mediaelementplayer({
        startLanguage: '{$this->srcLang}',
        enablePluginDebug: true,
        plugins: ['flash', 'silverlight']
    });
});
EOF;

        app()->clientScript->registerScript('mediaelementplayer', $js, CClientScript::POS_END);
    }
}