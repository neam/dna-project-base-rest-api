<?php

// auto-loading
Yii::setPathOfAlias('DataSource', dirname(__FILE__));
Yii::import('DataSource.*');

class DataSource extends BaseDataSource
{

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return parent::getItemLabel();
    }

    public function rules()
    {
        $return = array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft,preview,public'),
                array('title_' . $this->source_language . '', 'required', 'on' => 'preview,public'),
                array('about_' . $this->source_language . '', 'required', 'on' => 'public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('slug_' . $this->source_language . ', title_' . $this->source_language . ', about_' . $this->source_language . ', link', 'safe', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('logo_media_id, mini_logo_media_id', 'safe', 'on' => 'draft-step_logo,preview-step_logo,public-step_logo,step_logo'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . '', 'required', 'on' => 'preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'required', 'on' => 'public-step_info,step_info'),
                array('link', 'required', 'on' => 'step_info'),
                array('logo_media_id, mini_logo_media_id', 'required', 'on' => 'step_logo'),

                // Ordinary validation rules
                array('about_' . $this->source_language, 'length', 'min' => 3, 'max' => 66),
            ),
            $this->i18nRules()
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function i18nRules()
    {
        $i18nRules = array();
        foreach (Yii::app()->params["languages"] as $lang => $label) {
            $i18nRules[] = array('title_' . $lang . ', slug_' . $lang . ', about_' . $lang, 'safe', 'on' => 'into_' . $lang . '-step_info');
            $i18nRules[] = array('title_' . $this->source_language . ', slug_' . $this->source_language . ', about_' . $this->source_language, 'safe', 'on' => 'into_' . $lang . '-step_info');
        }
        return $i18nRules;
    }

    public function flowSteps()
    {
        return array(
            'draft' => array(
                'info' => array(
                    'icon' => 'edit',
                ),
            ),
            'preview' => array(),
            'public' => array(),
            'all' => array(
                'logo' => array(
                    'icon' => 'edit',
                ),
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
                'title' => Yii::t('model', 'The name of an official datasource. For Example: UN Populaiton Division, '),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines'),
                'about' => Yii::t('model', 'Use the citaiton suggested by the data provider. Remember to clarify that data may have been modified when modeling it into the larged dataset.'),
                'logo_media_id' => Yii::t('model', 'Don\'t forget that official logos requires agreements to be used.'),
                'mini_logo_media_id' => Yii::t('model', 'For use inside visualizaitons, this logo should be very small, and indicate data origin.'),
                'link' => Yii::t('model', 'A link to the datasource\'s website. Preferably a deep link to the sub-page where the data can be accessed. link to the offical website. For example the UN migraiton data is on this page: http://esa.un.org/unmigration/migrantstocks2013.htm?msax'),
            )
        );
    }

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

}
