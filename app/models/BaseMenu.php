<?php

/**
 * This is the model base class for the table "menu".
 *
 * Columns in table "menu" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property string $slug
 * @property string $created
 * @property string $modified
 *
 * Relations of table "menu" available as properties of the model:
 * @property Menu $clonedFrom
 * @property Menu[] $menus
 */
abstract class BaseMenu extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'menu';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, _title, slug, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id', 'length', 'max' => 20),
                array('_title, slug', 'length', 'max' => 255),
                array('created, modified', 'safe'),
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
                'clonedFrom' => array(self::BELONGS_TO, 'Menu', 'cloned_from_id'),
                'menus' => array(self::HAS_MANY, 'Menu', 'cloned_from_id'),
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
