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
 * @property string $language1
 * @property string $language2
 * @property string $language3
 * @property string $language4
 * @property string $language5
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
                array('first_name, last_name, public_profile, picture_media_id, website, others_may_contact_me, about, lives_in, language1, language2, language3, language4, language5', 'default', 'setOnEmpty' => true, 'value' => null),
                array('public_profile, picture_media_id, others_may_contact_me', 'numerical', 'integerOnly' => true),
                array('first_name, last_name, website, lives_in', 'length', 'max' => 255),
                array('language1, language2, language3, language4, language5', 'length', 'max' => 10),
                array('about', 'safe'),
                array('user_id, first_name, last_name, public_profile, picture_media_id, website, others_may_contact_me, about, lives_in, language1, language2, language3, language4, language5', 'safe', 'on' => 'search'),
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
            'language1' => Yii::t('model', 'Language1'),
            'language2' => Yii::t('model', 'Language2'),
            'language3' => Yii::t('model', 'Language3'),
            'language4' => Yii::t('model', 'Language4'),
            'language5' => Yii::t('model', 'Language5'),
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
        $criteria->compare('t.language1', $this->language1, true);
        $criteria->compare('t.language2', $this->language2, true);
        $criteria->compare('t.language3', $this->language3, true);
        $criteria->compare('t.language4', $this->language4, true);
        $criteria->compare('t.language5', $this->language5, true);


        return $criteria;

    }

}
