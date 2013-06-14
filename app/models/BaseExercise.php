<?php

/**
 * This is the model base class for the table "exercise".
 *
 * Columns in table "exercise" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $created
 * @property string $modified
 * @property string $slide_show_file_id
 *
 * Relations of table "exercise" available as properties of the model:
 * @property SlideShowFile $slideShowFile
 * @property PageAssociation[] $pageAssociations
 */
abstract class BaseExercise extends CActiveRecord{
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
			array('title, created, modified, slide_show_file_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title', 'length', 'max'=>255),
			array('slide_show_file_id', 'length', 'max'=>20),
			array('created, modified', 'safe'),
			array('id, title, created, modified, slide_show_file_id', 'safe', 'on'=>'search'),
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
			'slideShowFile' => array(self::BELONGS_TO, 'SlideShowFile', 'slide_show_file_id'),
			'pageAssociations' => array(self::HAS_MANY, 'PageAssociation', 'exercise_id'),
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

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
