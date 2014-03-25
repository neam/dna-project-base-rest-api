<?php

/**
 * This is the model base class for the table "gui_section".
 *
 * Columns in table "gui_section" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title
 * @property string $slug
 * @property string $created
 * @property string $modified
 * @property string $i18n_catalog_id
 * @property integer $owner_id
 * @property string $node_id
 * @property string $gui_section_qa_state_id
 *
 * Relations of table "gui_section" available as properties of the model:
 * @property Account $owner
 * @property GuiSection $clonedFrom
 * @property GuiSection[] $guiSections
 * @property I18nCatalog $i18nCatalog
 * @property Node $node
 * @property GuiSectionQaState $guiSectionQaState
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
                array('version, cloned_from_id, title, slug, created, modified, i18n_catalog_id, owner_id, node_id, gui_section_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, owner_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, i18n_catalog_id, node_id, gui_section_qa_state_id', 'length', 'max' => 20),
                array('title, slug', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, version, cloned_from_id, title, slug, created, modified, i18n_catalog_id, owner_id, node_id, gui_section_qa_state_id', 'safe', 'on' => 'search'),
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
                'owner' => array(self::BELONGS_TO, 'Account', 'owner_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'GuiSection', 'cloned_from_id'),
                'guiSections' => array(self::HAS_MANY, 'GuiSection', 'cloned_from_id'),
                'i18nCatalog' => array(self::BELONGS_TO, 'I18nCatalog', 'i18n_catalog_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'guiSectionQaState' => array(self::BELONGS_TO, 'GuiSectionQaState', 'gui_section_qa_state_id'),
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
            'slug' => Yii::t('model', 'Slug'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'i18n_catalog_id' => Yii::t('model', 'I18n Catalog'),
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'gui_section_qa_state_id' => Yii::t('model', 'Gui Section Qa State'),
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
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.i18n_catalog_id', $this->i18n_catalog_id);
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.gui_section_qa_state_id', $this->gui_section_qa_state_id);


        return $criteria;

    }

}
