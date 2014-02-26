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

        // Figure out parent item
        foreach (array(
                     'chapters' => array(self::HAS_MANY, 'Chapter', 'node_id'),
                     'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'node_id'),
                     'dataSources' => array(self::HAS_MANY, 'DataSource', 'node_id'),
                     'downloadLinks' => array(self::HAS_MANY, 'DownloadLink', 'node_id'),
                     'examQuestions' => array(self::HAS_MANY, 'ExamQuestion', 'node_id'),
                     'examQuestionAlternatives' => array(self::HAS_MANY, 'ExamQuestionAlternative', 'node_id'),
                     'exercises' => array(self::HAS_MANY, 'Exercise', 'node_id'),
                     'htmlChunks' => array(self::HAS_MANY, 'HtmlChunk', 'node_id'),
                     'poFiles' => array(self::HAS_MANY, 'PoFile', 'node_id'),
                     'sections' => array(self::HAS_MANY, 'Section', 'node_id'),
                     'slideshowFiles' => array(self::HAS_MANY, 'SlideshowFile', 'node_id'),
                     'snapshots' => array(self::HAS_MANY, 'Snapshot', 'node_id'),
                     'spreadsheetFiles' => array(self::HAS_MANY, 'SpreadsheetFile', 'node_id'),
                     //'teachersGuides' => array(self::HAS_MANY, 'TeachersGuide', 'node_id'),
                     'textDocs' => array(self::HAS_MANY, 'TextDoc', 'node_id'),
                     'tools' => array(self::HAS_MANY, 'Tool', 'node_id'),
                     'vectorGraphics' => array(self::HAS_MANY, 'VectorGraphic', 'node_id'),
                     'videoFiles' => array(self::HAS_MANY, 'VideoFile', 'node_id'),
                 ) as $candidateRelation => $relation) {

            if (count($this->$candidateRelation) == 1) {
                $itemArray = $this->$candidateRelation;
                return $itemArray[0];
            }

        }

        throw new CException("This node does not have any parent item");

    }

}
