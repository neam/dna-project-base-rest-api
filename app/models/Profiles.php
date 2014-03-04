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
            'picture_media_id' => Yii::t('model', 'Profile Image'),
            'website' => Yii::t('model', 'My Website'),
        ));
    }

    public function relations()
    {
        return array_merge(parent::relations(), array(
            'account' => array(self::BELONGS_TO, 'Account', 'user_id'),
        ));
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

    /**
     * Returns the full name.
     * @return string
     */
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Returns the languages the user is able to translate into.
     * @param boolean $asString whether to return a string. Defaults to false (returns an array).
     * @return array|string the languages.
     */
    public function getLanguages($asString = false)
    {
        $languagesAvailable = Html::getLanguages();
        $languages = array();

        if (isset($this->language1)) $languages[$this->language1] = $languagesAvailable[$this->language1];
        if (isset($this->language2)) $languages[$this->language2] = $languagesAvailable[$this->language2];
        if (isset($this->language3)) $languages[$this->language3] = $languagesAvailable[$this->language3];
        if (isset($this->language4)) $languages[$this->language4] = $languagesAvailable[$this->language4];
        if (isset($this->language5)) $languages[$this->language5] = $languagesAvailable[$this->language5];

        if ($asString) {
            return implode(', ', $languages);
        } else {
            return $languages;
        }
    }
}
