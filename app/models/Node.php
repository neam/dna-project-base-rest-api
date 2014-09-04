<?php

// auto-loading
Yii::setPathOfAlias('Node', dirname(__FILE__));
Yii::import('Node.*');

class Node extends BaseNode
{

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return "Node #" . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(), array(
                'outEdges' => array(self::HAS_MANY, 'Edge', 'from_node_id'),
                'outNodes' => array(self::HAS_MANY, 'Node', array('to_node_id' => 'id'), 'through' => 'outEdges'),
                'inEdges' => array(self::HAS_MANY, 'Edge', 'to_node_id'),
                'inNodes' => array(self::HAS_MANY, 'Node', array('from_node_id' => 'id'), 'through' => 'inEdges'),
                'nodes' => array(self::HAS_MANY, 'Node', 'id'),
            )
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

    /**
     * Returns this node's parent item
     */
    public function item()
    {

        $itemData = $this->getDbConnection()->createCommand(
            "SELECT id, model_class FROM item WHERE node_id = :node_id"
        )->queryRow(true, array(':node_id' => $this->id));
        //U::inspection(__METHOD__ . " itemData", $itemData);

        if (empty($itemData)) {
            throw new CException("This node (id {$this->id}) does not have any parent item");
        }

        $item = $itemData["model_class"]::model()->findByPk($itemData["id"]);
        //U::inspection(__METHOD__ . " item", $item);

        if (empty($item) && !empty($itemData)) {
            throw new NodeItemExistsButIsRestricted();
        }

        return $item;

    }

    public function getEdgeWeight($relation, $toNodeId)
    {
        $result = Yii::app()->db->createCommand()
            ->select('weight')
            ->from('edge')
            ->where(
                'from_node_id = :from AND to_node_id = :to AND relation = :relation',
                array(
                    ':from' => $this->id,
                    ':to' => $toNodeId,
                    ':relation' => $relation,
                )
            )
            ->queryRow();

        if ($result) {
            return array_shift($result);
        }
    }

    public function setEdgeWeight($relation, $toNodeId, $weight)
    {
        Yii::app()->db->createCommand()->update(
            'edge',
            array('weight' => $weight),
            'from_node_id = :from AND to_node_id = :to AND relation = :relation',
            array(
                ':from' => $this->id,
                ':to' => $toNodeId,
                ':relation' => $relation,
            )
        );
    }

}

class NodeItemExistsButIsRestricted extends CException
{

}