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
        return "Node #".$this->id;
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
        return array(
            'outEdges' => array(self::HAS_MANY, 'Edge', 'from_node_id'),
            'inEdges' => array(self::HAS_MANY, 'Edge', 'to_node_id'),
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

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

}
