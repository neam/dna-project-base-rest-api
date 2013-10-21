<?php

/**
 * This is the model base class for the table "profiles".
 *
 * Columns in table "profiles" available as properties of the model:
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 *
 * Relations of table "profiles" available as properties of the model:
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
                array('first_name, last_name', 'default', 'setOnEmpty' => true, 'value' => null),
                array('first_name, last_name', 'length', 'max' => 255),
                array('user_id, first_name, last_name', 'safe', 'on' => 'search'),
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
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'user_id' => Yii::t('model', 'User'),
            'first_name' => Yii::t('model', 'First Name'),
            'last_name' => Yii::t('model', 'Last Name'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('t.first_name', $this->first_name, true);
        $criteria->compare('t.last_name', $this->last_name, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
