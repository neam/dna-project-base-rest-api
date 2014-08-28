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
        if ($action == "user/registration/captcha") {
            return;
        }
        if ($action == "account/authenticate/logout") {
            return;
        }
        if ($action == "account/authenticate/login") {
            return;
        }
        if ($action == "account/signup/activate") {
            return;
        }
        if (strpos($action, "p3media") !== false) {
            return;
        }
        if ($action == "videoFile/subtitles") {
            return;
        }
        if (substr(strrev($action), 0, 4) == strrev(".png")) {
            return;
        }
        if (substr(strrev($action), 0, 4) == strrev(".jpg")) {
            return;
        }
        if (substr(strrev($action), 0, 4) == strrev(".gif")) {
            return;
        }
        if (substr($action, 0, 4) == "api/") {
            return;
        }
        if (Yii::app()->getRequest()->isAjaxRequest) {
            return;
        }

        // todo: add 404s (which is tricky because the 404-check is way later than this component's execution time)

        // Keep track of the most recently visited valid url
        Yii::app()->user->returnUrl = Yii::app()->request->url;

    }

}