<?php

// auto-loading
Yii::setPathOfAlias('VectorGraphic', dirname(__FILE__));
Yii::import('VectorGraphic.*');

class VectorGraphic extends BaseVectorGraphic
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

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'dataChunks' => array(self::HAS_MANY, 'DataChunk', array('id' => 'node_id'), 'through' => 'outNodes'),
            )
        );
    }

    public function rules()
    {
        $return = array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft,preview,public'),
                array('title_' . $this->source_language . ', original_media_id, processed_media_id_' . $this->source_language . '', 'required', 'on' => 'preview,public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('slug_' . $this->source_language . '', 'safe', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . '', 'safe', 'on' => 'preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'safe', 'on' => 'step_info'),
                array('original_media_id', 'safe', 'on' => 'preview-step_file,public-step_file,step_file'),
                array('dataChunks', 'safe', 'on' => 'preview-step_data,public-step_data,step_data'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . '', 'required', 'on' => 'preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'required', 'on' => 'step_info'),
                array('original_media_id, processed_media_id_' . $this->source_language . '', 'required', 'on' => 'preview-step_file,public-step_file,step_file'),
                array('dataChunks', 'required', 'on' => 'step_data'),

                // Ordinary validation rules
                array('title_' . $this->source_language, 'length', 'min' => 3, 'max' => 120),
                array('dataChunks', 'validateDataChunks'),
                array('about_' . $this->source_language, 'length', 'min' => 3, 'max' => 250),
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

    public function validateDataChunks()
    {
        return count($this->dataChunks) <= 100;
    }


    public function flowSteps()
    {
        return array(
            'draft' => array(
                'info' => array(
                    'icon' => 'edit',
                ),
            ),
            'preview' => array(
                'file' => array(
                    'icon' => 'edit',
                ),
            ),
            'public' => array(),
            'all' => array(
                'data' => array(
                    'icon' => 'edit',
                ),
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'file' => Yii::t('app', 'File'),
            'data' => Yii::t('app', 'Data'),
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
                'about_en' => Yii::t('model', 'About (English)'),
                'original_media_id' => Yii::t('model', 'File'),
                'dataChunks' => Yii::t('model', 'Data'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'A name of the vizualization, such as "World Wealth & Health Chart".'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines'),
                'about' => Yii::t('model', 'Describe the content. For example: "High-res poster of all UN-states comparing the health and wealth of all UN-States for the most reasent year."'),
                'original_media_id' => Yii::t('model', 'A Vector Graphic File.'),
                'dataChunks' => Yii::t('model', 'The list of datachunks will be used to generate the datasource slide that appears automatically on the last slide in the slideShow. Datachunks will be listed in order of appearance, each with a title, about, metadata and links to original sources.'),
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
