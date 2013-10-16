<?php

/**
 * This is the model base class for the table "section_content".
 *
 * Columns in table "section_content" available as properties of the model:
 * @property string $id
 * @property string $section_id
 * @property integer $ordinal
 * @property string $created
 * @property string $modified
 * @property string $html_chunk_id
 * @property string $snapshot_id
 * @property string $video_file_id
 * @property string $teachers_guide_id
 * @property string $exercise_id
 * @property string $slideshow_file_id
 * @property string $data_chunk_id
 * @property string $download_link_id
 * @property string $exam_question_id
 * @property string $node_id
 *
 * Relations of table "section_content" available as properties of the model:
 * @property Snapshot $snapshot
 * @property DataChunk $dataChunk
 * @property DownloadLink $downloadLink
 * @property ExamQuestion $examQuestion
 * @property Exercise $exercise
 * @property HtmlChunk $htmlChunk
 * @property Node $node
 * @property Section $section
 * @property SlideshowFile $slideshowFile
 * @property TeachersGuide $teachersGuide
 * @property VideoFile $videoFile
 */
abstract class BaseSectionContent extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'section_content';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('section_id', 'required'),
                array('ordinal, created, modified, html_chunk_id, snapshot_id, video_file_id, teachers_guide_id, exercise_id, slideshow_file_id, data_chunk_id, download_link_id, exam_question_id, node_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('ordinal', 'numerical', 'integerOnly' => true),
                array('section_id, html_chunk_id, snapshot_id, video_file_id, teachers_guide_id, exercise_id, slideshow_file_id, data_chunk_id, download_link_id, exam_question_id, node_id', 'length', 'max' => 20),
                array('created, modified', 'safe'),
                array('id, section_id, ordinal, created, modified, html_chunk_id, snapshot_id, video_file_id, teachers_guide_id, exercise_id, slideshow_file_id, data_chunk_id, download_link_id, exam_question_id, node_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->section_id;
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
            'snapshot' => array(self::BELONGS_TO, 'Snapshot', 'snapshot_id'),
            'dataChunk' => array(self::BELONGS_TO, 'DataChunk', 'data_chunk_id'),
            'downloadLink' => array(self::BELONGS_TO, 'DownloadLink', 'download_link_id'),
            'examQuestion' => array(self::BELONGS_TO, 'ExamQuestion', 'exam_question_id'),
            'exercise' => array(self::BELONGS_TO, 'Exercise', 'exercise_id'),
            'htmlChunk' => array(self::BELONGS_TO, 'HtmlChunk', 'html_chunk_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
            'slideshowFile' => array(self::BELONGS_TO, 'SlideshowFile', 'slideshow_file_id'),
            'teachersGuide' => array(self::BELONGS_TO, 'TeachersGuide', 'teachers_guide_id'),
            'videoFile' => array(self::BELONGS_TO, 'VideoFile', 'video_file_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'section_id' => Yii::t('model', 'Section'),
            'ordinal' => Yii::t('model', 'Ordinal'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'html_chunk_id' => Yii::t('model', 'Html Chunk'),
            'snapshot_id' => Yii::t('model', 'Snapshot'),
            'video_file_id' => Yii::t('model', 'Video File'),
            'teachers_guide_id' => Yii::t('model', 'Teachers Guide'),
            'exercise_id' => Yii::t('model', 'Exercise'),
            'slideshow_file_id' => Yii::t('model', 'Slideshow File'),
            'data_chunk_id' => Yii::t('model', 'Data Chunk'),
            'download_link_id' => Yii::t('model', 'Download Link'),
            'exam_question_id' => Yii::t('model', 'Exam Question'),
            'node_id' => Yii::t('model', 'Node'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.section_id', $this->section_id);
        $criteria->compare('t.ordinal', $this->ordinal);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.html_chunk_id', $this->html_chunk_id);
        $criteria->compare('t.snapshot_id', $this->snapshot_id);
        $criteria->compare('t.video_file_id', $this->video_file_id);
        $criteria->compare('t.teachers_guide_id', $this->teachers_guide_id);
        $criteria->compare('t.exercise_id', $this->exercise_id);
        $criteria->compare('t.slideshow_file_id', $this->slideshow_file_id);
        $criteria->compare('t.data_chunk_id', $this->data_chunk_id);
        $criteria->compare('t.download_link_id', $this->download_link_id);
        $criteria->compare('t.exam_question_id', $this->exam_question_id);
        $criteria->compare('t.node_id', $this->node_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
