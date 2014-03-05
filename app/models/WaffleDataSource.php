<?php

// auto-loading
Yii::setPathOfAlias('WaffleDataSource', dirname(__FILE__));
Yii::import('WaffleDataSource.*');

class WaffleDataSource extends BaseWaffleDataSource
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
        return (string) !empty($this->title) ? $this->title : "WaffleDataSource #" . $this->id;
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
                'title',
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
                'link',
            ),
            'logo' => array(
                'image_small',
                'image_large',
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
                'short_name' => Yii::t('model', 'Short name'),
                'link' => Yii::t('model', 'Link'),
                'image_small' => Yii::t('model', 'Mini icon'),
                'image_large' => Yii::t('model', 'Icon'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'ref' => Yii::t('model', ''),
                'name' => Yii::t('model', 'The waffle category name'),
                'short_name' => Yii::t('model', ''),
                'link' => Yii::t('model', 'A link to the datasource\'s website. Preferably a deep link to the sub-page where the data can be accessed. link to the offical website. For example the UN migration data is on this page: http://esa.un.org/unmigration/migrantstocks2013.htm?msax'),
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
