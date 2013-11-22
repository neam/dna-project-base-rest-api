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

    /**
     * Marks the user to be (un)able to translate content into a given language.
     * @param string $lang the language code (e.g. 'en').
     * @param boolean $can can/cannot translate. Defaults to true.
     * @throws CException if the supplied language code is invalid.
     */
    public function setCanTranslate($lang, $can = true)
    {
        $model = Profiles::model()->findByPk(user()->id);
        $attribute = 'can_translate_to_' . $lang;

        /** @var ActiveRecord $model */
        if ($model->hasAttribute($attribute)) {
            $model->{$attribute} = $can ? self::CAN_TRANSLATE : self::CANNOT_TRANSLATE;
            $model->save(false);
        } else {
            throw new CException('Invalid language: ' . $lang);
        }
    }

    /**
     * Checks if the user is able to translate content into a given language.
     * @param string $lang the language code (e.g. 'en').
     * @return boolean
     * @throws CException if the supplied language code is invalid.
     */
    public function canTranslate($lang)
    {
        $model = Profiles::model()->findByPk(user()->id);
        $attribute = 'can_translate_to_' . $lang;

        /** @var Profiles $model */
        if ($model->hasAttribute($attribute)) {
            return ((int) $model->{$attribute} === self::CAN_TRANSLATE) ? true : false;
        } else {
            return false;
        }
    }
}
