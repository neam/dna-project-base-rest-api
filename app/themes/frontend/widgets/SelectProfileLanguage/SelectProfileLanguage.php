<?php

class SelectProfileLanguage extends CWidget
{
    public $model;
    public $attributes = array();
    public $form;
    public $htmlOptions = array();

    /**
     * Initializes the widget.
     */
    public function init()
    {
        $this->render('view', array(
            'model' => $this->model,
            'attributes' => $this->attributes,
            'form' => $this->form,
            'htmlOptions' => $this->getHtmlOptions(),
        ));
    }

    /**
     * Returns the HTML options.
     * @return array
     */
    protected function getHtmlOptions()
    {
        $htmlOptions = array(
            'empty' => Yii::t('app', '- None -'),
        );

        return array_merge($htmlOptions, $this->htmlOptions);
    }
}
