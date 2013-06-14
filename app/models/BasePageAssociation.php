<?php

/**
 * This is the model base class for the table "page_association".
 *
 * Columns in table "page_association" available as properties of the model:
 * @property string $id
 * @property string $page_id
 * @property integer $ordinal
 * @property string $title
 * @property string $created
 * @property string $modified
 * @property string $viz_view_id
 * @property string $video_file_id
 * @property string $teachers_guide_id
 * @property string $exercise_id
 * @property string $presentation_id
 * @property string $data_chunk_id
 *
 * Relations of table "page_association" available as properties of the model:
 * @property VizView $vizView
 * @property TeachersGuide $teachersGuide
 * @property Exercise $exercise
 * @property Presentation $presentation
 * @property DataChunk $dataChunk
 * @property VideoFile $videoFile
 * @property Page $page
 */
abstract class BasePageAssociation extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'page_association';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('page_id', 'required'),
			array('ordinal, title, created, modified, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('ordinal', 'numerical', 'integerOnly'=>true),
			array('page_id, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id', 'length', 'max'=>20),
			array('title', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			array('id, page_id, ordinal, title, created, modified, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id', 'safe', 'on'=>'search'),
		    )
		);
	}

	public function behaviors()
	{
		return array_merge(
		    parent::behaviors(), array(
			'savedRelated' => array(
				'class' => 'gii-template-collection.components.CSaveRelationsBehavior'
			)
		    )
		);
	}

	public function relations()
	{
		return array(
			'vizView' => array(self::BELONGS_TO, 'VizView', 'viz_view_id'),
			'teachersGuide' => array(self::BELONGS_TO, 'TeachersGuide', 'teachers_guide_id'),
			'exercise' => array(self::BELONGS_TO, 'Exercise', 'exercise_id'),
			'presentation' => array(self::BELONGS_TO, 'Presentation', 'presentation_id'),
			'dataChunk' => array(self::BELONGS_TO, 'DataChunk', 'data_chunk_id'),
			'videoFile' => array(self::BELONGS_TO, 'VideoFile', 'video_file_id'),
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'page_id' => Yii::t('crud', 'Page'),
			'ordinal' => Yii::t('crud', 'Ordinal'),
			'title' => Yii::t('crud', 'Title'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'viz_view_id' => Yii::t('crud', 'Viz View'),
			'video_file_id' => Yii::t('crud', 'Video File'),
			'teachers_guide_id' => Yii::t('crud', 'Teachers Guide'),
			'exercise_id' => Yii::t('crud', 'Exercise'),
			'presentation_id' => Yii::t('crud', 'Presentation'),
			'data_chunk_id' => Yii::t('crud', 'Data Chunk'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.page_id', $this->page_id);
		$criteria->compare('t.ordinal', $this->ordinal);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);
		$criteria->compare('t.viz_view_id', $this->viz_view_id);
		$criteria->compare('t.video_file_id', $this->video_file_id);
		$criteria->compare('t.teachers_guide_id', $this->teachers_guide_id);
		$criteria->compare('t.exercise_id', $this->exercise_id);
		$criteria->compare('t.presentation_id', $this->presentation_id);
		$criteria->compare('t.data_chunk_id', $this->data_chunk_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
