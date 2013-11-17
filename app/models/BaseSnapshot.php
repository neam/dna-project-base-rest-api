<?php

/**
 * This is the model base class for the table "snapshot".
 *
 * Columns in table "snapshot" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property string $slug_en
 * @property string $_about
 * @property string $link
 * @property string $embed_override
 * @property string $tool_id
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
 * @property string $snapshot_qa_state_id_en
 * @property string $snapshot_qa_state_id_es
 * @property string $snapshot_qa_state_id_fa
 * @property string $snapshot_qa_state_id_hi
 * @property string $snapshot_qa_state_id_pt
 * @property string $snapshot_qa_state_id_sv
 * @property string $snapshot_qa_state_id_cn
 * @property string $snapshot_qa_state_id_de
 *
 * Relations of table "snapshot" available as properties of the model:
 * @property DataSource[] $dataSources
 * @property ExamQuestion[] $examQuestions
 * @property SectionContent[] $sectionContents
 * @property Node $node
 * @property Snapshot $clonedFrom
 * @property Snapshot[] $snapshots
 * @property Tool $tool
 * @property SnapshotQaState $snapshotQaStateIdEn
 * @property SnapshotQaState $snapshotQaStateIdCn
 * @property SnapshotQaState $snapshotQaStateIdDe
 * @property SnapshotQaState $snapshotQaStateIdEs
 * @property SnapshotQaState $snapshotQaStateIdFa
 * @property SnapshotQaState $snapshotQaStateIdHi
 * @property SnapshotQaState $snapshotQaStateIdPt
 * @property SnapshotQaState $snapshotQaStateIdSv
 */
abstract class BaseSnapshot extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'snapshot';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, _title, slug_en, _about, link, embed_override, tool_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, snapshot_qa_state_id_en, snapshot_qa_state_id_es, snapshot_qa_state_id_fa, snapshot_qa_state_id_hi, snapshot_qa_state_id_pt, snapshot_qa_state_id_sv, snapshot_qa_state_id_cn, snapshot_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, tool_id, node_id, snapshot_qa_state_id_en, snapshot_qa_state_id_es, snapshot_qa_state_id_fa, snapshot_qa_state_id_hi, snapshot_qa_state_id_pt, snapshot_qa_state_id_sv, snapshot_qa_state_id_cn, snapshot_qa_state_id_de', 'length', 'max' => 20),
                array('_title, slug_en, link, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('_about, embed_override, created, modified', 'safe'),
                array('id, version, cloned_from_id, _title, slug_en, _about, link, embed_override, tool_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, snapshot_qa_state_id_en, snapshot_qa_state_id_es, snapshot_qa_state_id_fa, snapshot_qa_state_id_hi, snapshot_qa_state_id_pt, snapshot_qa_state_id_sv, snapshot_qa_state_id_cn, snapshot_qa_state_id_de', 'safe', 'on' => 'search'),
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
                'dataSources' => array(self::HAS_MANY, 'DataSource', 'cloned_from_id'),
                'examQuestions' => array(self::HAS_MANY, 'ExamQuestion', 'cloned_from_id'),
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'snapshot_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'Snapshot', 'cloned_from_id'),
                'snapshots' => array(self::HAS_MANY, 'Snapshot', 'cloned_from_id'),
                'tool' => array(self::BELONGS_TO, 'Tool', 'tool_id'),
                'snapshotQaStateIdEn' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_en'),
                'snapshotQaStateIdCn' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_cn'),
                'snapshotQaStateIdDe' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_de'),
                'snapshotQaStateIdEs' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_es'),
                'snapshotQaStateIdFa' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_fa'),
                'snapshotQaStateIdHi' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_hi'),
                'snapshotQaStateIdPt' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_pt'),
                'snapshotQaStateIdSv' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_sv'),
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
            'slug_en' => Yii::t('model', 'Slug En'),
            '_about' => Yii::t('model', 'About'),
            'link' => Yii::t('model', 'Link'),
            'embed_override' => Yii::t('model', 'Embed Override'),
            'tool_id' => Yii::t('model', 'Tool'),
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
            'snapshot_qa_state_id_en' => Yii::t('model', 'Snapshot Qa State Id En'),
            'snapshot_qa_state_id_es' => Yii::t('model', 'Snapshot Qa State Id Es'),
            'snapshot_qa_state_id_fa' => Yii::t('model', 'Snapshot Qa State Id Fa'),
            'snapshot_qa_state_id_hi' => Yii::t('model', 'Snapshot Qa State Id Hi'),
            'snapshot_qa_state_id_pt' => Yii::t('model', 'Snapshot Qa State Id Pt'),
            'snapshot_qa_state_id_sv' => Yii::t('model', 'Snapshot Qa State Id Sv'),
            'snapshot_qa_state_id_cn' => Yii::t('model', 'Snapshot Qa State Id Cn'),
            'snapshot_qa_state_id_de' => Yii::t('model', 'Snapshot Qa State Id De'),
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
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t._about', $this->_about, true);
        $criteria->compare('t.link', $this->link, true);
        $criteria->compare('t.embed_override', $this->embed_override, true);
        $criteria->compare('t.tool_id', $this->tool_id);
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
        $criteria->compare('t.snapshot_qa_state_id_en', $this->snapshot_qa_state_id_en);
        $criteria->compare('t.snapshot_qa_state_id_es', $this->snapshot_qa_state_id_es);
        $criteria->compare('t.snapshot_qa_state_id_fa', $this->snapshot_qa_state_id_fa);
        $criteria->compare('t.snapshot_qa_state_id_hi', $this->snapshot_qa_state_id_hi);
        $criteria->compare('t.snapshot_qa_state_id_pt', $this->snapshot_qa_state_id_pt);
        $criteria->compare('t.snapshot_qa_state_id_sv', $this->snapshot_qa_state_id_sv);
        $criteria->compare('t.snapshot_qa_state_id_cn', $this->snapshot_qa_state_id_cn);
        $criteria->compare('t.snapshot_qa_state_id_de', $this->snapshot_qa_state_id_de);


        return $criteria;

    }

}
