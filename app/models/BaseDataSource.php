<?php

/**
 * This is the model base class for the table "data_source".
 *
 * Columns in table "data_source" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $created
 * @property string $modified
 *
 * Relations of table "data_source" available as properties of the model:
 * @property DataChunk[] $dataChunks
 * @property SpreadsheetFile[] $spreadsheetFiles
 */
abstract class BaseDataSource extends ActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'data_source';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			array('id, title, created, modified', 'safe', 'on'=>'search'),
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
			'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'data_source_id'),
			'spreadsheetFiles' => array(self::HAS_MANY, 'SpreadsheetFile', 'data_source_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title' => Yii::t('crud', 'Title'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
