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
 * @property integer $can_translate_to
 *
 * Relations of table "profiles" available as properties of the model:
 * @property P3Media $pictureMedia
 * @property Users $user
 */
abstract class BaseProfiles extends ActiveRecord
{

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
                array('first_name, last_name, public_profile, picture_media_id, website, others_may_contact_me, about, lives_in, can_translate_to', 'default', 'setOnEmpty' => true, 'value' => null),
                array('public_profile, picture_media_id, others_may_contact_me, can_translate_to', 'numerical', 'integerOnly' => true),
                array('first_name, last_name, website, lives_in', 'length', 'max' => 255),
                array('about', 'safe'),
                array('user_id, first_name, last_name, public_profile, picture_media_id, website, others_may_contact_me, about, lives_in, can_translate_to', 'safe', 'on' => 'search'),
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
            'can_translate_to' => Yii::t('model', 'Can Translate To'),
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
        $criteria->compare('t.can_translate_to', $this->can_translate_to);


        return $criteria;

    }

}
