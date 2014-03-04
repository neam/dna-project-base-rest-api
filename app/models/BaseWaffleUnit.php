<?php

/**
 * This is the model base class for the table "waffle_unit".
 *
 * Columns in table "waffle_unit" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $ref
 * @property string $_name
 * @property string $_short_name
 * @property string $_description
 * @property string $waffle_id
 * @property string $created
 * @property string $modified
 * @property string $waffle_unit_id
 *
 * Relations of table "waffle_unit" available as properties of the model:
 * @property WaffleUnit $waffleUnit
 * @property WaffleUnit[] $waffleUnits
 * @property Waffle $waffle
 */
abstract class BaseWaffleUnit extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'waffle_unit';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('waffle_unit_id', 'required'),
                array('version, ref, _name, _short_name, _description, waffle_id, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('ref, _name, _short_name', 'length', 'max' => 255),
                array('waffle_id, waffle_unit_id', 'length', 'max' => 20),
                array('_description, created, modified', 'safe'),
                array('id, version, ref, _name, _short_name, _description, waffle_id, created, modified, waffle_unit_id', 'safe', 'on' => 'search'),
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
                'waffleUnit' => array(self::BELONGS_TO, 'WaffleUnit', 'waffle_unit_id'),
                'waffleUnits' => array(self::HAS_MANY, 'WaffleUnit', 'waffle_unit_id'),
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
            'waffle_unit_id' => Yii::t('model', 'Waffle Unit'),
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
        $criteria->compare('t.waffle_unit_id', $this->waffle_unit_id);


        return $criteria;

    }

}
