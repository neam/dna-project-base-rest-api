<?php

/**
 * This is the model base class for the table "waffle_tag".
 *
 * Columns in table "waffle_tag" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $ref
 * @property string $_name
 * @property string $_short_name
 * @property string $_description
 * @property string $waffle_id
 * @property string $created
 * @property string $modified
 * @property string $waffle_tag_id
 *
 * Relations of table "waffle_tag" available as properties of the model:
 * @property WaffleTag $waffleTag
 * @property WaffleTag[] $waffleTags
 * @property Waffle $waffle
 */
abstract class BaseWaffleTag extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'waffle_tag';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('waffle_tag_id', 'required'),
                array('version, ref, _name, _short_name, _description, waffle_id, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('ref, _name, _short_name', 'length', 'max' => 255),
                array('waffle_id, waffle_tag_id', 'length', 'max' => 20),
                array('_description, created, modified', 'safe'),
                array('id, version, ref, _name, _short_name, _description, waffle_id, created, modified, waffle_tag_id', 'safe', 'on' => 'search'),
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
                'waffleTag' => array(self::BELONGS_TO, 'WaffleTag', 'waffle_tag_id'),
                'waffleTags' => array(self::HAS_MANY, 'WaffleTag', 'waffle_tag_id'),
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
            'waffle_tag_id' => Yii::t('model', 'Waffle Tag'),
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
        $criteria->compare('t.waffle_tag_id', $this->waffle_tag_id);


        return $criteria;

    }

}
