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
     * Registers the SlugIt jQuery plugin.
     * @param array $fields the from and to IDs (e.g. array('#from' => '#to').
     * @param string $separator the separator. Defaults to '-'.
     */
    public static function jsSlugIt($fields = array(), $separator = '-')
    {
        publishJs('/themes/frontend/js/vendor/jquery.slugit.js', CClientScript::POS_HEAD);
        foreach ($fields as $from => $to) {
            app()->clientScript->registerScript('slugIt_' . $from, "$('$from').slugIt({output: '$to', separator: '$separator'});", CClientScript::POS_END);
        }
    }
}