<?php

/**
 * This is the model base class for the table "slideshow_file".
 *
 * Columns in table "slideshow_file" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property string $slug_en
 * @property string $about_en
 * @property integer $original_media_id
 * @property integer $generate_processed_media
 * @property integer $processed_media_id_en
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
 * @property string $about_es
 * @property string $about_fa
 * @property string $about_hi
 * @property string $about_pt
 * @property string $about_sv
 * @property string $about_cn
 * @property string $about_de
 * @property string $slideshow_file_qa_state_id_en
 * @property string $slideshow_file_qa_state_id_es
 * @property string $slideshow_file_qa_state_id_fa
 * @property string $slideshow_file_qa_state_id_hi
 * @property string $slideshow_file_qa_state_id_pt
 * @property string $slideshow_file_qa_state_id_sv
 * @property string $slideshow_file_qa_state_id_cn
 * @property string $slideshow_file_qa_state_id_de
 *
 * Relations of table "slideshow_file" available as properties of the model:
 * @property DataChunk[] $dataChunks
 * @property Exercise[] $exercises
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
 * @property SlideshowFile $clonedFrom
 * @property SlideshowFile[] $slideshowFiles
 * @property SlideshowFileQaState $slideshowFileQaStateIdEn
 * @property SlideshowFileQaState $slideshowFileQaStateIdCn
 * @property SlideshowFileQaState $slideshowFileQaStateIdDe
 * @property SlideshowFileQaState $slideshowFileQaStateIdEs
 * @property SlideshowFileQaState $slideshowFileQaStateIdFa
 * @property SlideshowFileQaState $slideshowFileQaStateIdHi
 * @property SlideshowFileQaState $slideshowFileQaStateIdPt
 * @property SlideshowFileQaState $slideshowFileQaStateIdSv
 */
