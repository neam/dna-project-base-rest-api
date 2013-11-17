<?php

/**
 * This is the model base class for the table "page".
 *
 * Columns in table "page" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title
 * @property string $slug_en
 * @property string $about
 * @property string $created
 * @property string $modified
 * @property string $slug_es
 * @property string $slug_fa
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_cn
 * @property string $slug_de
 *
 * Relations of table "page" available as properties of the model:
 * @property Page $clonedFrom
 * @property Page[] $pages
 * @property Section[] $sections
 */
abstract class BasePage extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'page';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title, slug_en, about, created, modified, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id', 'length', 'max' => 20),
                array('title, slug_en, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('about, created, modified', 'safe'),
                array('id, version, cloned_from_id, title, slug_en, about, created, modified, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->cloned_from_id;
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
                'clonedFrom' => array(self::BELONGS_TO, 'Page', 'cloned_from_id'),
                'pages' => array(self::HAS_MANY, 'Page', 'cloned_from_id'),
                'sections' => array(self::HAS_MANY, 'Section', 'page_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'title' => Yii::t('model', 'Title'),
            'slug_en' => Yii::t('model', 'Slug En'),
            'about' => Yii::t('model', 'About'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
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
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
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
