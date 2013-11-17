<?php

/**
 * This is the model base class for the table "section".
 *
 * Columns in table "section" available as properties of the model:
 * @property string $id
 * @property string $page_id
 * @property string $_title
 * @property string $slug_en
 * @property integer $ordinal
 * @property string $_menu_label
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property string $slug_es
 * @property string $slug_fa
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_cn
 * @property string $slug_de
 *
 * Relations of table "section" available as properties of the model:
 * @property Node $node
 * @property Page $page
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
                array('page_id', 'required'),
                array('_title, slug_en, ordinal, _menu_label, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('ordinal', 'numerical', 'integerOnly' => true),
                array('page_id, node_id', 'length', 'max' => 20),
                array('_title, slug_en, _menu_label, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, page_id, _title, slug_en, ordinal, _menu_label, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->page_id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(), array(
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'section_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'page_id' => Yii::t('model', 'Page'),
            '_title' => Yii::t('model', 'Title'),
            'slug_en' => Yii::t('model', 'Slug En'),
            'ordinal' => Yii::t('model', 'Ordinal'),
            '_menu_label' => Yii::t('model', 'Menu Label'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'slug_es' => Yii::t('model', 'Slug Es'),
            'slug_fa' => Yii::t('model', 'Slug Fa'),
            'slug_hi' => Yii::t('model', 'Slug Hi'),
            'slug_pt' => Yii::t('model', 'Slug Pt'),
            'slug_sv' => Yii::t('model', 'Slug Sv'),
            'slug_cn' => Yii::t('model', 'Slug Cn'),
            'slug_de' => Yii::t('model', 'Slug De'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.page_id', $this->page_id);
        $criteria->compare('t._title', $this->_title, true);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t.ordinal', $this->ordinal);
        $criteria->compare('t._menu_label', $this->_menu_label, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.slug_es', $this->slug_es, true);
        $criteria->compare('t.slug_fa', $this->slug_fa, true);
        $criteria->compare('t.slug_hi', $this->slug_hi, true);
        $criteria->compare('t.slug_pt', $this->slug_pt, true);
        $criteria->compare('t.slug_sv', $this->slug_sv, true);
        $criteria->compare('t.slug_cn', $this->slug_cn, true);
        $criteria->compare('t.slug_de', $this->slug_de, true);


        return $criteria;

    }

}
