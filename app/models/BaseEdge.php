<?php

/**
 * This is the model base class for the table "edge".
 *
 * Columns in table "edge" available as properties of the model:
 * @property string $id
 * @property string $from_node_id
 * @property string $to_node_id
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
                array('from_node_id, to_node_id', 'length', 'max' => 20),
                array('id, from_node_id, to_node_id', 'safe', 'on' => 'search'),
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
        return array(
            'fromNode' => array(self::BELONGS_TO, 'Node', 'from_node_id'),
            'toNode' => array(self::BELONGS_TO, 'Node', 'to_node_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'from_node_id' => Yii::t('model', 'From Node'),
            'to_node_id' => Yii::t('model', 'To Node'),
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


        return $criteria;

    }

}
