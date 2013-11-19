<?php

// auto-loading
Yii::setPathOfAlias('DataChunk', dirname(__FILE__));
Yii::import('DataChunk.*');

class DataChunk extends BaseDataChunk
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
        return (string) !empty($this->title) ? $this->title : "DataChunk #" . $this->id;
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
            parent::rules(), array(

                // Define status-dependent fields
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft,preview,public'),
                array('title_' . $this->source_language . '', 'required', 'on' => 'preview,public'),
                array('about_' . $this->source_language . '', 'required', 'on' => 'public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('slug_' . $this->source_language . ', title_' . $this->source_language . ', about_' . $this->source_language . '', 'safe', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('file_media_id', 'safe', 'on' => 'draft-step_data,preview-step_data,public-step_data,step_data'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . '', 'required', 'on' => 'preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'required', 'on' => 'public-step_info,step_info'),
                array('file_media_id', 'required', 'on' => 'step_data'),

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
                'data' => array(
                    'icon' => 'edit',
                ),
                // TODO: v2
                /*
                'related' => array(
                    'icon' => 'edit',
                ),
                */
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'data' => Yii::t('app', 'Data'),
            'related' => Yii::t('app', 'Related'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'title_en' => Yii::t('model', 'English Title'),
                'slug' => Yii::t('model', 'Nice link'),
                'slug_en' => Yii::t('model', 'English Nice link'),
                'about' => Yii::t('model', 'About'),
                'about_en' => Yii::t('model', 'About English'),
                'file' => Yii::t('model', 'File'),
                'metadata' => Yii::t('model', 'Metadata'),
                'metadata_en' => Yii::t('model', 'Metadata English'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'A piece of data with a name. For example: "UN States, GDP per capita"'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines'),
                'about' => Yii::t('model', 'This describes the data mentioning the indicator, the geography and time range.'),
                'file' => Yii::t('model', 'The file contains the latest numbers.'),
                'metadata' => Yii::t('model', 'Enumerates what portions of the file that comes from what source and rougly summarizes how the data was combined.'),
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
