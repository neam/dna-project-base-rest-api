<?php

/**
 * This is the model base class for the table "video_file".
 *
 * Columns in table "video_file" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property string $slug_en
 * @property string $_about
 * @property integer $thumbnail_media_id
 * @property integer $original_media_id
 * @property integer $generate_processed_media
 * @property integer $processed_media_id_en
 * @property string $_subtitles
 * @property integer $subtitles_import_media_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property integer $processed_media_id_es
 * @property integer $processed_media_id_fa
 * @property integer $processed_media_id_hi
 * @property integer $processed_media_id_pt
 * @property integer $processed_media_id_sv
 * @property integer $processed_media_id_cn
 * @property integer $processed_media_id_de
 * @property string $slug_es
 * @property string $slug_fa
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_cn
 * @property string $slug_de
 * @property string $video_file_qa_state_id_en
 * @property string $video_file_qa_state_id_es
 * @property string $video_file_qa_state_id_fa
 * @property string $video_file_qa_state_id_hi
 * @property string $video_file_qa_state_id_pt
 * @property string $video_file_qa_state_id_sv
 * @property string $video_file_qa_state_id_cn
 * @property string $video_file_qa_state_id_de
 *
 * Relations of table "video_file" available as properties of the model:
 * @property SectionContent[] $sectionContents
 * @property Node $node
 * @property P3Media $originalMedia
 * @property P3Media $processedMediaIdEn
 * @property P3Media $processedMediaIdCn
 * @property P3Media $processedMediaIdDe
 * @property P3Media $processedMediaIdEs
 * @property P3Media $processedMediaIdFa
 * @property P3Media $processedMediaIdHi
 * @property P3Media $processedMediaIdPt
 * @property P3Media $processedMediaIdSv
 * @property P3Media $thumbnailMedia
 * @property P3Media $subtitlesImportMedia
 * @property VideoFile $clonedFrom
 * @property VideoFile[] $videoFiles
 * @property VideoFileQaState $videoFileQaStateIdEn
 * @property VideoFileQaState $videoFileQaStateIdCn
 * @property VideoFileQaState $videoFileQaStateIdDe
 * @property VideoFileQaState $videoFileQaStateIdEs
 * @property VideoFileQaState $videoFileQaStateIdFa
 * @property VideoFileQaState $videoFileQaStateIdHi
 * @property VideoFileQaState $videoFileQaStateIdPt
 * @property VideoFileQaState $videoFileQaStateIdSv
 */
