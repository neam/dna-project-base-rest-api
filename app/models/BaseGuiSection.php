<?php

/**
 * This is the model base class for the table "gui_section".
 *
 * Columns in table "gui_section" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $created
 * @property string $modified
 * @property string $i18n_catalog_id
 *
 * Relations of table "gui_section" available as properties of the model:
 * @property I18nCatalog $i18nCatalog
 */
abstract class BaseGuiSection extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'gui_section';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title, slug, created, modified, i18n_catalog_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('title, slug', 'length', 'max' => 255),
                array('i18n_catalog_id', 'length', 'max' => 20),
                array('created, modified', 'safe'),
                array('id, title, slug, created, modified, i18n_catalog_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->title;
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
                'i18nCatalog' => array(self::BELONGS_TO, 'I18nCatalog', 'i18n_catalog_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'title' => Yii::t('model', 'Title'),
            'slug' => Yii::t('model', 'Slug'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'i18n_catalog_id' => Yii::t('model', 'I18n Catalog'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.i18n_catalog_id', $this->i18n_catalog_id);


        return $criteria;

    }

}
