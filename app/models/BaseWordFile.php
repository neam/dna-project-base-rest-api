<?php

/**
 * This is the model base class for the table "word_file".
 *
 * Columns in table "word_file" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $created
 * @property string $modified
 * @property integer $original_media_id
 * @property integer $processed_media_id
 *
 * Relations of table "word_file" available as properties of the model:
 * @property P3Media $originalMedia
 * @property P3Media $processedMedia
 */
abstract class BaseWordFile extends ActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'word_file';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, created, modified, original_media_id, processed_media_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('original_media_id, processed_media_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			array('id, title, created, modified, original_media_id, processed_media_id', 'safe', 'on'=>'search'),
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
			'originalMedia' => array(self::BELONGS_TO, 'P3Media', 'original_media_id'),
			'processedMedia' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title' => Yii::t('crud', 'Title'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
			'original_media_id' => Yii::t('crud', 'Original Media'),
			'processed_media_id' => Yii::t('crud', 'Processed Media'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);
		$criteria->compare('t.original_media_id', $this->original_media_id);
		$criteria->compare('t.processed_media_id', $this->processed_media_id);

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