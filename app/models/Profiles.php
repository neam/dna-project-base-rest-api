<?php

// auto-loading
Yii::setPathOfAlias('Profiles', dirname(__FILE__));
Yii::import('Profiles.*');

class Profiles extends BaseProfiles
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
                array('public_profile, ' . implode(', ', I18nColumnsBehavior::attributeColumns('can_translate_to')), 'safe', 'on' => 'toggle'),
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
