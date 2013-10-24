<?php

// auto-loading
Yii::setPathOfAlias('Snapshot', dirname(__FILE__));
Yii::import('Snapshot.*');

class Snapshot extends BaseSnapshot
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
                'parentChapters' => array(self::HAS_MANY, 'Chapter', array('id' => 'node_id'), 'through' => 'inNodes'),
            )
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('slug', 'required', 'on' => 'draft,preview,public'),
                array('link', 'required', 'on' => 'preview,public'),
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
