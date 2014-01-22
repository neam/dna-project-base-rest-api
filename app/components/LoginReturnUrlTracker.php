<?php

class LoginReturnUrlTracker extends CApplicationComponent
{

    public function init()
    {
        parent::init();

        $action = Yii::app()->getUrlManager()->parseUrl(Yii::app()->getRequest());

        // Certain actions should not be returned to after login
        if ($action == "gii") {
            return true;
        }
        if ($action == "site/error") {
            return true;
        }
        if ($action == "user/logout") {
            return true;
        }
        if ($action == "user/login") {
            return true;
        }

        // Keep track of the most recently visited valid url
        Yii::app()->user->returnUrl = Yii::app()->request->url;

    }

}