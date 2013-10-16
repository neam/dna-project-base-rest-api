<?php

/**
 * This is the model base class for the table "ezc_execution".
 *
 * Columns in table "ezc_execution" available as properties of the model:
 * @property string $workflow_id
 * @property string $execution_id
 * @property string $execution_parent
 * @property integer $execution_started
 * @property integer $execution_suspended
 * @property string $execution_variables
 * @property string $execution_waiting_for
 * @property string $execution_threads
 * @property string $execution_next_thread_id
 *
 * Relations of table "ezc_execution" available as properties of the model:
 * @property Chapter[] $chapters
 * @property Chapter[] $chapters1
 * @property Chapter[] $chapters2
 * @property Chapter[] $chapters3
 * @property Chapter[] $chapters4
 * @property Chapter[] $chapters5
 * @property Chapter[] $chapters6
 * @property Chapter[] $chapters7
 * @property DataChunk[] $dataChunks
 * @property DataChunk[] $dataChunks1
 * @property DataChunk[] $dataChunks2
 * @property DataChunk[] $dataChunks3
 * @property DataChunk[] $dataChunks4
 * @property DataChunk[] $dataChunks5
 * @property DataChunk[] $dataChunks6
 * @property DataChunk[] $dataChunks7
 * @property DataSource[] $dataSources
 * @property DataSource[] $dataSources1
 * @property DataSource[] $dataSources2
 * @property DataSource[] $dataSources3
 * @property DataSource[] $dataSources4
 * @property DataSource[] $dataSources5
 * @property DataSource[] $dataSources6
 * @property DataSource[] $dataSources7
 * @property DownloadLink[] $downloadLinks
 * @property DownloadLink[] $downloadLinks1
 * @property DownloadLink[] $downloadLinks2
 * @property DownloadLink[] $downloadLinks3
 * @property DownloadLink[] $downloadLinks4
 * @property DownloadLink[] $downloadLinks5
 * @property DownloadLink[] $downloadLinks6
 * @property DownloadLink[] $downloadLinks7
 * @property ExamQuestion[] $examQuestions
 * @property ExamQuestion[] $examQuestions1
 * @property ExamQuestion[] $examQuestions2
 * @property ExamQuestion[] $examQuestions3
 * @property ExamQuestion[] $examQuestions4
 * @property ExamQuestion[] $examQuestions5
 * @property ExamQuestion[] $examQuestions6
 * @property ExamQuestion[] $examQuestions7
 * @property Exercise[] $exercises
 * @property Exercise[] $exercises1
 * @property Exercise[] $exercises2
 * @property Exercise[] $exercises3
 * @property Exercise[] $exercises4
 * @property Exercise[] $exercises5
 * @property Exercise[] $exercises6
 * @property Exercise[] $exercises7
 * @property EzcWorkflow $workflow
 * @property HtmlChunk[] $htmlChunks
 * @property HtmlChunk[] $htmlChunks1
 * @property HtmlChunk[] $htmlChunks2
 * @property HtmlChunk[] $htmlChunks3
 * @property HtmlChunk[] $htmlChunks4
 * @property HtmlChunk[] $htmlChunks5
 * @property HtmlChunk[] $htmlChunks6
 * @property HtmlChunk[] $htmlChunks7
 * @property PoFile[] $poFiles
 * @property PoFile[] $poFiles1
 * @property PoFile[] $poFiles2
 * @property PoFile[] $poFiles3
 * @property PoFile[] $poFiles4
 * @property PoFile[] $poFiles5
 * @property PoFile[] $poFiles6
 * @property PoFile[] $poFiles7
 * @property SlideshowFile[] $slideshowFiles
 * @property SlideshowFile[] $slideshowFiles1
 * @property SlideshowFile[] $slideshowFiles2
 * @property SlideshowFile[] $slideshowFiles3
 * @property SlideshowFile[] $slideshowFiles4
 * @property SlideshowFile[] $slideshowFiles5
 * @property SlideshowFile[] $slideshowFiles6
 * @property SlideshowFile[] $slideshowFiles7
 * @property Snapshot[] $snapshots
 * @property Snapshot[] $snapshots1
 * @property Snapshot[] $snapshots2
 * @property Snapshot[] $snapshots3
 * @property Snapshot[] $snapshots4
 * @property Snapshot[] $snapshots5
 * @property Snapshot[] $snapshots6
 * @property Snapshot[] $snapshots7
 * @property SpreadsheetFile[] $spreadsheetFiles
 * @property SpreadsheetFile[] $spreadsheetFiles1
 * @property SpreadsheetFile[] $spreadsheetFiles2
 * @property SpreadsheetFile[] $spreadsheetFiles3
 * @property SpreadsheetFile[] $spreadsheetFiles4
 * @property SpreadsheetFile[] $spreadsheetFiles5
 * @property SpreadsheetFile[] $spreadsheetFiles6
 * @property SpreadsheetFile[] $spreadsheetFiles7
 * @property TeachersGuide[] $teachersGuides
 * @property TeachersGuide[] $teachersGuides1
 * @property TeachersGuide[] $teachersGuides2
 * @property TeachersGuide[] $teachersGuides3
 * @property TeachersGuide[] $teachersGuides4
 * @property TeachersGuide[] $teachersGuides5
 * @property TeachersGuide[] $teachersGuides6
 * @property TeachersGuide[] $teachersGuides7
 * @property TextDoc[] $textDocs
 * @property TextDoc[] $textDocs1
 * @property TextDoc[] $textDocs2
 * @property TextDoc[] $textDocs3
 * @property TextDoc[] $textDocs4
 * @property TextDoc[] $textDocs5
 * @property TextDoc[] $textDocs6
 * @property TextDoc[] $textDocs7
 * @property VectorGraphic[] $vectorGraphics
 * @property VectorGraphic[] $vectorGraphics1
 * @property VectorGraphic[] $vectorGraphics2
 * @property VectorGraphic[] $vectorGraphics3
 * @property VectorGraphic[] $vectorGraphics4
 * @property VectorGraphic[] $vectorGraphics5
 * @property VectorGraphic[] $vectorGraphics6
 * @property VectorGraphic[] $vectorGraphics7
 * @property VideoFile[] $videoFiles
 * @property VideoFile[] $videoFiles1
 * @property VideoFile[] $videoFiles2
 * @property VideoFile[] $videoFiles3
 * @property VideoFile[] $videoFiles4
 * @property VideoFile[] $videoFiles5
 * @property VideoFile[] $videoFiles6
 * @property VideoFile[] $videoFiles7
 */
