<?php

/**
 * This is the model base class for the table "waffle_indicator".
 *
 * Columns in table "waffle_indicator" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $ref
 * @property string $_name
 * @property string $_short_name
 * @property string $_description
 * @property string $waffle_id
 * @property string $created
 * @property string $modified
 *
 * Relations of table "waffle_indicator" available as properties of the model:
 * @property Waffle $waffle
 */
abstract class BaseWaffleIndicator extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'waffle_indicator';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, ref, _name, _short_name, _description, waffle_id, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('ref, _name, _short_name, created, modified', 'length', 'max' => 255),
                array('waffle_id', 'length', 'max' => 20),
                array('_description', 'safe'),
                array('id, version, ref, _name, _short_name, _description, waffle_id, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->ref;
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
                'waffle' => array(self::BELONGS_TO, 'Waffle', 'waffle_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'ref' => Yii::t('model', 'Ref'),
            '_name' => Yii::t('model', 'Name'),
            '_short_name' => Yii::t('model', 'Short Name'),
            '_description' => Yii::t('model', 'Description'),
            'waffle_id' => Yii::t('model', 'Waffle'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.ref', $this->ref, true);
        $criteria->compare('t._name', $this->_name, true);
        $criteria->compare('t._short_name', $this->_short_name, true);
        $criteria->compare('t._description', $this->_description, true);
        $criteria->compare('t.waffle_id', $this->waffle_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
