<?php

/**
 * This is the model base class for the table "spreadsheet_file".
 *
 * Columns in table "spreadsheet_file" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $created
 * @property string $modified
 * @property string $data_source_id
 * @property integer $original_file_id
 * @property integer $processed_file_id
 *
 * Relations of table "spreadsheet_file" available as properties of the model:
 * @property DataChunk[] $dataChunks
 * @property DataSource $dataSource
 * @property P3Media $originalFile
 * @property P3Media $processedFile
 */
abstract class BaseSpreadsheetFile extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'spreadsheet_file';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, created, modified, data_source_id, original_file_id, processed_file_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('original_file_id, processed_file_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('data_source_id', 'length', 'max'=>20),
			array('created, modified', 'safe'),
			array('id, title, created, modified, data_source_id, original_file_id, processed_file_id', 'safe', 'on'=>'search'),
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
			'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'spreadsheet_file_id'),
			'dataSource' => array(self::BELONGS_TO, 'DataSource', 'data_source_id'),
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
			'data_source_id' => Yii::t('crud', 'Data Source'),
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
		$criteria->compare('t.data_source_id', $this->data_source_id);
		$criteria->compare('t.original_file_id', $this->original_file_id);
		$criteria->compare('t.processed_file_id', $this->processed_file_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