abstract class BaseEzcExecution extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'ezc_execution';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('workflow_id, execution_started, execution_next_thread_id', 'required'),
                array('execution_parent, execution_suspended, execution_variables, execution_waiting_for, execution_threads', 'default', 'setOnEmpty' => true, 'value' => null),
                array('execution_started, execution_suspended', 'numerical', 'integerOnly' => true),
                array('workflow_id, execution_parent, execution_next_thread_id', 'length', 'max' => 10),
                array('execution_variables, execution_waiting_for, execution_threads', 'safe'),
                array('workflow_id, execution_id, execution_parent, execution_started, execution_suspended, execution_variables, execution_waiting_for, execution_threads, execution_next_thread_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->workflow_id;
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
            'chapters' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_en'),
            'chapters1' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_cn'),
            'chapters2' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_de'),
            'chapters3' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_es'),
            'chapters4' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_fa'),
            'chapters5' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_hi'),
            'chapters6' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_pt'),
            'chapters7' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_sv'),
            'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'authoring_workflow_execution_id_de'),
            'dataChunks1' => array(self::HAS_MANY, 'DataChunk', 'authoring_workflow_execution_id_en'),
            'dataChunks2' => array(self::HAS_MANY, 'DataChunk', 'authoring_workflow_execution_id_cn'),
            'dataChunks3' => array(self::HAS_MANY, 'DataChunk', 'authoring_workflow_execution_id_es'),
            'dataChunks4' => array(self::HAS_MANY, 'DataChunk', 'authoring_workflow_execution_id_fa'),
            'dataChunks5' => array(self::HAS_MANY, 'DataChunk', 'authoring_workflow_execution_id_hi'),
            'dataChunks6' => array(self::HAS_MANY, 'DataChunk', 'authoring_workflow_execution_id_pt'),
            'dataChunks7' => array(self::HAS_MANY, 'DataChunk', 'authoring_workflow_execution_id_sv'),
            'dataSources' => array(self::HAS_MANY, 'DataSource', 'authoring_workflow_execution_id_de'),
            'dataSources1' => array(self::HAS_MANY, 'DataSource', 'authoring_workflow_execution_id_en'),
            'dataSources2' => array(self::HAS_MANY, 'DataSource', 'authoring_workflow_execution_id_cn'),
            'dataSources3' => array(self::HAS_MANY, 'DataSource', 'authoring_workflow_execution_id_es'),
            'dataSources4' => array(self::HAS_MANY, 'DataSource', 'authoring_workflow_execution_id_fa'),
            'dataSources5' => array(self::HAS_MANY, 'DataSource', 'authoring_workflow_execution_id_hi'),
            'dataSources6' => array(self::HAS_MANY, 'DataSource', 'authoring_workflow_execution_id_pt'),
            'dataSources7' => array(self::HAS_MANY, 'DataSource', 'authoring_workflow_execution_id_sv'),
            'downloadLinks' => array(self::HAS_MANY, 'DownloadLink', 'authoring_workflow_execution_id_de'),
            'downloadLinks1' => array(self::HAS_MANY, 'DownloadLink', 'authoring_workflow_execution_id_en'),
            'downloadLinks2' => array(self::HAS_MANY, 'DownloadLink', 'authoring_workflow_execution_id_cn'),
            'downloadLinks3' => array(self::HAS_MANY, 'DownloadLink', 'authoring_workflow_execution_id_es'),
            'downloadLinks4' => array(self::HAS_MANY, 'DownloadLink', 'authoring_workflow_execution_id_fa'),
            'downloadLinks5' => array(self::HAS_MANY, 'DownloadLink', 'authoring_workflow_execution_id_hi'),
            'downloadLinks6' => array(self::HAS_MANY, 'DownloadLink', 'authoring_workflow_execution_id_pt'),
            'downloadLinks7' => array(self::HAS_MANY, 'DownloadLink', 'authoring_workflow_execution_id_sv'),
            'examQuestions' => array(self::HAS_MANY, 'ExamQuestion', 'authoring_workflow_execution_id_de'),
            'examQuestions1' => array(self::HAS_MANY, 'ExamQuestion', 'authoring_workflow_execution_id_en'),
            'examQuestions2' => array(self::HAS_MANY, 'ExamQuestion', 'authoring_workflow_execution_id_cn'),
            'examQuestions3' => array(self::HAS_MANY, 'ExamQuestion', 'authoring_workflow_execution_id_es'),
            'examQuestions4' => array(self::HAS_MANY, 'ExamQuestion', 'authoring_workflow_execution_id_fa'),
            'examQuestions5' => array(self::HAS_MANY, 'ExamQuestion', 'authoring_workflow_execution_id_hi'),
            'examQuestions6' => array(self::HAS_MANY, 'ExamQuestion', 'authoring_workflow_execution_id_pt'),
            'examQuestions7' => array(self::HAS_MANY, 'ExamQuestion', 'authoring_workflow_execution_id_sv'),
            'exercises' => array(self::HAS_MANY, 'Exercise', 'authoring_workflow_execution_id_de'),
            'exercises1' => array(self::HAS_MANY, 'Exercise', 'authoring_workflow_execution_id_en'),
            'exercises2' => array(self::HAS_MANY, 'Exercise', 'authoring_workflow_execution_id_cn'),
            'exercises3' => array(self::HAS_MANY, 'Exercise', 'authoring_workflow_execution_id_es'),
            'exercises4' => array(self::HAS_MANY, 'Exercise', 'authoring_workflow_execution_id_fa'),
            'exercises5' => array(self::HAS_MANY, 'Exercise', 'authoring_workflow_execution_id_hi'),
            'exercises6' => array(self::HAS_MANY, 'Exercise', 'authoring_workflow_execution_id_pt'),
            'exercises7' => array(self::HAS_MANY, 'Exercise', 'authoring_workflow_execution_id_sv'),
            'workflow' => array(self::BELONGS_TO, 'EzcWorkflow', 'workflow_id'),
            'htmlChunks' => array(self::HAS_MANY, 'HtmlChunk', 'authoring_workflow_execution_id_de'),
            'htmlChunks1' => array(self::HAS_MANY, 'HtmlChunk', 'authoring_workflow_execution_id_en'),
            'htmlChunks2' => array(self::HAS_MANY, 'HtmlChunk', 'authoring_workflow_execution_id_cn'),
            'htmlChunks3' => array(self::HAS_MANY, 'HtmlChunk', 'authoring_workflow_execution_id_es'),
            'htmlChunks4' => array(self::HAS_MANY, 'HtmlChunk', 'authoring_workflow_execution_id_fa'),
            'htmlChunks5' => array(self::HAS_MANY, 'HtmlChunk', 'authoring_workflow_execution_id_hi'),
            'htmlChunks6' => array(self::HAS_MANY, 'HtmlChunk', 'authoring_workflow_execution_id_pt'),
            'htmlChunks7' => array(self::HAS_MANY, 'HtmlChunk', 'authoring_workflow_execution_id_sv'),
            'poFiles' => array(self::HAS_MANY, 'PoFile', 'authoring_workflow_execution_id_de'),
            'poFiles1' => array(self::HAS_MANY, 'PoFile', 'authoring_workflow_execution_id_en'),
            'poFiles2' => array(self::HAS_MANY, 'PoFile', 'authoring_workflow_execution_id_cn'),
            'poFiles3' => array(self::HAS_MANY, 'PoFile', 'authoring_workflow_execution_id_es'),
            'poFiles4' => array(self::HAS_MANY, 'PoFile', 'authoring_workflow_execution_id_fa'),
            'poFiles5' => array(self::HAS_MANY, 'PoFile', 'authoring_workflow_execution_id_hi'),
            'poFiles6' => array(self::HAS_MANY, 'PoFile', 'authoring_workflow_execution_id_pt'),
            'poFiles7' => array(self::HAS_MANY, 'PoFile', 'authoring_workflow_execution_id_sv'),
            'slideshowFiles' => array(self::HAS_MANY, 'SlideshowFile', 'authoring_workflow_execution_id_de'),
            'slideshowFiles1' => array(self::HAS_MANY, 'SlideshowFile', 'authoring_workflow_execution_id_en'),
            'slideshowFiles2' => array(self::HAS_MANY, 'SlideshowFile', 'authoring_workflow_execution_id_cn'),
            'slideshowFiles3' => array(self::HAS_MANY, 'SlideshowFile', 'authoring_workflow_execution_id_es'),
            'slideshowFiles4' => array(self::HAS_MANY, 'SlideshowFile', 'authoring_workflow_execution_id_fa'),
            'slideshowFiles5' => array(self::HAS_MANY, 'SlideshowFile', 'authoring_workflow_execution_id_hi'),
            'slideshowFiles6' => array(self::HAS_MANY, 'SlideshowFile', 'authoring_workflow_execution_id_pt'),
            'slideshowFiles7' => array(self::HAS_MANY, 'SlideshowFile', 'authoring_workflow_execution_id_sv'),
            'snapshots' => array(self::HAS_MANY, 'Snapshot', 'authoring_workflow_execution_id_de'),
            'snapshots1' => array(self::HAS_MANY, 'Snapshot', 'authoring_workflow_execution_id_en'),
            'snapshots2' => array(self::HAS_MANY, 'Snapshot', 'authoring_workflow_execution_id_cn'),
            'snapshots3' => array(self::HAS_MANY, 'Snapshot', 'authoring_workflow_execution_id_es'),
            'snapshots4' => array(self::HAS_MANY, 'Snapshot', 'authoring_workflow_execution_id_fa'),
            'snapshots5' => array(self::HAS_MANY, 'Snapshot', 'authoring_workflow_execution_id_hi'),
            'snapshots6' => array(self::HAS_MANY, 'Snapshot', 'authoring_workflow_execution_id_pt'),
            'snapshots7' => array(self::HAS_MANY, 'Snapshot', 'authoring_workflow_execution_id_sv'),
            'spreadsheetFiles' => array(self::HAS_MANY, 'SpreadsheetFile', 'authoring_workflow_execution_id_de'),
            'spreadsheetFiles1' => array(self::HAS_MANY, 'SpreadsheetFile', 'authoring_workflow_execution_id_en'),
            'spreadsheetFiles2' => array(self::HAS_MANY, 'SpreadsheetFile', 'authoring_workflow_execution_id_cn'),
            'spreadsheetFiles3' => array(self::HAS_MANY, 'SpreadsheetFile', 'authoring_workflow_execution_id_es'),
            'spreadsheetFiles4' => array(self::HAS_MANY, 'SpreadsheetFile', 'authoring_workflow_execution_id_fa'),
            'spreadsheetFiles5' => array(self::HAS_MANY, 'SpreadsheetFile', 'authoring_workflow_execution_id_hi'),
            'spreadsheetFiles6' => array(self::HAS_MANY, 'SpreadsheetFile', 'authoring_workflow_execution_id_pt'),
            'spreadsheetFiles7' => array(self::HAS_MANY, 'SpreadsheetFile', 'authoring_workflow_execution_id_sv'),
            'teachersGuides' => array(self::HAS_MANY, 'TeachersGuide', 'authoring_workflow_execution_id_de'),
            'teachersGuides1' => array(self::HAS_MANY, 'TeachersGuide', 'authoring_workflow_execution_id_en'),
            'teachersGuides2' => array(self::HAS_MANY, 'TeachersGuide', 'authoring_workflow_execution_id_cn'),
            'teachersGuides3' => array(self::HAS_MANY, 'TeachersGuide', 'authoring_workflow_execution_id_es'),
            'teachersGuides4' => array(self::HAS_MANY, 'TeachersGuide', 'authoring_workflow_execution_id_fa'),
            'teachersGuides5' => array(self::HAS_MANY, 'TeachersGuide', 'authoring_workflow_execution_id_hi'),
            'teachersGuides6' => array(self::HAS_MANY, 'TeachersGuide', 'authoring_workflow_execution_id_pt'),
            'teachersGuides7' => array(self::HAS_MANY, 'TeachersGuide', 'authoring_workflow_execution_id_sv'),
            'textDocs' => array(self::HAS_MANY, 'TextDoc', 'authoring_workflow_execution_id_de'),
            'textDocs1' => array(self::HAS_MANY, 'TextDoc', 'authoring_workflow_execution_id_en'),
            'textDocs2' => array(self::HAS_MANY, 'TextDoc', 'authoring_workflow_execution_id_cn'),
            'textDocs3' => array(self::HAS_MANY, 'TextDoc', 'authoring_workflow_execution_id_es'),
            'textDocs4' => array(self::HAS_MANY, 'TextDoc', 'authoring_workflow_execution_id_fa'),
            'textDocs5' => array(self::HAS_MANY, 'TextDoc', 'authoring_workflow_execution_id_hi'),
            'textDocs6' => array(self::HAS_MANY, 'TextDoc', 'authoring_workflow_execution_id_pt'),
            'textDocs7' => array(self::HAS_MANY, 'TextDoc', 'authoring_workflow_execution_id_sv'),
            'vectorGraphics' => array(self::HAS_MANY, 'VectorGraphic', 'authoring_workflow_execution_id_de'),
            'vectorGraphics1' => array(self::HAS_MANY, 'VectorGraphic', 'authoring_workflow_execution_id_en'),
            'vectorGraphics2' => array(self::HAS_MANY, 'VectorGraphic', 'authoring_workflow_execution_id_cn'),
            'vectorGraphics3' => array(self::HAS_MANY, 'VectorGraphic', 'authoring_workflow_execution_id_es'),
            'vectorGraphics4' => array(self::HAS_MANY, 'VectorGraphic', 'authoring_workflow_execution_id_fa'),
            'vectorGraphics5' => array(self::HAS_MANY, 'VectorGraphic', 'authoring_workflow_execution_id_hi'),
            'vectorGraphics6' => array(self::HAS_MANY, 'VectorGraphic', 'authoring_workflow_execution_id_pt'),
            'vectorGraphics7' => array(self::HAS_MANY, 'VectorGraphic', 'authoring_workflow_execution_id_sv'),
            'videoFiles' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_en'),
            'videoFiles1' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_cn'),
            'videoFiles2' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_de'),
            'videoFiles3' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_es'),
            'videoFiles4' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_fa'),
            'videoFiles5' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_hi'),
            'videoFiles6' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_pt'),
            'videoFiles7' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_sv'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'workflow_id' => Yii::t('model', 'Workflow'),
            'execution_id' => Yii::t('model', 'Execution'),
            'execution_parent' => Yii::t('model', 'Execution Parent'),
            'execution_started' => Yii::t('model', 'Execution Started'),
            'execution_suspended' => Yii::t('model', 'Execution Suspended'),
            'execution_variables' => Yii::t('model', 'Execution Variables'),
            'execution_waiting_for' => Yii::t('model', 'Execution Waiting For'),
            'execution_threads' => Yii::t('model', 'Execution Threads'),
            'execution_next_thread_id' => Yii::t('model', 'Execution Next Thread'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.workflow_id', $this->workflow_id);
        $criteria->compare('t.execution_id', $this->execution_id, true);
        $criteria->compare('t.execution_parent', $this->execution_parent, true);
        $criteria->compare('t.execution_started', $this->execution_started);
        $criteria->compare('t.execution_suspended', $this->execution_suspended);
        $criteria->compare('t.execution_variables', $this->execution_variables, true);
        $criteria->compare('t.execution_waiting_for', $this->execution_waiting_for, true);
        $criteria->compare('t.execution_threads', $this->execution_threads, true);
        $criteria->compare('t.execution_next_thread_id', $this->execution_next_thread_id, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
