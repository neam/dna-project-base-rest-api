<?php

// auto-loading
Yii::setPathOfAlias('WafflePublisher', dirname(__FILE__));
Yii::import('WafflePublisher.*');

class WafflePublisher extends BaseWafflePublisher
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
        return (string) !empty($this->name) ? $this->name : "WafflePublisher #" . $this->id;
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
                'name_' . $this->source_language,
            ),
            'reviewable' => array(),
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
                'name_' . $this->source_language,
                'description_' . $this->source_language,
                'url',
            ),
            'logo' => array(
                'image_small_media_id',
                'image_large_media_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'logo' => Yii::t('app', 'Logo'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'ref' => Yii::t('model', 'Ref'),
                'name' => Yii::t('model', 'Name'),
                'description' => Yii::t('model', 'Short name'),
                'url' => Yii::t('model', 'URL'),
                'image_small_media_id' => Yii::t('model', 'Mini icon'),
                'image_large_media_id' => Yii::t('model', 'Icon'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'ref' => Yii::t('model', ''),
                'name' => Yii::t('model', 'The waffle publisher name'),
                'description' => Yii::t('model', ''),
                'url' => Yii::t('model', ''),
                'image_small' => Yii::t('model', 'For use inside visualizations, this logo should be very small, and indicate data origin.'),
                'image_large' => Yii::t('model', 'Don\'t forget that official logos requires agreements to be used.'),
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
