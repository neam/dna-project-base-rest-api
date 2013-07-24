<?php

/**
 * This is the model base class for the table "presentation".
 *
 * Columns in table "presentation" available as properties of the model:
 * @property string $id
 * @property string $title_en
 * @property string $created
 * @property string $modified
 * @property string $slideshow_file_id
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_de
 * @property string $title_cn
 *
 * Relations of table "presentation" available as properties of the model:
 * @property SlideshowFile $slideshowFile
 * @property SectionContent[] $sectionContents
 */
abstract class BasePresentation extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'presentation';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title_en, created, modified, slideshow_file_id, title_es, title_fa, title_hi, title_pt, title_sv, title_de, title_cn', 'default', 'setOnEmpty' => true, 'value' => null),
                array('title_en, title_es, title_fa, title_hi, title_pt, title_sv, title_de, title_cn', 'length', 'max' => 255),
                array('slideshow_file_id', 'length', 'max' => 20),
                array('created, modified', 'safe'),
                array('id, title_en, created, modified, slideshow_file_id, title_es, title_fa, title_hi, title_pt, title_sv, title_de, title_cn', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->title_en;
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
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'presentation_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('crud', 'ID'),
            'title_en' => Yii::t('crud', 'Title En'),
            'created' => Yii::t('crud', 'Created'),
            'modified' => Yii::t('crud', 'Modified'),
            'slideshow_file_id' => Yii::t('crud', 'Slideshow File'),
            'title_es' => Yii::t('crud', 'Title Es'),
            'title_fa' => Yii::t('crud', 'Title Fa'),
            'title_hi' => Yii::t('crud', 'Title Hi'),
            'title_pt' => Yii::t('crud', 'Title Pt'),
            'title_sv' => Yii::t('crud', 'Title Sv'),
            'title_de' => Yii::t('crud', 'Title De'),
            'title_cn' => Yii::t('crud', 'Title Cn'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.slideshow_file_id', $this->slideshow_file_id);
        $criteria->compare('t.title_es', $this->title_es, true);
        $criteria->compare('t.title_fa', $this->title_fa, true);
        $criteria->compare('t.title_hi', $this->title_hi, true);
        $criteria->compare('t.title_pt', $this->title_pt, true);
        $criteria->compare('t.title_sv', $this->title_sv, true);
        $criteria->compare('t.title_de', $this->title_de, true);
        $criteria->compare('t.title_cn', $this->title_cn, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
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
     *    ...
     *        'dataProvider' => $relatedSearchModel->search(),
     *        'filter' => $relatedSearchModel,
     *    ...
     * @returns CActiveRecord
     */
    public function getRelatedSearchModel($name)
    {

        $md = $this->getMetaData();
        if (!isset($md->relations[$name])) {
            throw new CDbException(Yii::t('yii', '{class} does not have relation "{name}".', array('{class}' => get_class($this), '{name}' => $name)));
        }

        $relation = $md->relations[$name];
        if (!($relation instanceof CHasManyRelation)) {
            throw new CException("Currently works with HAS_MANY relations only");
        }

        $className = $relation->className;
        $related = new $className('search');
        $related->unsetAttributes();
        $related->{$relation->foreignKey} = $this->primaryKey;
        if (isset($_GET[$className])) {
            $related->attributes = $_GET[$className];
        }
        return $related;
    }

}
