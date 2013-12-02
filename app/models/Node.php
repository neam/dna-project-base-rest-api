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
                     'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'node_id'),
                     'slideshowFiles' => array(self::HAS_MANY, 'SlideshowFile', 'node_id'),
                     'snapshots' => array(self::HAS_MANY, 'Snapshot', 'node_id'),
                     'spreadsheetFiles' => array(self::HAS_MANY, 'SpreadsheetFile', 'node_id'),
                     //'teachersGuides' => array(self::HAS_MANY, 'TeachersGuide', 'node_id'),
                     'textDocs' => array(self::HAS_MANY, 'TextDoc', 'node_id'),
                     'tools' => array(self::HAS_MANY, 'Tool', 'node_id'),
                     'vectorGraphics' => array(self::HAS_MANY, 'VectorGraphic', 'node_id'),
                     'videoFiles' => array(self::HAS_MANY, 'VideoFile', 'node_id'),
                     'edges' => array(self::HAS_MANY, 'Edge', 'from_node_id'),
                     'edges1' => array(self::HAS_MANY, 'Edge', 'to_node_id'),
                     'nodes' => array(self::HAS_MANY, 'Node', 'id'),
                 ) as $candidateRelation => $relation) {

            if (count($this->$candidateRelation) == 1) {
                $itemArray = $this->$candidateRelation;
                return $itemArray[0];
            }

        }
        var_dump ( $this);
        exit;
        throw new CException("This node does not have any parent item");

    }

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

    public $_title;
    public $label;
    public $node_id;
    public $test;
    public function buildSearchSQL($searchString)
    {
        $sql = "";
        $tablequeries = array(
            array('table_name'=>'chapter', 'label'=>'Chapter','fields'=>array('id','node_id','_title')),
            array('table_name'=>'data_chunk', 'label'=>'Data Chunk','fields'=>array('id','node_id','_title')),
            array('table_name'=>'data_source', 'label'=>'Data Source','fields'=>array('id','node_id','_title')),
            array('table_name'=>'download_link', 'label'=>'Download Link','fields'=>array('id','node_id','_title')),
            array('table_name'=>'exam_question', 'label'=>'Exam Question','fields'=>array('id','node_id','node_id')),
            array('table_name'=>'exam_question_alternative', 'label'=>'Exam Question Alternative','fields'=>array('id','node_id','node_id')),
            array('table_name'=>'exercise', 'label'=>'Exercise','fields'=>array('id','node_id','_title')),
            array('table_name'=>'html_chunk', 'label'=>'Html Chunk','fields'=>array('id','node_id','node_id')),
            array('table_name'=>'page', 'label'=>'Page','fields'=>array('id','node_id','_title')),
            array('table_name'=>'po_file', 'label'=>'Po file','fields'=>array('id','node_id','node_id')),
            array('table_name'=>'section', 'label'=>'Section','fields'=>array('id','node_id','_title')),
            array('table_name'=>'section_content', 'label'=>'Section Content','fields'=>array('id','node_id','node_id')),
            array('table_name'=>'slideshow_file', 'label'=>'Slideshow File','fields'=>array('id','node_id','_title')),
            array('table_name'=>'snapshot', 'label'=>'Snapshot','fields'=>array('id','node_id','_title')),
            array('table_name'=>'spreadsheet_file', 'label'=>'Spreadsheet File','fields'=>array('id','node_id','_title')),
            array('table_name'=>'text_doc', 'label'=>'Text Doc','fields'=>array('id','node_id','_title')),
            array('table_name'=>'tool', 'label'=>'Tool','fields'=>array('id','node_id','_title')),
            array('table_name'=>'vector_graphic', 'label'=>'Vector Graphic','fields'=>array('id','node_id','_title')),
            array('table_name'=>'video_file', 'label'=>'Video File','fields'=>array('id','node_id','_title')),
        );
        foreach ($tablequeries as $tablequery){
            $tname = $tablequery["table_name"];
            $tlabel = $tablequery["label"];
            $tfields = $tablequery["fields"];

            $sql .= "SELECT ";
            foreach ($tfields as $f){
                $sql .= $tname.".$f, ";
            }
            $sql .= " '".$tlabel."' as `label` ";
            $sql .= "FROM $tname ";
            if ($searchString){
                $sql .= "WHERE ";
                foreach ($tfields as $f){
                    $sql .= "$tname.$f  LIKE '%$searchString%' OR ";
                }
                $sql .= "'".$tlabel."'='$searchString' \r\n";
            }
            if (end($tablequeries)!=$tablequery){
                $sql .= "UNION  \r\n";
            }
        }
        return $sql;

    }

}
