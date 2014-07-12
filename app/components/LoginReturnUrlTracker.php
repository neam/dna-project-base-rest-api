<?php

class LoginReturnUrlTracker extends CApplicationComponent
{

    public function init()
    {
        parent::init();

        $action = Yii::app()->getUrlManager()->parseUrl(Yii::app()->getRequest());

        // Certain actions should not be returned to after login
        if ($action == "gii") {
            return;
        }
        if ($action == "site/error") {
            return;
        }
        if ($action == "user/logout") {
            return;
        }
        if ($action == "user/login") {
            return;
        }
        if ($action == "account/authenticate/logout") {
            return;
        }
        if ($action == "account/authenticate/login") {
            return;
        }
        if (strpos($action, "p3media") !== false) {
            return;
        }
        if ($action == "videoFile/subtitles") {
            return;
        }

        // Keep track of the most recently visited valid url
        Yii::app()->user->returnUrl = Yii::app()->request->url;

    }

}