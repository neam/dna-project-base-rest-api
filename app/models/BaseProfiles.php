<?php

/**
 * This is the model base class for the table "profiles".
 *
 * Columns in table "profiles" available as properties of the model:
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $public_profile
 * @property integer $picture_media_id
 * @property string $website
 * @property integer $others_may_contact_me
 * @property string $about
 * @property string $lives_in
 * @property integer $can_translate_to_en
 * @property integer $can_translate_to_es
 * @property integer $can_translate_to_fa
 * @property integer $can_translate_to_hi
 * @property integer $can_translate_to_pt
 * @property integer $can_translate_to_sv
 * @property integer $can_translate_to_cn
 * @property integer $can_translate_to_de
 *
 * Relations of table "profiles" available as properties of the model:
 * @property P3Media $pictureMedia
 * @property Users $user
 */
abstract class BaseProfiles extends ActiveRecord
{
    // Constants.
    const CAN_TRANSLATE = 1;
    const CANNOT_TRANSLATE = 0;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'profiles';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('first_name, last_name, public_profile, picture_media_id, website, others_may_contact_me, about, lives_in, can_translate_to_en, can_translate_to_es, can_translate_to_fa, can_translate_to_hi, can_translate_to_pt, can_translate_to_sv, can_translate_to_cn, can_translate_to_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('public_profile, picture_media_id, others_may_contact_me, can_translate_to_en, can_translate_to_es, can_translate_to_fa, can_translate_to_hi, can_translate_to_pt, can_translate_to_sv, can_translate_to_cn, can_translate_to_de', 'numerical', 'integerOnly' => true),
                array('first_name, last_name, website, lives_in', 'length', 'max' => 255),
                array('about', 'safe'),
                array('user_id, first_name, last_name, public_profile, picture_media_id, website, others_may_contact_me, about, lives_in, can_translate_to_en, can_translate_to_es, can_translate_to_fa, can_translate_to_hi, can_translate_to_pt, can_translate_to_sv, can_translate_to_cn, can_translate_to_de', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->first_name;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(), array(
                'pictureMedia' => array(self::BELONGS_TO, 'P3Media', 'picture_media_id'),
                'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'user_id' => Yii::t('model', 'User'),
            'first_name' => Yii::t('model', 'First Name'),
            'last_name' => Yii::t('model', 'Last Name'),
            'public_profile' => Yii::t('model', 'Public Profile'),
            'picture_media_id' => Yii::t('model', 'Picture Media'),
            'website' => Yii::t('model', 'Website'),
            'others_may_contact_me' => Yii::t('model', 'Others May Contact Me'),
            'about' => Yii::t('model', 'About'),
            'lives_in' => Yii::t('model', 'Lives In'),
            'can_translate_to_en' => Yii::t('model', 'Can Translate To En'),
            'can_translate_to_es' => Yii::t('model', 'Can Translate To Es'),
            'can_translate_to_fa' => Yii::t('model', 'Can Translate To Fa'),
            'can_translate_to_hi' => Yii::t('model', 'Can Translate To Hi'),
            'can_translate_to_pt' => Yii::t('model', 'Can Translate To Pt'),
            'can_translate_to_sv' => Yii::t('model', 'Can Translate To Sv'),
            'can_translate_to_cn' => Yii::t('model', 'Can Translate To Cn'),
            'can_translate_to_de' => Yii::t('model', 'Can Translate To De'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('t.first_name', $this->first_name, true);
        $criteria->compare('t.last_name', $this->last_name, true);
        $criteria->compare('t.public_profile', $this->public_profile);
        $criteria->compare('t.picture_media_id', $this->picture_media_id);
        $criteria->compare('t.website', $this->website, true);
        $criteria->compare('t.others_may_contact_me', $this->others_may_contact_me);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.lives_in', $this->lives_in, true);
        $criteria->compare('t.can_translate_to_en', $this->can_translate_to_en);
        $criteria->compare('t.can_translate_to_es', $this->can_translate_to_es);
        $criteria->compare('t.can_translate_to_fa', $this->can_translate_to_fa);
        $criteria->compare('t.can_translate_to_hi', $this->can_translate_to_hi);
        $criteria->compare('t.can_translate_to_pt', $this->can_translate_to_pt);
        $criteria->compare('t.can_translate_to_sv', $this->can_translate_to_sv);
        $criteria->compare('t.can_translate_to_cn', $this->can_translate_to_cn);
        $criteria->compare('t.can_translate_to_de', $this->can_translate_to_de);


        return $criteria;

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
