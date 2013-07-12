<?php

/**
 * This is the model base class for the table "viz_view".
 *
 * Columns in table "viz_view" available as properties of the model:
 * @property string $id
 * @property string $title_en
 * @property string $embed_template
 * @property string $created
 * @property string $modified
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_de
 *
 * Relations of table "viz_view" available as properties of the model:
 * @property SectionContent[] $sectionContents
 */
abstract class BaseVizView extends ActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'viz_view';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title_en, embed_template, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_de', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title_en, title_es, title_fa, title_hi, title_pt, title_sv, title_de', 'length', 'max'=>255),
			array('embed_template, created, modified', 'safe'),
			array('id, title_en, embed_template, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_de', 'safe', 'on'=>'search'),
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
			'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'viz_view_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title_en' => Yii::t('crud', 'Title En'),
			'embed_template' => Yii::t('crud', 'Embed Template'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'title_es' => Yii::t('crud', 'Title Es'),
			'title_fa' => Yii::t('crud', 'Title Fa'),
			'title_hi' => Yii::t('crud', 'Title Hi'),
			'title_pt' => Yii::t('crud', 'Title Pt'),
			'title_sv' => Yii::t('crud', 'Title Sv'),
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
		$criteria->compare('t.embed_template', $this->embed_template, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);
		$criteria->compare('t.title_es', $this->title_es, true);
		$criteria->compare('t.title_fa', $this->title_fa, true);
		$criteria->compare('t.title_hi', $this->title_hi, true);
		$criteria->compare('t.title_pt', $this->title_pt, true);
		$criteria->compare('t.title_sv', $this->title_sv, true);
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
