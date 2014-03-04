<?php

/**
 * This is the model base class for the table "waffle_data_source".
 *
 * Columns in table "waffle_data_source" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $ref
 * @property string $_name
 * @property string $_short_name
 * @property string $link
 * @property integer $image_small_media_id
 * @property integer $image_large_media_id
 * @property string $waffle_id
 * @property string $created
 * @property string $modified
 *
 * Relations of table "waffle_data_source" available as properties of the model:
 * @property WaffleDataSource $clonedFrom
 * @property WaffleDataSource[] $waffleDataSources
 * @property Waffle $waffle
 * @property P3Media $imageSmallMedia
 * @property P3Media $imageLargeMedia
 */
abstract class BaseWaffleDataSource extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'waffle_data_source';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, ref, _name, _short_name, link, image_small_media_id, image_large_media_id, waffle_id, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, image_small_media_id, image_large_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, waffle_id', 'length', 'max' => 20),
                array('ref, _name, _short_name, link', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, version, cloned_from_id, ref, _name, _short_name, link, image_small_media_id, image_large_media_id, waffle_id, created, modified', 'safe', 'on' => 'search'),
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
                'clonedFrom' => array(self::BELONGS_TO, 'WaffleDataSource', 'cloned_from_id'),
                'waffleDataSources' => array(self::HAS_MANY, 'WaffleDataSource', 'cloned_from_id'),
                'waffle' => array(self::BELONGS_TO, 'Waffle', 'waffle_id'),
                'imageSmallMedia' => array(self::BELONGS_TO, 'P3Media', 'image_small_media_id'),
                'imageLargeMedia' => array(self::BELONGS_TO, 'P3Media', 'image_large_media_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'ref' => Yii::t('model', 'Ref'),
            '_name' => Yii::t('model', 'Name'),
            '_short_name' => Yii::t('model', 'Short Name'),
            'link' => Yii::t('model', 'Link'),
            'image_small_media_id' => Yii::t('model', 'Image Small Media'),
            'image_large_media_id' => Yii::t('model', 'Image Large Media'),
            'waffle_id' => Yii::t('model', 'Waffle'),
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
        $criteria->compare('t.ref', $this->ref, true);
        $criteria->compare('t._name', $this->_name, true);
        $criteria->compare('t._short_name', $this->_short_name, true);
        $criteria->compare('t.link', $this->link, true);
        $criteria->compare('t.image_small_media_id', $this->image_small_media_id);
        $criteria->compare('t.image_large_media_id', $this->image_large_media_id);
        $criteria->compare('t.waffle_id', $this->waffle_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
