<?php

/**
 * This is the model base class for the table "chapter".
 *
 * Columns in table "chapter" available as properties of the model:
 * @property string $id
 * @property string $title_en
 * @property string $slug_en
 * @property string $created
 * @property string $modified
 * @property string $slug_es
 * @property string $title_es
 * @property string $slug_fa
 * @property string $title_fa
 * @property string $slug_hi
 * @property string $title_hi
 * @property string $slug_pt
 * @property string $title_pt
 * @property string $slug_sv
 * @property string $title_sv
 * @property string $slug_de
 * @property string $title_de
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
			array('title_en, slug_en, created, modified, slug_es, title_es, slug_fa, title_fa, slug_hi, title_hi, slug_pt, title_pt, slug_sv, title_sv, slug_de, title_de', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title_en, slug_en, slug_es, title_es, slug_fa, title_fa, slug_hi, title_hi, slug_pt, title_pt, slug_sv, title_sv, slug_de, title_de', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			array('id, title_en, slug_en, created, modified, slug_es, title_es, slug_fa, title_fa, slug_hi, title_hi, slug_pt, title_pt, slug_sv, title_sv, slug_de, title_de', 'safe', 'on'=>'search'),
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
			'title_en' => Yii::t('crud', 'Title En'),
			'slug_en' => Yii::t('crud', 'Slug En'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'slug_es' => Yii::t('crud', 'Slug Es'),
			'title_es' => Yii::t('crud', 'Title Es'),
			'slug_fa' => Yii::t('crud', 'Slug Fa'),
			'title_fa' => Yii::t('crud', 'Title Fa'),
			'slug_hi' => Yii::t('crud', 'Slug Hi'),
			'title_hi' => Yii::t('crud', 'Title Hi'),
			'slug_pt' => Yii::t('crud', 'Slug Pt'),
			'title_pt' => Yii::t('crud', 'Title Pt'),
			'slug_sv' => Yii::t('crud', 'Slug Sv'),
			'title_sv' => Yii::t('crud', 'Title Sv'),
			'slug_de' => Yii::t('crud', 'Slug De'),
			'title_de' => Yii::t('crud', 'Title De'),
		);
	}


	public function search($criteria = null)
	{
        if (is_null($criteria)) {
    		$criteria=new CDbCriteria;
        }

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title_en', $this->title_en, true);
		$criteria->compare('t.slug_en', $this->slug_en, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);
		$criteria->compare('t.slug_es', $this->slug_es, true);
		$criteria->compare('t.title_es', $this->title_es, true);
		$criteria->compare('t.slug_fa', $this->slug_fa, true);
		$criteria->compare('t.title_fa', $this->title_fa, true);
		$criteria->compare('t.slug_hi', $this->slug_hi, true);
		$criteria->compare('t.title_hi', $this->title_hi, true);
		$criteria->compare('t.slug_pt', $this->slug_pt, true);
		$criteria->compare('t.title_pt', $this->title_pt, true);
		$criteria->compare('t.slug_sv', $this->slug_sv, true);
		$criteria->compare('t.title_sv', $this->title_sv, true);
		$criteria->compare('t.slug_de', $this->slug_de, true);
		$criteria->compare('t.title_de', $this->title_de, true);

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
