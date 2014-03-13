<?php

// auto-loading
Yii::setPathOfAlias('WaffleCategoryElement', dirname(__FILE__));
Yii::import('WaffleCategoryElement.*');

class WaffleCategoryElement extends BaseWaffleCategoryElement
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
        return (string) !empty($this->name) ? $this->name : "WaffleCategoryElement #" . $this->id;
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

                array('name', 'length', 'min' => 3, 'max' => 200),
                array('short_name', 'length', 'min' => 3, 'max' => 50),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
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
                'name',
            ),
            'reviewable' => array(
                'short_name',
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
                'name',
                'short_name',
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
                'name' => Yii::t('model', 'Name'),
                'short_name' => Yii::t('model', 'Short name'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'ref' => Yii::t('model', ''),
                'name' => Yii::t('model', ''),
                'short_name' => Yii::t('model', ''),
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
