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
 *
 * Relations of table "section_content" available as properties of the model:
 * @property Section $section
 * @property VizView $vizView
 * @property VideoFile $videoFile
 * @property TeachersGuide $teachersGuide
 * @property Exercise $exercise
 * @property Presentation $presentation
 * @property DownloadLink $downloadLink
 * @property DataChunk $dataChunk
 * @property HtmlChunk $htmlChunk
 */
abstract class BaseSectionContent extends ActiveRecord{
	public static function model($className=__CLASS__)
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
			array('ordinal, created, modified, html_chunk_id, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id, download_link_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('ordinal', 'numerical', 'integerOnly'=>true),
			array('section_id, html_chunk_id, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id, download_link_id', 'length', 'max'=>20),
			array('created, modified', 'safe'),
			array('id, section_id, ordinal, created, modified, html_chunk_id, viz_view_id, video_file_id, teachers_guide_id, exercise_id, presentation_id, data_chunk_id, download_link_id', 'safe', 'on'=>'search'),
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
			'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
			'vizView' => array(self::BELONGS_TO, 'VizView', 'viz_view_id'),
			'videoFile' => array(self::BELONGS_TO, 'VideoFile', 'video_file_id'),
			'teachersGuide' => array(self::BELONGS_TO, 'TeachersGuide', 'teachers_guide_id'),
			'exercise' => array(self::BELONGS_TO, 'Exercise', 'exercise_id'),
			'presentation' => array(self::BELONGS_TO, 'Presentation', 'presentation_id'),
			'downloadLink' => array(self::BELONGS_TO, 'DownloadLink', 'download_link_id'),
			'dataChunk' => array(self::BELONGS_TO, 'DataChunk', 'data_chunk_id'),
			'htmlChunk' => array(self::BELONGS_TO, 'HtmlChunk', 'html_chunk_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'section_id' => Yii::t('crud', 'Section'),
			'ordinal' => Yii::t('crud', 'Ordinal'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'html_chunk_id' => Yii::t('crud', 'Html Chunk'),
			'viz_view_id' => Yii::t('crud', 'Viz View'),
			'video_file_id' => Yii::t('crud', 'Video File'),
			'teachers_guide_id' => Yii::t('crud', 'Teachers Guide'),
			'exercise_id' => Yii::t('crud', 'Exercise'),
			'presentation_id' => Yii::t('crud', 'Presentation'),
			'data_chunk_id' => Yii::t('crud', 'Data Chunk'),
			'download_link_id' => Yii::t('crud', 'Download Link'),
		);
	}


	public function search($criteria = null)
	{
        if (is_null($criteria)) {
    		$criteria=new CDbCriteria;
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

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns a model used to populate a filterable, searchable
	 * and sortable CGridView with the records found by a model relation.
	 *
	 * Usage:
	 * $relatedSearchModel = $model->getRelatedSearchModel('relationName');
	 *
	 * Then, when invoking CGridView:
	 * 	...
	 * 		'dataProvider' => $relatedSearchModel->search(),
	 * 		'filter' => $relatedSearchModel,
	 * 	...
	 * @returns CActiveRecord
	 */
	public function getRelatedSearchModel($name)
	{

		$md = $this->getMetaData();
		if (!isset($md->relations[$name]))
			throw new CDbException(Yii::t('yii', '{class} does not have relation "{name}".', array('{class}' => get_class($this), '{name}' => $name)));

		$relation = $md->relations[$name];
		if (!($relation instanceof CHasManyRelation))
			throw new CException("Currently works with HAS_MANY relations only");

		$className = $relation->className;
		$related = new $className('search');
		$related->unsetAttributes();
		$related->{$relation->foreignKey} = $this->primaryKey;
		if (isset($_GET[$className]))
		{
			$related->attributes = $_GET[$className];
		}
		return $related;
	}

}
