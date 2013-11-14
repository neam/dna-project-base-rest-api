<?php

// auto-loading
Yii::setPathOfAlias('PoFile', dirname(__FILE__));
Yii::import('PoFile.*');

class PoFile extends BasePoFile
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
        return (string) $this->title;
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
            array()
        );
    }

    public $original_media_id;
    public $processed_media_id;

    public function rules()
    {
        return array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('title, original_media_id', 'required', 'on' => 'draft,preview,public'),
                array('about', 'required', 'on' => 'public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('title, original_media_id', 'safe', 'on' => 'draft-step_file,preview-step_file,public-step_file,step_file'),
                array('about', 'safe', 'on' => 'public-step_file,step_file'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('title, original_media_id', 'required', 'on' => 'step_file'),
                array('about', 'required', 'on' => 'step_file'),

                array('title', 'length', 'min' => 10, 'max' => 200),
                array('about', 'length', 'min' => 3, 'max' => 400),
                array('original_media_id', 'validateFile', 'on' => 'public'),
            )
        );
    }

    public function validateFile()
    {
        return !is_null($this->original_media_id);
    }

    /**
     * TODO html-length...
     * @return bool
     */
    public function htmlLength()
    {
        return true;
    }

    public function flowSteps()
    {
        return array(
            'draft' => array(
                'file' => array(
                    'icon' => 'edit',
                ),
            ),
            'preview' => array(),
            'public' => array(),
            'all' => array(),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'file' => Yii::t('app', 'File'),
            'mandatory_complete' => Yii::t('app', 'Mandatory fields filled'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'about' => Yii::t('model', 'About'),
                'file' => Yii::t('model', 'File'),
            )
        );
    }

    public function getAttributeHint($key)
    {
        $a = $this->attributeHints();
        if (isset($a[$key])) {
            return $a[$key];
        }
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Title'),
                'about' => Yii::t('model', 'What is this .po file for?'),
                'file' => Yii::t('model', 'The actual file'),
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
