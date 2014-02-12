<?php

/**
 * This is the model base class for the table "edge".
 *
 * Columns in table "edge" available as properties of the model:
 * @property string $id
 * @property string $from_node_id
 * @property string $to_node_id
 * @property integer $weight
 * @property string $title
 * @property string $created
 * @property string $modified
 *
 * Relations of table "edge" available as properties of the model:
 * @property Node $fromNode
 * @property Node $toNode
 */
abstract class BaseEdge extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'edge';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('from_node_id, to_node_id', 'required'),
                array('weight, title, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('weight', 'numerical', 'integerOnly' => true),
                array('from_node_id, to_node_id', 'length', 'max' => 20),
                array('title', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, from_node_id, to_node_id, weight, title, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->from_node_id;
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
                'fromNode' => array(self::BELONGS_TO, 'Node', 'from_node_id'),
                'toNode' => array(self::BELONGS_TO, 'Node', 'to_node_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'from_node_id' => Yii::t('model', 'From Node'),
            'to_node_id' => Yii::t('model', 'To Node'),
            'weight' => Yii::t('model', 'Weight'),
            'title' => Yii::t('model', 'Title'),
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
        $criteria->compare('t.from_node_id', $this->from_node_id);
        $criteria->compare('t.to_node_id', $this->to_node_id);
        $criteria->compare('t.weight', $this->weight);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
