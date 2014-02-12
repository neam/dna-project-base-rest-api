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
}