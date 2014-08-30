<?php

// auto-loading
Yii::setPathOfAlias('Profile', dirname(__FILE__));
Yii::import('Profile.*');

class Profile extends BaseProfile
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
            parent::rules(), array()
        );
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'language1' => Yii::t('model', 'First Language'),
            'language2' => Yii::t('model', 'Second Language'),
            'language3' => Yii::t('model', 'Third Language'),
            'language4' => Yii::t('model', 'Fourth Language'),
            'language5' => Yii::t('model', 'Fifth Language'),
            'picture_media_id' => Yii::t('model', 'Profile Picture'),
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
     * Override magic isset so that fullName does not appear to be set when it consists
     * of only a single space, that happens when both first_name and last_name is not set
     */
    public function __isset($attribute)
    {
        // The method getFullName below
        if ($attribute === 'fullName') {
            return $this->getFullName() !== ' ';
        }
        return parent::__isset($attribute);
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

        if (!empty($this->language1)) {
            $languages[$this->language1] = $languagesAvailable[$this->language1];
        }
        if (!empty($this->language2)) {
            $languages[$this->language2] = $languagesAvailable[$this->language2];
        }
        if (!empty($this->language3)) {
            $languages[$this->language3] = $languagesAvailable[$this->language3];
        }
        if (!empty($this->language4)) {
            $languages[$this->language4] = $languagesAvailable[$this->language4];
        }
        if (!empty($this->language5)) {
            $languages[$this->language5] = $languagesAvailable[$this->language5];
        }

        if ($asString) {
            return implode(', ', $languages);
        } else {
            return $languages;
        }
    }

    /**
     * Returns the languages the user is able to translate into.
     * @return array
     */
    public function getTranslatableLanguages()
    {
        return Yii::app()->user->isAdmin()
            ? LanguageHelper::getLanguageList()
            : $this->getLanguages();
    }

    public function getPictures()
    {
        return $this->getP3Media(array('image/jpeg', 'image/png'), 'file', true);
    }

    public function getPictureOptions()
    {
        return $this->getOptions($this->getPictures());
    }

    /**
     * Renders the user's profile picture.
     * @param string $p3preset the P3Media preset. Defaults to 'dashboard-profile-picture'.
     * @return string the HTML.
     */
    public function renderPicture($p3preset = 'user-profile-picture')
    {
        return isset($this->picture_media_id)
            ? $this->pictureMedia->image($p3preset)
            : TbHtml::image('http://placehold.it/160x160');
    }
}
