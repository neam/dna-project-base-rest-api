<?php

/**
 * This is the model base class for the table "waffle_category".
 *
 * Columns in table "waffle_category" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $ref
 * @property string $_list_name
 * @property string $_property_name
 * @property string $_possessive
 * @property string $_choice_format
 * @property string $_description
 * @property string $waffle_id
 * @property string $created
 * @property string $modified
 * @property integer $owner_id
 * @property string $node_id
 * @property string $waffle_category_qa_state_id
 *
 * Relations of table "waffle_category" available as properties of the model:
 * @property Account $owner
 * @property Node $node
 * @property Waffle $waffle
 * @property WaffleCategory $clonedFrom
 * @property WaffleCategory[] $waffleCategories
 * @property WaffleCategoryQaState $waffleCategoryQaState
 * @property WaffleCategoryThing[] $waffleCategoryThings
 */
abstract class BaseWaffleCategory extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'waffle_category';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, ref, _list_name, _property_name, _possessive, _choice_format, _description, waffle_id, created, modified, owner_id, node_id, waffle_category_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, owner_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, waffle_id, node_id, waffle_category_qa_state_id', 'length', 'max' => 20),
                array('ref, _list_name, _property_name, _possessive', 'length', 'max' => 255),
                array('_choice_format, _description, created, modified', 'safe'),
                array('id, version, cloned_from_id, ref, _list_name, _property_name, _possessive, _choice_format, _description, waffle_id, created, modified, owner_id, node_id, waffle_category_qa_state_id', 'safe', 'on' => 'search'),
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
                'owner' => array(self::BELONGS_TO, 'Account', 'owner_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'waffle' => array(self::BELONGS_TO, 'Waffle', 'waffle_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'WaffleCategory', 'cloned_from_id'),
                'waffleCategories' => array(self::HAS_MANY, 'WaffleCategory', 'cloned_from_id'),
                'waffleCategoryQaState' => array(self::BELONGS_TO, 'WaffleCategoryQaState', 'waffle_category_qa_state_id'),
                'waffleCategoryThings' => array(self::HAS_MANY, 'WaffleCategoryThing', 'waffle_category_id'),
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
            '_list_name' => Yii::t('model', 'List Name'),
            '_property_name' => Yii::t('model', 'Property Name'),
            '_possessive' => Yii::t('model', 'Possessive'),
            '_choice_format' => Yii::t('model', 'Choice Format'),
            '_description' => Yii::t('model', 'Description'),
            'waffle_id' => Yii::t('model', 'Waffle'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'waffle_category_qa_state_id' => Yii::t('model', 'Waffle Category Qa State'),
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
        $criteria->compare('t._list_name', $this->_list_name, true);
        $criteria->compare('t._property_name', $this->_property_name, true);
        $criteria->compare('t._possessive', $this->_possessive, true);
        $criteria->compare('t._choice_format', $this->_choice_format, true);
        $criteria->compare('t._description', $this->_description, true);
        $criteria->compare('t.waffle_id', $this->waffle_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.waffle_category_qa_state_id', $this->waffle_category_qa_state_id);


        return $criteria;

    }

}
