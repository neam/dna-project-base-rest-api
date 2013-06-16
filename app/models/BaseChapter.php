<?php

/**
 * This is the model base class for the table "chapter".
 *
 * Columns in table "chapter" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $created
 * @property string $modified
 *
 * Relations of table "chapter" available as properties of the model:
 * @property Section[] $sections
 */
abstract class BaseChapter extends ActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'chapter';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, slug, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title, slug', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			array('id, title, slug, created, modified', 'safe', 'on'=>'search'),
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
			'sections' => array(self::HAS_MANY, 'Section', 'chapter_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title' => Yii::t('crud', 'Title'),
			'slug' => Yii::t('crud', 'Slug'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.slug', $this->slug, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
