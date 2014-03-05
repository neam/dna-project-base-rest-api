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
 * @property integer $owner_id
 * @property string $node_id
 * @property string $gui_section_qa_state_id
 *
 * Relations of table "gui_section" available as properties of the model:
 * @property Account $owner
 * @property Node $node
 * @property I18nCatalog $i18nCatalog
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
                array('title, slug, created, modified, i18n_catalog_id, owner_id, node_id, gui_section_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('owner_id', 'numerical', 'integerOnly' => true),
                array('title, slug', 'length', 'max' => 255),
                array('i18n_catalog_id, node_id, gui_section_qa_state_id', 'length', 'max' => 20),
                array('created, modified', 'safe'),
                array('id, title, slug, created, modified, i18n_catalog_id, owner_id, node_id, gui_section_qa_state_id', 'safe', 'on' => 'search'),
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
                'owner' => array(self::BELONGS_TO, 'Account', 'owner_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'i18nCatalog' => array(self::BELONGS_TO, 'I18nCatalog', 'i18n_catalog_id'),
                'guiSectionQaState' => array(self::BELONGS_TO, 'GuiSectionQaState', 'gui_section_qa_state_id'),
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
