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
        foreach ($this->relations() as $relationName => $relationSpec) {

            // Filter out edges and nodeHasGroup
            if (count($relationSpec) < 3 || $relationSpec[2] !== 'node_id' || $relationSpec[1] === 'NodeHasGroup') {
                continue;
            }

            if (count($this->{$relationName}) === 1) {
                $tmp = $this->{$relationName};
                return $tmp[0];
            }
        }

        throw new CException("This node does not have any parent item");
    }

}
