<?php

/**
 * This is the model base class for the table "data_chunk".
 *
 * Columns in table "data_chunk" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property string $slug_en
 * @property string $_about
 * @property integer $file_media_id
 * @property string $metadata
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
 * @property string $data_chunk_qa_state_id_en
 * @property string $data_chunk_qa_state_id_es
 * @property string $data_chunk_qa_state_id_fa
 * @property string $data_chunk_qa_state_id_hi
 * @property string $data_chunk_qa_state_id_pt
 * @property string $data_chunk_qa_state_id_sv
 * @property string $data_chunk_qa_state_id_cn
 * @property string $data_chunk_qa_state_id_de
 *
 * Relations of table "data_chunk" available as properties of the model:
 * @property DataChunkQaState $dataChunkQaStateIdEn
 * @property DataChunkQaState $dataChunkQaStateIdCn
 * @property DataChunkQaState $dataChunkQaStateIdDe
 * @property DataChunkQaState $dataChunkQaStateIdEs
 * @property DataChunkQaState $dataChunkQaStateIdFa
 * @property DataChunkQaState $dataChunkQaStateIdHi
 * @property DataChunkQaState $dataChunkQaStateIdPt
 * @property DataChunkQaState $dataChunkQaStateIdSv
 * @property DataChunk $clonedFrom
 * @property DataChunk[] $dataChunks
 * @property Node $node
 * @property P3Media $fileMedia
 * @property SectionContent[] $sectionContents
 */
abstract class BaseDataChunk extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'data_chunk';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, _title, slug_en, _about, file_media_id, metadata, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, data_chunk_qa_state_id_en, data_chunk_qa_state_id_es, data_chunk_qa_state_id_fa, data_chunk_qa_state_id_hi, data_chunk_qa_state_id_pt, data_chunk_qa_state_id_sv, data_chunk_qa_state_id_cn, data_chunk_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, file_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, data_chunk_qa_state_id_en, data_chunk_qa_state_id_es, data_chunk_qa_state_id_fa, data_chunk_qa_state_id_hi, data_chunk_qa_state_id_pt, data_chunk_qa_state_id_sv, data_chunk_qa_state_id_cn, data_chunk_qa_state_id_de', 'length', 'max' => 20),
                array('_title, slug_en, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('_about, metadata, created, modified', 'safe'),
                array('id, version, cloned_from_id, _title, slug_en, _about, file_media_id, metadata, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, data_chunk_qa_state_id_en, data_chunk_qa_state_id_es, data_chunk_qa_state_id_fa, data_chunk_qa_state_id_hi, data_chunk_qa_state_id_pt, data_chunk_qa_state_id_sv, data_chunk_qa_state_id_cn, data_chunk_qa_state_id_de', 'safe', 'on' => 'search'),
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
                'dataChunkQaStateIdEn' => array(self::BELONGS_TO, 'DataChunkQaState', 'data_chunk_qa_state_id_en'),
                'dataChunkQaStateIdCn' => array(self::BELONGS_TO, 'DataChunkQaState', 'data_chunk_qa_state_id_cn'),
                'dataChunkQaStateIdDe' => array(self::BELONGS_TO, 'DataChunkQaState', 'data_chunk_qa_state_id_de'),
                'dataChunkQaStateIdEs' => array(self::BELONGS_TO, 'DataChunkQaState', 'data_chunk_qa_state_id_es'),
                'dataChunkQaStateIdFa' => array(self::BELONGS_TO, 'DataChunkQaState', 'data_chunk_qa_state_id_fa'),
                'dataChunkQaStateIdHi' => array(self::BELONGS_TO, 'DataChunkQaState', 'data_chunk_qa_state_id_hi'),
                'dataChunkQaStateIdPt' => array(self::BELONGS_TO, 'DataChunkQaState', 'data_chunk_qa_state_id_pt'),
                'dataChunkQaStateIdSv' => array(self::BELONGS_TO, 'DataChunkQaState', 'data_chunk_qa_state_id_sv'),
                'clonedFrom' => array(self::BELONGS_TO, 'DataChunk', 'cloned_from_id'),
                'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'cloned_from_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'fileMedia' => array(self::BELONGS_TO, 'P3Media', 'file_media_id'),
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'data_chunk_id'),
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
            'file_media_id' => Yii::t('model', 'File Media'),
            'metadata' => Yii::t('model', 'Metadata'),
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
            'data_chunk_qa_state_id_en' => Yii::t('model', 'Data Chunk Qa State Id En'),
            'data_chunk_qa_state_id_es' => Yii::t('model', 'Data Chunk Qa State Id Es'),
            'data_chunk_qa_state_id_fa' => Yii::t('model', 'Data Chunk Qa State Id Fa'),
            'data_chunk_qa_state_id_hi' => Yii::t('model', 'Data Chunk Qa State Id Hi'),
            'data_chunk_qa_state_id_pt' => Yii::t('model', 'Data Chunk Qa State Id Pt'),
            'data_chunk_qa_state_id_sv' => Yii::t('model', 'Data Chunk Qa State Id Sv'),
            'data_chunk_qa_state_id_cn' => Yii::t('model', 'Data Chunk Qa State Id Cn'),
            'data_chunk_qa_state_id_de' => Yii::t('model', 'Data Chunk Qa State Id De'),
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
        $criteria->compare('t.file_media_id', $this->file_media_id);
        $criteria->compare('t.metadata', $this->metadata, true);
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
        $criteria->compare('t.data_chunk_qa_state_id_en', $this->data_chunk_qa_state_id_en);
        $criteria->compare('t.data_chunk_qa_state_id_es', $this->data_chunk_qa_state_id_es);
        $criteria->compare('t.data_chunk_qa_state_id_fa', $this->data_chunk_qa_state_id_fa);
        $criteria->compare('t.data_chunk_qa_state_id_hi', $this->data_chunk_qa_state_id_hi);
        $criteria->compare('t.data_chunk_qa_state_id_pt', $this->data_chunk_qa_state_id_pt);
        $criteria->compare('t.data_chunk_qa_state_id_sv', $this->data_chunk_qa_state_id_sv);
        $criteria->compare('t.data_chunk_qa_state_id_cn', $this->data_chunk_qa_state_id_cn);
        $criteria->compare('t.data_chunk_qa_state_id_de', $this->data_chunk_qa_state_id_de);


        return $criteria;

    }

}
