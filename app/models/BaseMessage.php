<?php

/**
 * This is the model base class for the table "Message".
 *
 * Columns in table "Message" available as properties of the model:
 * @property integer $id
 * @property string $language
 * @property string $translation
 *
 * Relations of table "Message" available as properties of the model:
 * @property SourceMessage $id0
 */
abstract class BaseMessage extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'Message';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('id, language, translation', 'default', 'setOnEmpty' => true, 'value' => null),
                array('id', 'numerical', 'integerOnly' => true),
                array('language', 'length', 'max' => 16),
                array('translation', 'safe'),
                array('id, language, translation', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->translation;
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
                'id0' => array(self::BELONGS_TO, 'SourceMessage', 'id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'language' => Yii::t('model', 'Language'),
            'translation' => Yii::t('model', 'Translation'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.language', $this->language, true);
        $criteria->compare('t.translation', $this->translation, true);


        return $criteria;

    }

}
