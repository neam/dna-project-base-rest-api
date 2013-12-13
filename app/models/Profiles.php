<?php

// auto-loading
Yii::setPathOfAlias('Profiles', dirname(__FILE__));
Yii::import('Profiles.*');

class Profiles extends BaseProfiles
{
    // Constants.
    const CAN_TRANSLATE = 1;
    const CANNOT_TRANSLATE = 0;

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
                array('language1', 'required', 'on' => 'update'),
                array('public_profile, ' . implode(', ', I18nColumnsBehavior::attributeColumns('can_translate_to')), 'safe', 'on' => 'toggle'),
            )
        );
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'language1' => Yii::t('model', 'Language #1'),
            'language2' => Yii::t('model', 'Language #2'),
            'language3' => Yii::t('model', 'Language #3'),
            'language4' => Yii::t('model', 'Language #4'),
            'language5' => Yii::t('model', 'Language #5'),
        ));
    }

    public function relations()
    {
        return array_merge(parent::relations(), array(
            'account' => array(self::BELONGS_TO, 'Account', 'user_id'),
        ));
    }

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }
}
