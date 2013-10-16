<?php

/**
 * This is the model base class for the table "data_chunk".
 *
 * Columns in table "data_chunk" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property string $slug
 * @property string $about
 * @property integer $file_media_id
 * @property string $metadata
 * @property string $data_source_id
 * @property string $slideshow_file_id
 * @property string $vector_graphic_id
 * @property string $authoring_workflow_execution_id
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
 *
 * Relations of table "data_chunk" available as properties of the model:
 * @property DataChunk $clonedFrom
 * @property DataChunk[] $dataChunks
 * @property DataSource $dataSource
 * @property EzcExecution $authoringWorkflowExecution
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
                array('version, cloned_from_id, title_en, slug, about, file_media_id, metadata, data_source_id, slideshow_file_id, vector_graphic_id, authoring_workflow_execution_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, file_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, data_source_id, slideshow_file_id, vector_graphic_id, node_id', 'length', 'max' => 20),
                array('title_en, slug, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('about, metadata, created, modified', 'safe'),
                array('id, version, cloned_from_id, title_en, slug, about, file_media_id, metadata, data_source_id, slideshow_file_id, vector_graphic_id, authoring_workflow_execution_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'safe', 'on' => 'search'),
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
        return array(
            'clonedFrom' => array(self::BELONGS_TO, 'DataChunk', 'cloned_from_id'),
            'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'cloned_from_id'),
            'dataSource' => array(self::BELONGS_TO, 'DataSource', 'data_source_id'),
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'fileMedia' => array(self::BELONGS_TO, 'P3Media', 'file_media_id'),
            'slideshowFile' => array(self::BELONGS_TO, 'SlideshowFile', 'slideshow_file_id'),
            'vectorGraphic' => array(self::BELONGS_TO, 'VectorGraphic', 'vector_graphic_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'data_chunk_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'title_en' => Yii::t('model', 'Title En'),
            'slug' => Yii::t('model', 'Slug'),
            'about' => Yii::t('model', 'About'),
            'file_media_id' => Yii::t('model', 'File Media'),
            'metadata' => Yii::t('model', 'Metadata'),
            'data_source_id' => Yii::t('model', 'Data Source'),
            'slideshow_file_id' => Yii::t('model', 'Slideshow File'),
            'vector_graphic_id' => Yii::t('model', 'Vector Graphic'),
            'authoring_workflow_execution_id' => Yii::t('model', 'Authoring Workflow Execution'),
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
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.file_media_id', $this->file_media_id);
        $criteria->compare('t.metadata', $this->metadata, true);
        $criteria->compare('t.data_source_id', $this->data_source_id);
        $criteria->compare('t.slideshow_file_id', $this->slideshow_file_id);
        $criteria->compare('t.vector_graphic_id', $this->vector_graphic_id);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
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

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
