<?php

// auto-loading
Yii::setPathOfAlias('ExamQuestion', dirname(__FILE__));
Yii::import('ExamQuestion.*');

class ExamQuestion extends BaseExamQuestion
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

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('slug', 'required', 'on' => 'draft,preview,public'),
                array('question', 'required', 'on' => 'preview,public'),
                array('source', 'required', 'on' => 'public'),
            )
        );
    }

}
