<?php

/**
 * This is the model base class for the table "waffle_unit".
 *
 * Columns in table "waffle_unit" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $ref
 * @property string $_name
 * @property string $_short_name
 * @property string $_description
 * @property string $waffle_id
 * @property string $created
 * @property string $modified
 * @property integer $owner_id
 * @property string $node_id
 * @property string $waffle_unit_qa_state_id
 *
 * Relations of table "waffle_unit" available as properties of the model:
 * @property WaffleUnitQaState $waffleUnitQaState
 * @property Waffle $waffle
 * @property WaffleUnit $clonedFrom
 * @property WaffleUnit[] $waffleUnits
 * @property Account $owner
 * @property Node $node
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
                array('version, cloned_from_id, ref, _name, _short_name, _description, waffle_id, created, modified, owner_id, node_id, waffle_unit_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, owner_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, waffle_id, node_id, waffle_unit_qa_state_id', 'length', 'max' => 20),
                array('ref, _name, _short_name', 'length', 'max' => 255),
                array('_description, created, modified', 'safe'),
                array('id, version, cloned_from_id, ref, _name, _short_name, _description, waffle_id, created, modified, owner_id, node_id, waffle_unit_qa_state_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->cloned_from_id;
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
                'waffleUnitQaState' => array(self::BELONGS_TO, 'WaffleUnitQaState', 'waffle_unit_qa_state_id'),
                'waffle' => array(self::BELONGS_TO, 'Waffle', 'waffle_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'WaffleUnit', 'cloned_from_id'),
                'waffleUnits' => array(self::HAS_MANY, 'WaffleUnit', 'cloned_from_id'),
                'owner' => array(self::BELONGS_TO, 'Account', 'owner_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'ref' => Yii::t('model', 'Ref'),
            '_name' => Yii::t('model', 'Name'),
            '_short_name' => Yii::t('model', 'Short Name'),
            '_description' => Yii::t('model', 'Description'),
            'waffle_id' => Yii::t('model', 'Waffle'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'waffle_unit_qa_state_id' => Yii::t('model', 'Waffle Unit Qa State'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.ref', $this->ref, true);
        $criteria->compare('t._name', $this->_name, true);
        $criteria->compare('t._short_name', $this->_short_name, true);
        $criteria->compare('t._description', $this->_description, true);
        $criteria->compare('t.waffle_id', $this->waffle_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.waffle_unit_qa_state_id', $this->waffle_unit_qa_state_id);


        return $criteria;

    }

}
