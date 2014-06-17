<?php

// auto-loading
Yii::setPathOfAlias('HtmlChunk', dirname(__FILE__));
Yii::import('HtmlChunk.*');

class HtmlChunk extends BaseHtmlChunk
{

    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    /**
     * Returns the model label.
     * @return string
     */
    public function getItemLabel()
    {
        return Yii::t('app', 'HTML Chunk #{id}', array('{id}' => $this->id));
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function rules()
    {
        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array( // Ordinary validation rules

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'markup_' . $this->source_language,
            ),
            'reviewable' => array(),
            'publishable' => array(),
        );
    }

    /**
     * Define step-dependent fields
     * @return array
     */
    public function flowSteps()
    {
        return array(
            'markup' => array(
                'markup_' . $this->source_language,
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'markup' => Yii::t('app', 'HTML'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

}
