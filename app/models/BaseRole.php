<?php

/**
 * This is the model base class for the table "role".
 *
 * Columns in table "role" available as properties of the model:
 * @property string $id
 * @property string $title
 *
 * Relations of table "role" available as properties of the model:
 * @property GroupHasAccount[] $groupHasAccounts
 */
abstract class BaseRole extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'role';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title', 'default', 'setOnEmpty' => true, 'value' => null),
                array('title', 'length', 'max' => 255),
                array('id, title', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->title;
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
                'groupHasAccounts' => array(self::HAS_MANY, 'GroupHasAccount', 'role_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'title' => Yii::t('model', 'Title'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title', $this->title, true);


        return $criteria;

    }

}
