<?php

// auto-loading
Yii::setPathOfAlias('WaffleCategory', dirname(__FILE__));
Yii::import('WaffleCategory.*');

class WaffleCategory extends BaseWaffleCategory
{
    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', '');
        parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->list_name) ? $this->list_name : "WaffleCategory #" . $this->id;
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
            array(

                array('list_name', 'length', 'min' => 3, 'max' => 50),
                array('property_name', 'length', 'min' => 3, 'max' => 50),

            )
        );
        //Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateFile()
    {
        return !is_null($this->original_media_id);
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'list_name_' . $this->source_language,
            ),
            'reviewable' => array(
                'property_name_' . $this->source_language,
                'possessive_' . $this->source_language,
                'choice_format_' . $this->source_language,
            ),
            'publishable' => array(
                'ref',
            ),
        );
    }

    /**
     * Define step-dependent fields
     * @return array
     */
    public function flowSteps()
    {
        return array(
            'info' => array(
                'ref',
                'list_name_' . $this->source_language,
                'property_name_' . $this->source_language,
                'possessive_' . $this->source_language,
                'choice_format_' . $this->source_language,
                'description_' . $this->source_language,
                'waffle',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'ref' => Yii::t('model', 'Ref'),
                'list_name' => Yii::t('model', 'List name'),
                'property_name' => Yii::t('model', 'Property name'),
                'possessive' => Yii::t('model', 'Possessive'),
                'choice_format' => Yii::t('model', 'Choice format'),
                'description' => Yii::t('model', 'Description'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'ref' => Yii::t('model', ''),
                'list_name' => Yii::t('model', ''),
                'property_name' => Yii::t('model', ''),
                'possessive' => Yii::t('model', ''),
                'choice_format' => Yii::t('model', ''),
                'description' => Yii::t('model', ''),
            )
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
