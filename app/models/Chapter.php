<?php

// auto-loading
Yii::setPathOfAlias('Chapter', dirname(__FILE__));
Yii::import('Chapter.*');

class Chapter extends BaseChapter
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

    // todo
    public $thumbnail;
    public $video;
    public $teachers_guide;
    public $exercises;
    public $snapshots;
    public $credits;

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title, slug', 'required', 'on' => 'draft,preview,public'),
                array('thumbnail, about, video, teachers_guide, exercises, snapshots, credits', 'required', 'on' => 'public'),
            )
        );
    }

}
