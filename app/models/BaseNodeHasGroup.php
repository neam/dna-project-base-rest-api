<?php

/**
 * This is the model base class for the table "node_has_group".
 *
 * Columns in table "node_has_group" available as properties of the model:
 * @property string $id
 * @property string $visibility
 * @property string $node_id
 * @property string $group_id
 * @property string $created
 * @property string $modified
 *
 * Relations of table "node_has_group" available as properties of the model:
 * @property Node $node
 * @property Group $group
 */
abstract class BaseNodeHasGroup extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'node_has_group';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('node_id, group_id', 'required'),
                array('visibility, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('visibility', 'length', 'max' => 255),
                array('node_id, group_id', 'length', 'max' => 20),
                array('created, modified', 'safe'),
                array('id, visibility, node_id, group_id, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->visibility;
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
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'visibility' => Yii::t('model', 'Visibility'),
            'node_id' => Yii::t('model', 'Node'),
            'group_id' => Yii::t('model', 'Group'),
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
        $criteria->compare('t.visibility', $this->visibility, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.group_id', $this->group_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
