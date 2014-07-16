<?php

/**
 * This is the model base class for the table "i18n_catalog".
 *
 * Columns in table "i18n_catalog" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title
 * @property string $about
 * @property string $i18n_category
 * @property string $po_contents
 * @property integer $pot_import_media_id
 * @property string $created
 * @property string $modified
 * @property integer $owner_id
 * @property string $node_id
 * @property string $i18n_catalog_qa_state_id
 *
 * Relations of table "i18n_catalog" available as properties of the model:
 * @property GuiSection[] $guiSections
 * @property I18nCatalog $clonedFrom
 * @property I18nCatalog[] $i18nCatalogs
 * @property Node $node
 * @property P3Media $potImportMedia
 * @property Account $owner
 * @property I18nCatalogQaState $i18nCatalogQaState
 * @property Tool[] $tools
 */
abstract class BaseI18nCatalog extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'i18n_catalog';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title, about, i18n_category, po_contents, pot_import_media_id, created, modified, owner_id, node_id, i18n_catalog_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, pot_import_media_id, owner_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, i18n_catalog_qa_state_id', 'length', 'max' => 20),
                array('title, i18n_category', 'length', 'max' => 255),
                array('about, po_contents, created, modified', 'safe'),
                array('id, version, cloned_from_id, title, about, i18n_category, po_contents, pot_import_media_id, created, modified, owner_id, node_id, i18n_catalog_qa_state_id', 'safe', 'on' => 'search'),
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
                'guiSections' => array(self::HAS_MANY, 'GuiSection', 'i18n_catalog_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'I18nCatalog', 'cloned_from_id'),
                'i18nCatalogs' => array(self::HAS_MANY, 'I18nCatalog', 'cloned_from_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'potImportMedia' => array(self::BELONGS_TO, 'P3Media', 'pot_import_media_id'),
                'owner' => array(self::BELONGS_TO, 'Account', 'owner_id'),
                'i18nCatalogQaState' => array(self::BELONGS_TO, 'I18nCatalogQaState', 'i18n_catalog_qa_state_id'),
                'tools' => array(self::HAS_MANY, 'Tool', 'i18n_catalog_id'),
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
            'about' => Yii::t('model', 'About'),
            'i18n_category' => Yii::t('model', 'I18n Category'),
            'po_contents' => Yii::t('model', 'Po Contents'),
            'pot_import_media_id' => Yii::t('model', 'Pot Import Media'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'i18n_catalog_qa_state_id' => Yii::t('model', 'I18n Catalog Qa State'),
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
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.i18n_category', $this->i18n_category, true);
        $criteria->compare('t.po_contents', $this->po_contents, true);
        $criteria->compare('t.pot_import_media_id', $this->pot_import_media_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.i18n_catalog_qa_state_id', $this->i18n_catalog_qa_state_id);


        return $criteria;

    }

}
