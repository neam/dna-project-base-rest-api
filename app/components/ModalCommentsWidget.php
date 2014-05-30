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
    }

    private function getMediaModel()
    {
        $model = P3Media::model()->findByPk($this->model->{$this->attribute});
        return $model;
    }
}
