<?php

/**
 * This is the model base class for the table "node".
 *
 * Columns in table "node" available as properties of the model:
 * @property string $id
 * @property string $created
 * @property string $modified
 *
 * Relations of table "node" available as properties of the model:
 * @property Chapter[] $chapters
 * @property DataChunk[] $dataChunks
 * @property DataSource[] $dataSources
 * @property DownloadLink[] $downloadLinks
 * @property Edge[] $edges
 * @property Edge[] $edges1
 * @property ExamQuestion[] $examQuestions
 * @property ExamQuestion[] $examQuestions1
 * @property ExamQuestionAlternative[] $examQuestionAlternatives
 * @property Exercise[] $exercises
 * @property HtmlChunk[] $htmlChunks
 * @property PoFile[] $poFiles
 * @property Section[] $sections
 * @property SectionContent[] $sectionContents
 * @property SlideshowFile[] $slideshowFiles
 * @property Snapshot[] $snapshots
 * @property SpreadsheetFile[] $spreadsheetFiles
 * @property TeachersGuide[] $teachersGuides
 * @property TextDoc[] $textDocs
 * @property Tool[] $tools
 * @property VectorGraphic[] $vectorGraphics
 * @property VideoFile[] $videoFiles
 */
abstract class BaseNode extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'node';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('created, modified', 'safe'),
                array('id, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->created;
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
            'chapters' => array(self::HAS_MANY, 'Chapter', 'node_id'),
            'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'node_id'),
            'dataSources' => array(self::HAS_MANY, 'DataSource', 'node_id'),
            'downloadLinks' => array(self::HAS_MANY, 'DownloadLink', 'node_id'),
            'edges' => array(self::HAS_MANY, 'Edge', 'from_node_id'),
            'edges1' => array(self::HAS_MANY, 'Edge', 'to_node_id'),
            'examQuestions' => array(self::HAS_MANY, 'ExamQuestion', 'node_id'),
            'examQuestions1' => array(self::HAS_MANY, 'ExamQuestion', 'source_node_id'),
            'examQuestionAlternatives' => array(self::HAS_MANY, 'ExamQuestionAlternative', 'node_id'),
            'exercises' => array(self::HAS_MANY, 'Exercise', 'node_id'),
            'htmlChunks' => array(self::HAS_MANY, 'HtmlChunk', 'node_id'),
            'poFiles' => array(self::HAS_MANY, 'PoFile', 'node_id'),
            'sections' => array(self::HAS_MANY, 'Section', 'node_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'node_id'),
            'slideshowFiles' => array(self::HAS_MANY, 'SlideshowFile', 'node_id'),
            'snapshots' => array(self::HAS_MANY, 'Snapshot', 'node_id'),
            'spreadsheetFiles' => array(self::HAS_MANY, 'SpreadsheetFile', 'node_id'),
            'teachersGuides' => array(self::HAS_MANY, 'TeachersGuide', 'node_id'),
            'textDocs' => array(self::HAS_MANY, 'TextDoc', 'node_id'),
            'tools' => array(self::HAS_MANY, 'Tool', 'node_id'),
            'vectorGraphics' => array(self::HAS_MANY, 'VectorGraphic', 'node_id'),
            'videoFiles' => array(self::HAS_MANY, 'VideoFile', 'node_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
