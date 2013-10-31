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

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'exercises' => array(self::HAS_MANY, 'Exercise', array('id' => 'node_id'), 'through' => 'outNodes'),
                'snapshots' => array(self::HAS_MANY, 'Snapshot', array('id' => 'node_id'), 'through' => 'outNodes'),
            )
        );
    }

    // todo
    public $exercises_to_add;
    public $snapshots_to_add;
    public $videos_to_add;

    public $exercises_to_remove;
    public $snapshots_to_remove;
    public $videos_to_remove;

    public $thumbnail;
    public $video;
    public $teachers_guide;
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

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'title_en' => Yii::t('model', 'English Title'),
            )
        );
    }

    public function getAttributeHint($key)
    {
        $a = $this->attributeHints();
        return $a[$key];
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title_en' => Yii::t('model', 'Chapter titles are descriptive with common language. Mentioning what data, geography and time is covered. '),
                'slug_en' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populatoins on the map.'),
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
