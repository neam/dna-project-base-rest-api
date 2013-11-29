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

    /**
   	 * Generates a tooltip. (This overrides the currently faulty TbHtml::tooltip() method.)
   	 * @param string $label the tooltip link label text.
   	 * @param mixed $url the link url.
   	 * @param string $content the tooltip content text.
   	 * @param array $htmlOptions additional HTML attributes.
   	 * @return string the generated tooltip.
   	 */
    public static function tooltip($label, $url, $content, $htmlOptions = array())
    {
        $htmlOptions['data-toggle'] = 'tooltip'; // this option is missing from TbHtml::tooltip()
        return parent::tooltip($label, $url, $content, $htmlOptions);
    }

    /**
     * Creates a custom label for an ActiveRecord field with an attribute hint tooltip.
     * @param ActiveRecord $model the model.
     * @param string $attribute the model attribute.
     * @param string $hintAttribute the attribute hint (if different). Defaults to $attribute.
     * @return string the label HTMl.
     */
    public static function attributeLabelWithTooltip(ActiveRecord $model, $attribute, $hintAttribute = '', $htmlOptions = array())
    {
        $hintAttribute = !empty($hintAttribute) ? $hintAttribute : $attribute;
        $label = $model->getAttributeLabel($attribute);
        $tooltip = $model->getAttributeHint($hintAttribute)
            ? ' ' . Html::hintTooltip($model->getAttributeHint($hintAttribute), $htmlOptions)
            : '';
        return $label . $tooltip;
    }

    /**
     * Creates a tooltip for a model attribute hint.
     * @param string $content the tooltip content.
     * @return string the tooltip HTML.
     */
    public static function hintTooltip($content, $htmlOptions = array())
    {
        return isset($content)
            ? Html::tooltip(TbHtml::icon(TbHtml::ICON_QUESTION_SIGN), '#', $content, $htmlOptions)
            : '';
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

    public static function initJqueryComments($selector = "#commentSection", $context = array())
    {

        $localization = array(
            "headerText" => Yii::t('evaluate', 'Comments'),
            "commentPlaceHolderText" => Yii::t('evaluate', 'Add a comment...'),
            "sendButtonText" => Yii::t('evaluate', 'Send'),
            "replyButtonText" => Yii::t('evaluate', 'Reply'),
            "deleteButtonText" => Yii::t('evaluate', 'Delete'),
        );

        app()->clientScript->registerScript('initJqueryComments-' . $selector, '$(document).ready(function () {
    $("' . $selector . '").comments({
        getCommentsUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcList?limit=1000&' . http_build_query($context) . '",
        postCommentUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcCreate?' . http_build_query($context) . '",
        deleteCommentUrl: "' . Yii::app()->request->baseUrl . '/api/comment/jqcDelete?' . http_build_query($context) . '",
        localization: ' . json_encode($localization) . '
    });
});', CClientScript::POS_END);
    }

}
