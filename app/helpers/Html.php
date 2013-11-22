<?php

Yii::import('bootstrap.helpers.TbHtml');

class Html extends TbHtml
{
    /**
     * Registers the Are You Sure jQuery plugin and binds it to a form element.
     */
    public static function jsAreYouSure()
    {
        publishJs('themes/frontend/js/vendor/jquery.are-you-sure.js', CClientScript::POS_HEAD);
        app()->clientScript->registerScript('registerAreYouSure', "$('form').areYouSure();", CClientScript::POS_END);
    }
}