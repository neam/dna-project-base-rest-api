<?php

/**
 * This is the model base class for the table "video_file".
 *
 * Columns in table "video_file" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $type
 * @property string $created
 * @property string $modified
 * @property integer $original_media_id
 * @property integer $processed_media_id
 *
 * Relations of table "video_file" available as properties of the model:
 * @property SectionContent[] $sectionContents
 * @property P3Media $originalMedia
 * @property P3Media $processedMedia
 */
abstract class BaseVideoFile extends ActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'video_file';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, type, created, modified, original_media_id, processed_media_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('original_media_id, processed_media_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('type', 'length', 'max'=>12),
			array('created, modified', 'safe'),
			array('id, title, type, created, modified, original_media_id, processed_media_id', 'safe', 'on'=>'search'),
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
			'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'video_file_id'),
			'originalMedia' => array(self::BELONGS_TO, 'P3Media', 'original_media_id'),
			'processedMedia' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title' => Yii::t('crud', 'Title'),
			'type' => Yii::t('crud', 'Type'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'original_media_id' => Yii::t('crud', 'Original Media'),
			'processed_media_id' => Yii::t('crud', 'Processed Media'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.type', $this->type, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);
		$criteria->compare('t.original_media_id', $this->original_media_id);
		$criteria->compare('t.processed_media_id', $this->processed_media_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
