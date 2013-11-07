<?php

// auto-loading
Yii::setPathOfAlias('VideoFile', dirname(__FILE__));
Yii::import('VideoFile.*');

class VideoFile extends BaseVideoFile
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

    public $clip;
    public $thumbnail;

    public function rules()
    {
        return array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('title, slug', 'required', 'on' => 'draft,preview,public'),
                array('clip', 'required', 'on' => 'preview,public'),
                array('about, thumbnail, subtitles', 'required', 'on' => 'public'),

                // Define step-dependent fields
                array('title, slug', 'safe', 'on' => 'step_title'),
                array('original_media_id', 'safe', 'on' => 'step_clip'),
                array('about', 'safe', 'on' => 'step_about'),
                array('subtitles', 'safe', 'on' => 'step_subtitles'),
                array('thumbnail_media_id', 'safe', 'on' => 'step_thumbnail'),

                array('title, slug', 'required', 'on' => 'step_title'),
                array('original_media_id', 'required', 'on' => 'step_clip'),
                array('about', 'required', 'on' => 'step_about'),
                array('subtitles', 'required', 'on' => 'step_subtitles'),
                array('thumbnail_media_id', 'required', 'on' => 'step_thumbnail'),

                // Ordinary validation rules
                array('thumbnail', 'validateThumbnail', 'on' => 'public'),
                array('clip', 'validateClip', 'on' => 'public'),
                array('about', 'length', 'min' => 10, 'max' => 200),
                array('subtitles', 'validateSubtitles', 'on' => 'public'),
            )
        );
    }

    public function validateThumbnail()
    {
        return !is_null($this->thumbnail_media_id);
    }

    public function validateClip()
    {
        return !is_null($this->original_media_id);
    }

    public function validateSubtitles()
    {
        return true;
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
                'title' => array(
                    'icon' => 'edit',
                ),
            ),
            'preview' => array(
                'clip' => array(
                    'icon' => 'edit',
                ),
            ),
            'public' => array(
                'about' => array(
                    'icon' => 'edit',
                ),
                'thumbnail' => array(
                    'icon' => 'edit',
                ),
                'subtitles' => array(
                    'icon' => 'edit',
                ),
            ),
            'all' => array(),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'about' => Yii::t('app', 'About'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'clip' => Yii::t('app', 'Clip'),
            'subtitles' => Yii::t('app', 'Subtitles'),
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
                'title' => Yii::t('model', ''),
                'slug' => Yii::t('model', ''),
                'clip' => Yii::t('model', ''),
                'about' => Yii::t('model', ''),
                'thumbnail' => Yii::t('model', ''),
                'subtitles' => Yii::t('model', ''),

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
