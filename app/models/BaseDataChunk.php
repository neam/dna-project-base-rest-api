<?php

/**
 * This is the model base class for the table "data_chunk".
 *
 * Columns in table "data_chunk" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property string $slug_en
 * @property string $about_en
 * @property integer $file_media_id
 * @property string $metadata
 * @property string $data_source_id
 * @property string $slideshow_file_id
 * @property string $vector_graphic_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_cn
 * @property string $title_de
 * @property string $slug_es
 * @property string $slug_fa
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_cn
 * @property string $slug_de
 * @property string $about_es
 * @property string $about_fa
 * @property string $about_hi
 * @property string $about_pt
 * @property string $about_sv
 * @property string $about_cn
 * @property string $about_de
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
 * @property DataSource $dataSource
 * @property Node $node
 * @property P3Media $fileMedia
 * @property SlideshowFile $slideshowFile
 * @property VectorGraphic $vectorGraphic
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
                array('version, cloned_from_id, title_en, slug_en, about_en, file_media_id, metadata, data_source_id, slideshow_file_id, vector_graphic_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, data_chunk_qa_state_id_en, data_chunk_qa_state_id_es, data_chunk_qa_state_id_fa, data_chunk_qa_state_id_hi, data_chunk_qa_state_id_pt, data_chunk_qa_state_id_sv, data_chunk_qa_state_id_cn, data_chunk_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, file_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, data_source_id, slideshow_file_id, vector_graphic_id, node_id, data_chunk_qa_state_id_en, data_chunk_qa_state_id_es, data_chunk_qa_state_id_fa, data_chunk_qa_state_id_hi, data_chunk_qa_state_id_pt, data_chunk_qa_state_id_sv, data_chunk_qa_state_id_cn, data_chunk_qa_state_id_de', 'length', 'max' => 20),
                array('title_en, slug_en, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('about_en, metadata, created, modified, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de', 'safe'),
                array('id, version, cloned_from_id, title_en, slug_en, about_en, file_media_id, metadata, data_source_id, slideshow_file_id, vector_graphic_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, data_chunk_qa_state_id_en, data_chunk_qa_state_id_es, data_chunk_qa_state_id_fa, data_chunk_qa_state_id_hi, data_chunk_qa_state_id_pt, data_chunk_qa_state_id_sv, data_chunk_qa_state_id_cn, data_chunk_qa_state_id_de', 'safe', 'on' => 'search'),
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
                'dataSource' => array(self::BELONGS_TO, 'DataSource', 'data_source_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'fileMedia' => array(self::BELONGS_TO, 'P3Media', 'file_media_id'),
                'slideshowFile' => array(self::BELONGS_TO, 'SlideshowFile', 'slideshow_file_id'),
                'vectorGraphic' => array(self::BELONGS_TO, 'VectorGraphic', 'vector_graphic_id'),
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
            'title_en' => Yii::t('model', 'Title En'),
            'slug_en' => Yii::t('model', 'Slug En'),
            'about_en' => Yii::t('model', 'About En'),
            'file_media_id' => Yii::t('model', 'File Media'),
            'metadata' => Yii::t('model', 'Metadata'),
            'data_source_id' => Yii::t('model', 'Data Source'),
            'slideshow_file_id' => Yii::t('model', 'Slideshow File'),
            'vector_graphic_id' => Yii::t('model', 'Vector Graphic'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'title_es' => Yii::t('model', 'Title Es'),
            'title_fa' => Yii::t('model', 'Title Fa'),
            'title_hi' => Yii::t('model', 'Title Hi'),
            'title_pt' => Yii::t('model', 'Title Pt'),
            'title_sv' => Yii::t('model', 'Title Sv'),
            'title_cn' => Yii::t('model', 'Title Cn'),
            'title_de' => Yii::t('model', 'Title De'),
            'slug_es' => Yii::t('model', 'Slug Es'),
            'slug_fa' => Yii::t('model', 'Slug Fa'),
            'slug_hi' => Yii::t('model', 'Slug Hi'),
            'slug_pt' => Yii::t('model', 'Slug Pt'),
            'slug_sv' => Yii::t('model', 'Slug Sv'),
            'slug_cn' => Yii::t('model', 'Slug Cn'),
            'slug_de' => Yii::t('model', 'Slug De'),
            'about_es' => Yii::t('model', 'About Es'),
            'about_fa' => Yii::t('model', 'About Fa'),
            'about_hi' => Yii::t('model', 'About Hi'),
            'about_pt' => Yii::t('model', 'About Pt'),
            'about_sv' => Yii::t('model', 'About Sv'),
            'about_cn' => Yii::t('model', 'About Cn'),
            'about_de' => Yii::t('model', 'About De'),
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

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t.about_en', $this->about_en, true);
        $criteria->compare('t.file_media_id', $this->file_media_id);
        $criteria->compare('t.metadata', $this->metadata, true);
        $criteria->compare('t.data_source_id', $this->data_source_id);
        $criteria->compare('t.slideshow_file_id', $this->slideshow_file_id);
        $criteria->compare('t.vector_graphic_id', $this->vector_graphic_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.title_es', $this->title_es, true);
        $criteria->compare('t.title_fa', $this->title_fa, true);
        $criteria->compare('t.title_hi', $this->title_hi, true);
        $criteria->compare('t.title_pt', $this->title_pt, true);
        $criteria->compare('t.title_sv', $this->title_sv, true);
        $criteria->compare('t.title_cn', $this->title_cn, true);
        $criteria->compare('t.title_de', $this->title_de, true);
        $criteria->compare('t.slug_es', $this->slug_es, true);
        $criteria->compare('t.slug_fa', $this->slug_fa, true);
        $criteria->compare('t.slug_hi', $this->slug_hi, true);
        $criteria->compare('t.slug_pt', $this->slug_pt, true);
        $criteria->compare('t.slug_sv', $this->slug_sv, true);
        $criteria->compare('t.slug_cn', $this->slug_cn, true);
        $criteria->compare('t.slug_de', $this->slug_de, true);
        $criteria->compare('t.about_es', $this->about_es, true);
        $criteria->compare('t.about_fa', $this->about_fa, true);
        $criteria->compare('t.about_hi', $this->about_hi, true);
        $criteria->compare('t.about_pt', $this->about_pt, true);
        $criteria->compare('t.about_sv', $this->about_sv, true);
        $criteria->compare('t.about_cn', $this->about_cn, true);
        $criteria->compare('t.about_de', $this->about_de, true);
        $criteria->compare('t.data_chunk_qa_state_id_en', $this->data_chunk_qa_state_id_en);
        $criteria->compare('t.data_chunk_qa_state_id_es', $this->data_chunk_qa_state_id_es);
        $criteria->compare('t.data_chunk_qa_state_id_fa', $this->data_chunk_qa_state_id_fa);
        $criteria->compare('t.data_chunk_qa_state_id_hi', $this->data_chunk_qa_state_id_hi);
        $criteria->compare('t.data_chunk_qa_state_id_pt', $this->data_chunk_qa_state_id_pt);
        $criteria->compare('t.data_chunk_qa_state_id_sv', $this->data_chunk_qa_state_id_sv);
        $criteria->compare('t.data_chunk_qa_state_id_cn', $this->data_chunk_qa_state_id_cn);
        $criteria->compare('t.data_chunk_qa_state_id_de', $this->data_chunk_qa_state_id_de);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