abstract class BaseVideoFile extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'video_file';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, _title, slug_en, _about, thumbnail_media_id, original_media_id, generate_processed_media, processed_media_id_en, _subtitles, subtitles_import_media_id, created, modified, node_id, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, video_file_qa_state_id_en, video_file_qa_state_id_es, video_file_qa_state_id_fa, video_file_qa_state_id_hi, video_file_qa_state_id_pt, video_file_qa_state_id_sv, video_file_qa_state_id_cn, video_file_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, thumbnail_media_id, original_media_id, generate_processed_media, processed_media_id_en, subtitles_import_media_id, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, video_file_qa_state_id_en, video_file_qa_state_id_es, video_file_qa_state_id_fa, video_file_qa_state_id_hi, video_file_qa_state_id_pt, video_file_qa_state_id_sv, video_file_qa_state_id_cn, video_file_qa_state_id_de', 'length', 'max' => 20),
                array('_title, slug_en, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('_about, _subtitles, created, modified', 'safe'),
                array('id, version, cloned_from_id, _title, slug_en, _about, thumbnail_media_id, original_media_id, generate_processed_media, processed_media_id_en, _subtitles, subtitles_import_media_id, created, modified, node_id, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, video_file_qa_state_id_en, video_file_qa_state_id_es, video_file_qa_state_id_fa, video_file_qa_state_id_hi, video_file_qa_state_id_pt, video_file_qa_state_id_sv, video_file_qa_state_id_cn, video_file_qa_state_id_de', 'safe', 'on' => 'search'),
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
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'video_file_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'originalMedia' => array(self::BELONGS_TO, 'P3Media', 'original_media_id'),
                'processedMediaIdEn' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_en'),
                'processedMediaIdCn' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_cn'),
                'processedMediaIdDe' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_de'),
                'processedMediaIdEs' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_es'),
                'processedMediaIdFa' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_fa'),
                'processedMediaIdHi' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_hi'),
                'processedMediaIdPt' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_pt'),
                'processedMediaIdSv' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_sv'),
                'thumbnailMedia' => array(self::BELONGS_TO, 'P3Media', 'thumbnail_media_id'),
                'subtitlesImportMedia' => array(self::BELONGS_TO, 'P3Media', 'subtitles_import_media_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'VideoFile', 'cloned_from_id'),
                'videoFiles' => array(self::HAS_MANY, 'VideoFile', 'cloned_from_id'),
                'videoFileQaStateIdEn' => array(self::BELONGS_TO, 'VideoFileQaState', 'video_file_qa_state_id_en'),
                'videoFileQaStateIdCn' => array(self::BELONGS_TO, 'VideoFileQaState', 'video_file_qa_state_id_cn'),
                'videoFileQaStateIdDe' => array(self::BELONGS_TO, 'VideoFileQaState', 'video_file_qa_state_id_de'),
                'videoFileQaStateIdEs' => array(self::BELONGS_TO, 'VideoFileQaState', 'video_file_qa_state_id_es'),
                'videoFileQaStateIdFa' => array(self::BELONGS_TO, 'VideoFileQaState', 'video_file_qa_state_id_fa'),
                'videoFileQaStateIdHi' => array(self::BELONGS_TO, 'VideoFileQaState', 'video_file_qa_state_id_hi'),
                'videoFileQaStateIdPt' => array(self::BELONGS_TO, 'VideoFileQaState', 'video_file_qa_state_id_pt'),
                'videoFileQaStateIdSv' => array(self::BELONGS_TO, 'VideoFileQaState', 'video_file_qa_state_id_sv'),
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
            'thumbnail_media_id' => Yii::t('model', 'Thumbnail Media'),
            'original_media_id' => Yii::t('model', 'Original Media'),
            'generate_processed_media' => Yii::t('model', 'Generate Processed Media'),
            'processed_media_id_en' => Yii::t('model', 'Processed Media Id En'),
            '_subtitles' => Yii::t('model', 'Subtitles'),
            'subtitles_import_media_id' => Yii::t('model', 'Subtitles Import Media'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'processed_media_id_es' => Yii::t('model', 'Processed Media Id Es'),
            'processed_media_id_fa' => Yii::t('model', 'Processed Media Id Fa'),
            'processed_media_id_hi' => Yii::t('model', 'Processed Media Id Hi'),
            'processed_media_id_pt' => Yii::t('model', 'Processed Media Id Pt'),
            'processed_media_id_sv' => Yii::t('model', 'Processed Media Id Sv'),
            'processed_media_id_cn' => Yii::t('model', 'Processed Media Id Cn'),
            'processed_media_id_de' => Yii::t('model', 'Processed Media Id De'),
            'slug_es' => Yii::t('model', 'Slug Es'),
            'slug_fa' => Yii::t('model', 'Slug Fa'),
            'slug_hi' => Yii::t('model', 'Slug Hi'),
            'slug_pt' => Yii::t('model', 'Slug Pt'),
            'slug_sv' => Yii::t('model', 'Slug Sv'),
            'slug_cn' => Yii::t('model', 'Slug Cn'),
            'slug_de' => Yii::t('model', 'Slug De'),
            'video_file_qa_state_id_en' => Yii::t('model', 'Video File Qa State Id En'),
            'video_file_qa_state_id_es' => Yii::t('model', 'Video File Qa State Id Es'),
            'video_file_qa_state_id_fa' => Yii::t('model', 'Video File Qa State Id Fa'),
            'video_file_qa_state_id_hi' => Yii::t('model', 'Video File Qa State Id Hi'),
            'video_file_qa_state_id_pt' => Yii::t('model', 'Video File Qa State Id Pt'),
            'video_file_qa_state_id_sv' => Yii::t('model', 'Video File Qa State Id Sv'),
            'video_file_qa_state_id_cn' => Yii::t('model', 'Video File Qa State Id Cn'),
            'video_file_qa_state_id_de' => Yii::t('model', 'Video File Qa State Id De'),
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
        $criteria->compare('t.thumbnail_media_id', $this->thumbnail_media_id);
        $criteria->compare('t.original_media_id', $this->original_media_id);
        $criteria->compare('t.generate_processed_media', $this->generate_processed_media);
        $criteria->compare('t.processed_media_id_en', $this->processed_media_id_en);
        $criteria->compare('t._subtitles', $this->_subtitles, true);
        $criteria->compare('t.subtitles_import_media_id', $this->subtitles_import_media_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.processed_media_id_es', $this->processed_media_id_es);
        $criteria->compare('t.processed_media_id_fa', $this->processed_media_id_fa);
        $criteria->compare('t.processed_media_id_hi', $this->processed_media_id_hi);
        $criteria->compare('t.processed_media_id_pt', $this->processed_media_id_pt);
        $criteria->compare('t.processed_media_id_sv', $this->processed_media_id_sv);
        $criteria->compare('t.processed_media_id_cn', $this->processed_media_id_cn);
        $criteria->compare('t.processed_media_id_de', $this->processed_media_id_de);
        $criteria->compare('t.slug_es', $this->slug_es, true);
        $criteria->compare('t.slug_fa', $this->slug_fa, true);
        $criteria->compare('t.slug_hi', $this->slug_hi, true);
        $criteria->compare('t.slug_pt', $this->slug_pt, true);
        $criteria->compare('t.slug_sv', $this->slug_sv, true);
        $criteria->compare('t.slug_cn', $this->slug_cn, true);
        $criteria->compare('t.slug_de', $this->slug_de, true);
        $criteria->compare('t.video_file_qa_state_id_en', $this->video_file_qa_state_id_en);
        $criteria->compare('t.video_file_qa_state_id_es', $this->video_file_qa_state_id_es);
        $criteria->compare('t.video_file_qa_state_id_fa', $this->video_file_qa_state_id_fa);
        $criteria->compare('t.video_file_qa_state_id_hi', $this->video_file_qa_state_id_hi);
        $criteria->compare('t.video_file_qa_state_id_pt', $this->video_file_qa_state_id_pt);
        $criteria->compare('t.video_file_qa_state_id_sv', $this->video_file_qa_state_id_sv);
        $criteria->compare('t.video_file_qa_state_id_cn', $this->video_file_qa_state_id_cn);
        $criteria->compare('t.video_file_qa_state_id_de', $this->video_file_qa_state_id_de);


        return $criteria;

    }

}
