<?php

/**
 * This is the model base class for the table "waffle".
 *
 * Columns in table "waffle" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property string $slug
 * @property string $created
 * @property string $modified
 *
 * Relations of table "waffle" available as properties of the model:
 * @property Waffle $clonedFrom
 * @property Waffle[] $waffles
 * @property WaffleCategory[] $waffleCategories
 * @property WaffleDataSource[] $waffleDataSources
 * @property WaffleIndicator[] $waffleIndicators
 * @property WaffleTag[] $waffleTags
 * @property WaffleUnit[] $waffleUnits
 */
abstract class BaseWaffle extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'waffle';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, _title, slug, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id', 'length', 'max' => 20),
                array('_title, slug, created, modified', 'length', 'max' => 255),
                array('id, version, cloned_from_id, _title, slug, created, modified', 'safe', 'on' => 'search'),
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
                'clonedFrom' => array(self::BELONGS_TO, 'Waffle', 'cloned_from_id'),
                'waffles' => array(self::HAS_MANY, 'Waffle', 'cloned_from_id'),
                'waffleCategories' => array(self::HAS_MANY, 'WaffleCategory', 'waffle_id'),
                'waffleDataSources' => array(self::HAS_MANY, 'WaffleDataSource', 'waffle_id'),
                'waffleIndicators' => array(self::HAS_MANY, 'WaffleIndicator', 'waffle_id'),
                'waffleTags' => array(self::HAS_MANY, 'WaffleTag', 'waffle_id'),
                'waffleUnits' => array(self::HAS_MANY, 'WaffleUnit', 'waffle_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            '_title' => Yii::t('model', 'Title'),
            'slug' => Yii::t('model', 'Slug'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
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
        $criteria->compare('t._title', $this->_title, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
