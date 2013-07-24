<?php

/**
 * This is the model base class for the table "html_chunk".
 *
 * Columns in table "html_chunk" available as properties of the model:
 * @property string $id
 * @property string $markup_en
 * @property string $created
 * @property string $modified
 * @property string $markup_es
 * @property string $markup_fa
 * @property string $markup_hi
 * @property string $markup_pt
 * @property string $markup_sv
 * @property string $markup_de
 *
 * Relations of table "html_chunk" available as properties of the model:
 * @property SectionContent[] $sectionContents
 */
abstract class BaseHtmlChunk extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'html_chunk';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('markup_en, created, modified, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('markup_en, created, modified, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_de', 'safe'),
                array('id, markup_en, created, modified, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_de', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->markup_en;
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
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'html_chunk_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('crud', 'ID'),
            'markup_en' => Yii::t('crud', 'Markup En'),
            'created' => Yii::t('crud', 'Created'),
            'modified' => Yii::t('crud', 'Modified'),
            'markup_es' => Yii::t('crud', 'Markup Es'),
            'markup_fa' => Yii::t('crud', 'Markup Fa'),
            'markup_hi' => Yii::t('crud', 'Markup Hi'),
            'markup_pt' => Yii::t('crud', 'Markup Pt'),
            'markup_sv' => Yii::t('crud', 'Markup Sv'),
            'markup_de' => Yii::t('crud', 'Markup De'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.markup_en', $this->markup_en, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.markup_es', $this->markup_es, true);
        $criteria->compare('t.markup_fa', $this->markup_fa, true);
        $criteria->compare('t.markup_hi', $this->markup_hi, true);
        $criteria->compare('t.markup_pt', $this->markup_pt, true);
        $criteria->compare('t.markup_sv', $this->markup_sv, true);
        $criteria->compare('t.markup_de', $this->markup_de, true);

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
