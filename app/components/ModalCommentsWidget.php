<?php

/**
 * ModalCommentsWidget class.
 */
class ModalCommentsWidget extends CWidget
{
    /**
     * @var ActiveRecord the model.
     */
    public $model;

    /**
     * @var string the model attribute.
     */
    public $attribute;

    /**
     * @var int the modal element ID.
     */
    public $modalId;

    /**
     * Initializes the widget.
     */
    function init()
    {
        parent::init();
        $this->modalId = get_class($this->model) . '-' . $this->attribute . '-' . uniqid();
    }

    /**
     * Runs the widget.
     */
    function run()
    {
        $this->render('view');
        $this->registerAssets();
        $this->initScripts();
    }

    /**
     * Registers the jQuery Comment plugin asset.
     */
    public function registerAssets()
    {
        $css = YII_DEBUG ? array('css/jquery.comment.css') : array('css/jquery.comment.min.css');
        $js = YII_DEBUG ? array('js/jquery.comment.js') : array('js/jquery.comment.min.js');
        $depends = array('jquery');
        registerPackage('jquery.comment', 'application.themes.gapminder.assets.jquery-comment', $css, $js, $depends);
    }

    /**
     * Initializes the jQuery Comment plugin.
     */
    public function initScripts()
    {
        $selector = "#$this->modalId-commentSection";

        $urlQueryData = array(
            'context_model' => get_class($this->model),
            'context_id' => $this->model->id,
            'context_attribute' => $this->attribute,
        );

        $localization = array(
            'headerText'                => Yii::t('evaluate', 'Comments'),
            'commentPlaceHolderText'    => Yii::t('evaluate', 'Add a comment...'),
            'sendButtonText'            => Yii::t('evaluate', 'Send'),
            'replyButtonText'           => Yii::t('evaluate', 'Reply'),
            'deleteButtonText'          => Yii::t('evaluate', 'Delete'),
        );

        $baseUrl = request()->baseUrl;
        $urlQuery = http_build_query($urlQueryData);
        $localizationJson = json_encode($localization);

        $script = <<<EOD
$(document).ready(function () {
    $('$selector').comments({
        getCommentsUrl: '$baseUrl/api/comment/jqcList?limit=1000&$urlQuery',
        postCommentUrl: '$baseUrl/api/comment/jqcCreate?$urlQuery',
        deleteCommentUrl: '$baseUrl/api/comment/jqcDelete?$urlQuery',
        localization: $localizationJson
    });
});
EOD;

        app()->clientScript->registerScript("initJqueryComments-$selector", $script, CClientScript::POS_END);
    }
}
