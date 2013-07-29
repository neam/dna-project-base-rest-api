<?php

/**
 * This is the model base class for the table "section".
 *
 * Columns in table "section" available as properties of the model:
 * @property string $id
 * @property string $chapter_id
 * @property string $title_en
 * @property string $slug_en
 * @property integer $ordinal
 * @property string $menu_label_en
 * @property string $created
 * @property string $modified
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_cn
 * @property string $title_de
 * @property string $slug_es
 * @property string $slug_fa
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_cn
 * @property string $slug_de
 * @property string $menu_label_es
 * @property string $menu_label_fa
 * @property string $menu_label_hi
 * @property string $menu_label_pt
 * @property string $menu_label_sv
 * @property string $menu_label_cn
 * @property string $menu_label_de
 *
 * Relations of table "section" available as properties of the model:
 * @property Chapter $chapter
 * @property SectionContent[] $sectionContents
 */
abstract class BaseSection extends ActiveRecord
{

    public static function model($className = __CLASS__)
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
                array('title_en, slug_en, ordinal, menu_label_en, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, menu_label_es, menu_label_fa, menu_label_hi, menu_label_pt, menu_label_sv, menu_label_cn, menu_label_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('ordinal', 'numerical', 'integerOnly' => true),
                array('chapter_id', 'length', 'max' => 20),
                array('title_en, slug_en, menu_label_en, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, menu_label_es, menu_label_fa, menu_label_hi, menu_label_pt, menu_label_sv, menu_label_cn, menu_label_de', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, chapter_id, title_en, slug_en, ordinal, menu_label_en, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, menu_label_es, menu_label_fa, menu_label_hi, menu_label_pt, menu_label_sv, menu_label_cn, menu_label_de', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->chapter_id;
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
            'title_en' => Yii::t('crud', 'Title En'),
            'slug_en' => Yii::t('crud', 'Slug En'),
            'ordinal' => Yii::t('crud', 'Ordinal'),
            'menu_label_en' => Yii::t('crud', 'Menu Label En'),
            'created' => Yii::t('crud', 'Created'),
            'modified' => Yii::t('crud', 'Modified'),
            'title_es' => Yii::t('crud', 'Title Es'),
            'title_fa' => Yii::t('crud', 'Title Fa'),
            'title_hi' => Yii::t('crud', 'Title Hi'),
            'title_pt' => Yii::t('crud', 'Title Pt'),
            'title_sv' => Yii::t('crud', 'Title Sv'),
            'title_cn' => Yii::t('crud', 'Title Cn'),
            'title_de' => Yii::t('crud', 'Title De'),
            'slug_es' => Yii::t('crud', 'Slug Es'),
            'slug_fa' => Yii::t('crud', 'Slug Fa'),
            'slug_hi' => Yii::t('crud', 'Slug Hi'),
            'slug_pt' => Yii::t('crud', 'Slug Pt'),
            'slug_sv' => Yii::t('crud', 'Slug Sv'),
            'slug_cn' => Yii::t('crud', 'Slug Cn'),
            'slug_de' => Yii::t('crud', 'Slug De'),
            'menu_label_es' => Yii::t('crud', 'Menu Label Es'),
            'menu_label_fa' => Yii::t('crud', 'Menu Label Fa'),
            'menu_label_hi' => Yii::t('crud', 'Menu Label Hi'),
            'menu_label_pt' => Yii::t('crud', 'Menu Label Pt'),
            'menu_label_sv' => Yii::t('crud', 'Menu Label Sv'),
            'menu_label_cn' => Yii::t('crud', 'Menu Label Cn'),
            'menu_label_de' => Yii::t('crud', 'Menu Label De'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.chapter_id', $this->chapter_id);
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t.ordinal', $this->ordinal);
        $criteria->compare('t.menu_label_en', $this->menu_label_en, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.title_es', $this->title_es, true);
        $criteria->compare('t.title_fa', $this->title_fa, true);
        $criteria->compare('t.title_hi', $this->title_hi, true);
        $criteria->compare('t.title_pt', $this->title_pt, true);
        $criteria->compare('t.title_sv', $this->title_sv, true);
        $criteria->compare('t.title_cn', $this->title_cn, true);
        $criteria->compare('t.title_de', $this->title_de, true);
        $criteria->compare('t.slug_es', $this->slug_es, true);
        $criteria->compare('t.slug_fa', $this->slug_fa, true);
        $criteria->compare('t.slug_hi', $this->slug_hi, true);
        $criteria->compare('t.slug_pt', $this->slug_pt, true);
        $criteria->compare('t.slug_sv', $this->slug_sv, true);
        $criteria->compare('t.slug_cn', $this->slug_cn, true);
        $criteria->compare('t.slug_de', $this->slug_de, true);
        $criteria->compare('t.menu_label_es', $this->menu_label_es, true);
        $criteria->compare('t.menu_label_fa', $this->menu_label_fa, true);
        $criteria->compare('t.menu_label_hi', $this->menu_label_hi, true);
        $criteria->compare('t.menu_label_pt', $this->menu_label_pt, true);
        $criteria->compare('t.menu_label_sv', $this->menu_label_sv, true);
        $criteria->compare('t.menu_label_cn', $this->menu_label_cn, true);
        $criteria->compare('t.menu_label_de', $this->menu_label_de, true);

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
