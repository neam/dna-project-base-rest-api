<?php

// auto-loading
Yii::setPathOfAlias('Account', dirname(__FILE__));
Yii::import('Account.*');

class Account extends BaseAccount
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
            parent::rules()
            , array(
                array('username', 'unique', 'message' => Yii::t('app', 'Username already exists.')),
                array('email', 'unique', 'message' => Yii::t('app', 'Email address already exists.')),
                array('email', 'email'),
                array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => Yii::t('app', 'Incorrect symbols (A-z0-9).')),
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
