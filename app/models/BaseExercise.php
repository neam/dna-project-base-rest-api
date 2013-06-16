<?php

/**
 * This is the model base class for the table "exercise".
 *
 * Columns in table "exercise" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $created
 * @property string $modified
 * @property string $slideshow_file_id
 *
 * Relations of table "exercise" available as properties of the model:
 * @property SlideshowFile $slideshowFile
 */
abstract class BaseExercise extends ActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'exercise';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, created, modified, slideshow_file_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title', 'length', 'max'=>255),
			array('slideshow_file_id', 'length', 'max'=>20),
			array('created, modified', 'safe'),
			array('id, title, created, modified, slideshow_file_id', 'safe', 'on'=>'search'),
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
			'slideshowFile' => array(self::BELONGS_TO, 'SlideshowFile', 'slideshow_file_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title' => Yii::t('crud', 'Title'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'slideshow_file_id' => Yii::t('crud', 'Slideshow File'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);
		$criteria->compare('t.slideshow_file_id', $this->slideshow_file_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
