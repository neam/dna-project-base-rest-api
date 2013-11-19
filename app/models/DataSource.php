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
            array() //$this->i18nRules()
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
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

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

}
