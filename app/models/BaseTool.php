<?php

/**
 * This is the model base class for the table "tool".
 *
 * Columns in table "tool" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title
 * @property string $slug_en
 * @property string $about
 * @property string $embed_template
 * @property string $po_file_id
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
 * @property string $tool_qa_state_id
 *
 * Relations of table "tool" available as properties of the model:
 * @property Snapshot[] $snapshots
 * @property Node $node
 * @property PoFile $poFile
 * @property Tool $clonedFrom
 * @property Tool[] $tools
 * @property ToolQaState $toolQaState
 */
abstract class BaseTool extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tool';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title, slug_en, about, embed_template, po_file_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, tool_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, po_file_id, node_id, tool_qa_state_id', 'length', 'max' => 20),
                array('title, slug_en, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('about, embed_template, created, modified', 'safe'),
                array('id, version, cloned_from_id, title, slug_en, about, embed_template, po_file_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, tool_qa_state_id', 'safe', 'on' => 'search'),
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
                'snapshots' => array(self::HAS_MANY, 'Snapshot', 'tool_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'poFile' => array(self::BELONGS_TO, 'PoFile', 'po_file_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'Tool', 'cloned_from_id'),
                'tools' => array(self::HAS_MANY, 'Tool', 'cloned_from_id'),
                'toolQaState' => array(self::BELONGS_TO, 'ToolQaState', 'tool_qa_state_id'),
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
            'embed_template' => Yii::t('model', 'Embed Template'),
            'po_file_id' => Yii::t('model', 'Po File'),
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
            'tool_qa_state_id' => Yii::t('model', 'Tool Qa State'),
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
        $criteria->compare('t.embed_template', $this->embed_template, true);
        $criteria->compare('t.po_file_id', $this->po_file_id);
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
        $criteria->compare('t.tool_qa_state_id', $this->tool_qa_state_id);


        return $criteria;

    }

}
