<?php

Yii::import('bootstrap.helpers.TbHtml');

class Html extends TbHtml
{
    /**
     * Registers the Dirty Forms jQuery plugin and binds it to a form element.
     */
    public static function jsDirtyForms()
    {
        publishJs('/themes/frontend/js/vendor/jquery.dirtyforms.js', CClientScript::POS_HEAD);
        publishJs('/themes/frontend/js/dirty-forms-ckeditor.js', CClientScript::POS_HEAD);
        app()->clientScript->registerScript('registerDirtyForms', "$('form').dirtyForms();", CClientScript::POS_END);
        publishJs('/themes/frontend/js/toggle-dirty-buttons.js', CClientScript::POS_END); // show action buttons when form is dirty
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
        $cs->registerCssFile($assets . '/css/jquery.comment.css', CClientScript::POS_HEAD);
        $cs->registerScriptFile($assets . '/js/jquery.comment.js', CClientScript::POS_END);

    }

    public static function initJqueryComments($selector = "#commentSection")
    {

        $localization = array(
            "headerText" => Yii::t('evalute', 'Comments'),
            "commentPlaceHolderText" => Yii::t('evalute', 'Add a comment...'),
            "sendButtonText" => Yii::t('evalute', 'Send'),
            "replyButtonText" => Yii::t('evalute', 'Reply'),
            "deleteButtonText" => Yii::t('evalute', 'Delete'),
        );

        app()->clientScript->registerScript('initJqueryComments', '$(document).ready(function () {
    $("' . $selector . '").comments({
        getCommentsUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcList",
        postCommentUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcCreate",
        deleteCommentUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcDelete",
        localization: ' . json_encode($localization) . '
    });
});', CClientScript::POS_END);
    }

}