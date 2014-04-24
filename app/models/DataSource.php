<?php

// auto-loading
Yii::setPathOfAlias('DataSource', dirname(__FILE__));
Yii::import('DataSource.*');

class DataSource extends BaseDataSource
{

    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'A data source is refering to a provider of data, which may be an individual, an institution, Wikipedia, a governmental body, UNICEF, a company or whoever produced the data.');
        return parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "DataSource #" . $this->id;
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

                // Ordinary validation rules
                array('about_' . $this->source_language, 'length', 'min' => 3, 'max' => 66),

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
                'slug_' . $this->source_language,
            ),
            'reviewable' => array(
                'title_' . $this->source_language,
            ),
            'publishable' => array(
                'about_' . $this->source_language,
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
                'title_' . $this->source_language,
                'slug_' . $this->source_language,
                'about_' . $this->source_language,
            ),
            'logo' => array(
                'logo_media_id',
                'mini_logo_media_id',
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
                'title' => Yii::t('model', 'Title'),
                'title_en' => Yii::t('model', 'English Title'),
                'slug' => Yii::t('model', 'Slug'),
                'slug_en' => Yii::t('model', 'English Slug'),
                'about' => Yii::t('model', 'About'),
                'about_en' => Yii::t('model', 'English About'),
                'logo' => Yii::t('model', 'Icon'),
                'mini_logo' => Yii::t('model', 'Mini icon'),
                'link' => Yii::t('model', 'Link'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'The name of an official datasource. For Example: UN Population Division, '),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines'),
                'about' => Yii::t('model', 'Use the citation suggested by the data provider. Remember to clarify that data may have been modified when modeling it into the larged dataset.'),
                'logo_media_id' => Yii::t('model', 'Don\'t forget that official logos requires agreements to be used.'),
                'mini_logo_media_id' => Yii::t('model', 'For use inside visualizations, this logo should be very small, and indicate data origin.'),
                'link' => Yii::t('model', 'A link to the datasource\'s website. Preferably a deep link to the sub-page where the data can be accessed. link to the offical website. For example the UN migration data is on this page: http://esa.un.org/unmigration/migrantstocks2013.htm?msax'),
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
