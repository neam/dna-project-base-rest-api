<?php

class AssetManager extends CAssetManager
{
    public function getBaseUrl()
    {
        if (defined('CDN_HOST')) {
            $_ = $_SERVER['HTTP_HOST'];
            $_SERVER['HTTP_HOST'] = CDN_HOST;
            $baseUrl = Yii::app()->request->getBaseUrl(true) . parent::getBaseUrl();
            $_SERVER['HTTP_HOST'] = $_;
            return $baseUrl;
        }
        return parent::getBaseUrl();
    }
}