<?php

/**
 * This is the model base class for the table "SourceMessage".
 *
 * Columns in table "SourceMessage" available as properties of the model:
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * Relations of table "SourceMessage" available as properties of the model:
 * @property Message[] $messages
 */
abstract class BaseSourceMessage extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'SourceMessage';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('category, message', 'default', 'setOnEmpty' => true, 'value' => null),
                array('category', 'length', 'max' => 255),
                array('message', 'safe'),
                array('id, category, message', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->category;
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
                'messages' => array(self::HAS_MANY, 'Message', 'id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'category' => Yii::t('model', 'Category'),
            'message' => Yii::t('model', 'Message'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.category', $this->category, true);
        $criteria->compare('t.message', $this->message, true);


        return $criteria;

    }

}
