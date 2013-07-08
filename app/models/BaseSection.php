<?php

/**
 * This is the model base class for the table "section".
 *
 * Columns in table "section" available as properties of the model:
 * @property string $id
 * @property string $chapter_id
 * @property string $title
 * @property string $slug
 * @property integer $ordinal
 * @property string $menu_label
 * @property string $created
 * @property string $modified
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
			array('title, slug, ordinal, menu_label, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('ordinal', 'numerical', 'integerOnly'=>true),
			array('chapter_id', 'length', 'max'=>20),
			array('title, slug, menu_label', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			array('id, chapter_id, title, slug, ordinal, menu_label, created, modified', 'safe', 'on'=>'search'),
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
			'chapter_id' => Yii::t('crud', 'Chapter'),
			'title' => Yii::t('crud', 'Title'),
			'slug' => Yii::t('crud', 'Slug'),
			'ordinal' => Yii::t('crud', 'Ordinal'),
			'menu_label' => Yii::t('crud', 'Menu Label'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
		);
	}


	public function search($criteria = null)
	{
        if (is_null($criteria)) {
    		$criteria=new CDbCriteria;
        }

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.chapter_id', $this->chapter_id);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.slug', $this->slug, true);
		$criteria->compare('t.ordinal', $this->ordinal);
		$criteria->compare('t.menu_label', $this->menu_label, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);

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
