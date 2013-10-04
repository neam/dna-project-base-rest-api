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
 * @property string $viz_view_id
 * @property string $video_file_id
 * @property string $teachers_guide_id
 * @property string $exercise_id
 * @property string $presentation_id
 * @property string $data_chunk_id
 * @property string $download_link_id
 * @property string $exam_question_id
 *
 * Relations of table "section_content" available as properties of the model:
 * @property ExamQuestion $examQuestion
 * @property DataChunk $dataChunk
 * @property DownloadLink $downloadLink
 * @property Exercise $exercise
 * @property HtmlChunk $htmlChunk
 * @property Presentation $presentation
 * @property Section $section
 * @property TeachersGuide $teachersGuide
 * @property VideoFile $videoFile
 * @property VizView $vizView
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
                array('ordinal, created, modified, html_chunk_id, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id, download_link_id, exam_question_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('ordinal', 'numerical', 'integerOnly' => true),
                array('section_id, html_chunk_id, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id, download_link_id, exam_question_id', 'length', 'max' => 20),
                array('created, modified', 'safe'),
                array('id, section_id, ordinal, created, modified, html_chunk_id, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id, download_link_id, exam_question_id', 'safe', 'on' => 'search'),
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
            'examQuestion' => array(self::BELONGS_TO, 'ExamQuestion', 'exam_question_id'),
            'dataChunk' => array(self::BELONGS_TO, 'DataChunk', 'data_chunk_id'),
            'downloadLink' => array(self::BELONGS_TO, 'DownloadLink', 'download_link_id'),
            'exercise' => array(self::BELONGS_TO, 'Exercise', 'exercise_id'),
            'htmlChunk' => array(self::BELONGS_TO, 'HtmlChunk', 'html_chunk_id'),
            'presentation' => array(self::BELONGS_TO, 'Presentation', 'presentation_id'),
            'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
            'teachersGuide' => array(self::BELONGS_TO, 'TeachersGuide', 'teachers_guide_id'),
            'videoFile' => array(self::BELONGS_TO, 'VideoFile', 'video_file_id'),
            'vizView' => array(self::BELONGS_TO, 'VizView', 'viz_view_id'),
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
            'viz_view_id' => Yii::t('model', 'Viz View'),
            'video_file_id' => Yii::t('model', 'Video File'),
            'teachers_guide_id' => Yii::t('model', 'Teachers Guide'),
            'exercise_id' => Yii::t('model', 'Exercise'),
            'presentation_id' => Yii::t('model', 'Presentation'),
            'data_chunk_id' => Yii::t('model', 'Data Chunk'),
            'download_link_id' => Yii::t('model', 'Download Link'),
            'exam_question_id' => Yii::t('model', 'Exam Question'),
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
        $criteria->compare('t.viz_view_id', $this->viz_view_id);
        $criteria->compare('t.video_file_id', $this->video_file_id);
        $criteria->compare('t.teachers_guide_id', $this->teachers_guide_id);
        $criteria->compare('t.exercise_id', $this->exercise_id);
        $criteria->compare('t.presentation_id', $this->presentation_id);
        $criteria->compare('t.data_chunk_id', $this->data_chunk_id);
        $criteria->compare('t.download_link_id', $this->download_link_id);
        $criteria->compare('t.exam_question_id', $this->exam_question_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