abstract class BaseSlideshowFile extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'slideshow_file';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title_en, slug_en, about_en, original_media_id, generate_processed_media, processed_media_id_en, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, slideshow_file_qa_state_id_en, slideshow_file_qa_state_id_es, slideshow_file_qa_state_id_fa, slideshow_file_qa_state_id_hi, slideshow_file_qa_state_id_pt, slideshow_file_qa_state_id_sv, slideshow_file_qa_state_id_cn, slideshow_file_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, original_media_id, generate_processed_media, processed_media_id_en, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, slideshow_file_qa_state_id_en, slideshow_file_qa_state_id_es, slideshow_file_qa_state_id_fa, slideshow_file_qa_state_id_hi, slideshow_file_qa_state_id_pt, slideshow_file_qa_state_id_sv, slideshow_file_qa_state_id_cn, slideshow_file_qa_state_id_de', 'length', 'max' => 20),
                array('title_en, slug_en, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('about_en, created, modified, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de', 'safe'),
                array('id, version, cloned_from_id, title_en, slug_en, about_en, original_media_id, generate_processed_media, processed_media_id_en, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, slideshow_file_qa_state_id_en, slideshow_file_qa_state_id_es, slideshow_file_qa_state_id_fa, slideshow_file_qa_state_id_hi, slideshow_file_qa_state_id_pt, slideshow_file_qa_state_id_sv, slideshow_file_qa_state_id_cn, slideshow_file_qa_state_id_de', 'safe', 'on' => 'search'),
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
                'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'slideshow_file_id'),
                'exercises' => array(self::HAS_MANY, 'Exercise', 'slideshow_file_id'),
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'slideshow_file_id'),
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
                'clonedFrom' => array(self::BELONGS_TO, 'SlideshowFile', 'cloned_from_id'),
                'slideshowFiles' => array(self::HAS_MANY, 'SlideshowFile', 'cloned_from_id'),
                'slideshowFileQaStateIdEn' => array(self::BELONGS_TO, 'SlideshowFileQaState', 'slideshow_file_qa_state_id_en'),
                'slideshowFileQaStateIdCn' => array(self::BELONGS_TO, 'SlideshowFileQaState', 'slideshow_file_qa_state_id_cn'),
                'slideshowFileQaStateIdDe' => array(self::BELONGS_TO, 'SlideshowFileQaState', 'slideshow_file_qa_state_id_de'),
                'slideshowFileQaStateIdEs' => array(self::BELONGS_TO, 'SlideshowFileQaState', 'slideshow_file_qa_state_id_es'),
                'slideshowFileQaStateIdFa' => array(self::BELONGS_TO, 'SlideshowFileQaState', 'slideshow_file_qa_state_id_fa'),
                'slideshowFileQaStateIdHi' => array(self::BELONGS_TO, 'SlideshowFileQaState', 'slideshow_file_qa_state_id_hi'),
                'slideshowFileQaStateIdPt' => array(self::BELONGS_TO, 'SlideshowFileQaState', 'slideshow_file_qa_state_id_pt'),
                'slideshowFileQaStateIdSv' => array(self::BELONGS_TO, 'SlideshowFileQaState', 'slideshow_file_qa_state_id_sv'),
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
            'original_media_id' => Yii::t('model', 'Original Media'),
            'generate_processed_media' => Yii::t('model', 'Generate Processed Media'),
            'processed_media_id_en' => Yii::t('model', 'Processed Media Id En'),
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
            'about_es' => Yii::t('model', 'About Es'),
            'about_fa' => Yii::t('model', 'About Fa'),
            'about_hi' => Yii::t('model', 'About Hi'),
            'about_pt' => Yii::t('model', 'About Pt'),
            'about_sv' => Yii::t('model', 'About Sv'),
            'about_cn' => Yii::t('model', 'About Cn'),
            'about_de' => Yii::t('model', 'About De'),
            'slideshow_file_qa_state_id_en' => Yii::t('model', 'Slideshow File Qa State Id En'),
            'slideshow_file_qa_state_id_es' => Yii::t('model', 'Slideshow File Qa State Id Es'),
            'slideshow_file_qa_state_id_fa' => Yii::t('model', 'Slideshow File Qa State Id Fa'),
            'slideshow_file_qa_state_id_hi' => Yii::t('model', 'Slideshow File Qa State Id Hi'),
            'slideshow_file_qa_state_id_pt' => Yii::t('model', 'Slideshow File Qa State Id Pt'),
            'slideshow_file_qa_state_id_sv' => Yii::t('model', 'Slideshow File Qa State Id Sv'),
            'slideshow_file_qa_state_id_cn' => Yii::t('model', 'Slideshow File Qa State Id Cn'),
            'slideshow_file_qa_state_id_de' => Yii::t('model', 'Slideshow File Qa State Id De'),
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
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t.about_en', $this->about_en, true);
        $criteria->compare('t.original_media_id', $this->original_media_id);
        $criteria->compare('t.generate_processed_media', $this->generate_processed_media);
        $criteria->compare('t.processed_media_id_en', $this->processed_media_id_en);
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
        $criteria->compare('t.about_es', $this->about_es, true);
        $criteria->compare('t.about_fa', $this->about_fa, true);
        $criteria->compare('t.about_hi', $this->about_hi, true);
        $criteria->compare('t.about_pt', $this->about_pt, true);
        $criteria->compare('t.about_sv', $this->about_sv, true);
        $criteria->compare('t.about_cn', $this->about_cn, true);
        $criteria->compare('t.about_de', $this->about_de, true);
        $criteria->compare('t.slideshow_file_qa_state_id_en', $this->slideshow_file_qa_state_id_en);
        $criteria->compare('t.slideshow_file_qa_state_id_es', $this->slideshow_file_qa_state_id_es);
        $criteria->compare('t.slideshow_file_qa_state_id_fa', $this->slideshow_file_qa_state_id_fa);
        $criteria->compare('t.slideshow_file_qa_state_id_hi', $this->slideshow_file_qa_state_id_hi);
        $criteria->compare('t.slideshow_file_qa_state_id_pt', $this->slideshow_file_qa_state_id_pt);
        $criteria->compare('t.slideshow_file_qa_state_id_sv', $this->slideshow_file_qa_state_id_sv);
        $criteria->compare('t.slideshow_file_qa_state_id_cn', $this->slideshow_file_qa_state_id_cn);
        $criteria->compare('t.slideshow_file_qa_state_id_de', $this->slideshow_file_qa_state_id_de);


        return $criteria;

    }

}
