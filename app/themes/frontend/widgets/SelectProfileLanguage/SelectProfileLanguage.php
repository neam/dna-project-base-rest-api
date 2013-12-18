<?php

class SelectProfileLanguage extends CWidget
{
    public $model;
    public $attributes = array();
    public $defaultValues = array();
    public $form;
    public $htmlOptions = array();

    /**
     * Initializes the widget.
     */
    public function init()
    {
        $this->setDefaultValues();
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

    /**
     * Sets the default attribute values.
     */
    protected function setDefaultValues()
    {
        foreach ($this->defaultValues as $attribute => $defaultValue) {
            if ($this->model->hasAttribute($attribute) && !isset($this->model->{$attribute})) {
                $this->model->{$attribute} = $defaultValue;
            }
        }
    }
}
