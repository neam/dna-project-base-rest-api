<?php

/**
 * This is the model base class for the table "presentation".
 *
 * Columns in table "presentation" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $created
 * @property string $modified
 * @property string $slide_show_file_id
 * @property integer $original_file_id
 * @property integer $processed_file_id
 *
 * Relations of table "presentation" available as properties of the model:
 * @property PageAssociation[] $pageAssociations
 * @property SlideShowFile $slideShowFile
 * @property P3Media $originalFile
 * @property P3Media $processedFile
 */
abstract class BasePresentation extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'presentation';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, created, modified, slide_show_file_id, original_file_id, processed_file_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('original_file_id, processed_file_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('slide_show_file_id', 'length', 'max'=>20),
			array('created, modified', 'safe'),
			array('id, title, created, modified, slide_show_file_id, original_file_id, processed_file_id', 'safe', 'on'=>'search'),
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
			'pageAssociations' => array(self::HAS_MANY, 'PageAssociation', 'presentation_id'),
			'slideShowFile' => array(self::BELONGS_TO, 'SlideShowFile', 'slide_show_file_id'),
			'originalFile' => array(self::BELONGS_TO, 'P3Media', 'original_file_id'),
			'processedFile' => array(self::BELONGS_TO, 'P3Media', 'processed_file_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title' => Yii::t('crud', 'Title'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'slide_show_file_id' => Yii::t('crud', 'Slide Show File'),
			'original_file_id' => Yii::t('crud', 'Original File'),
			'processed_file_id' => Yii::t('crud', 'Processed File'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);
		$criteria->compare('t.slide_show_file_id', $this->slide_show_file_id);
		$criteria->compare('t.original_file_id', $this->original_file_id);
		$criteria->compare('t.processed_file_id', $this->processed_file_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
