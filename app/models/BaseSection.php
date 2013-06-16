<?php

/**
 * This is the model base class for the table "section".
 *
 * Columns in table "section" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $menu_label
 * @property string $created
 * @property string $modified
 * @property string $chapter_id
 *
 * Relations of table "section" available as properties of the model:
 * @property Chapter $chapter
 * @property SectionContent[] $sectionContents
 */
abstract class BaseSection extends ActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'section';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('chapter_id', 'required'),
			array('title, slug, menu_label, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title, slug, menu_label', 'length', 'max'=>255),
			array('chapter_id', 'length', 'max'=>20),
			array('created, modified', 'safe'),
			array('id, title, slug, menu_label, created, modified, chapter_id', 'safe', 'on'=>'search'),
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
			'chapter' => array(self::BELONGS_TO, 'Chapter', 'chapter_id'),
			'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'section_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title' => Yii::t('crud', 'Title'),
			'slug' => Yii::t('crud', 'Slug'),
			'menu_label' => Yii::t('crud', 'Menu Label'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'chapter_id' => Yii::t('crud', 'Chapter'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.slug', $this->slug, true);
		$criteria->compare('t.menu_label', $this->menu_label, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);
		$criteria->compare('t.chapter_id', $this->chapter_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
