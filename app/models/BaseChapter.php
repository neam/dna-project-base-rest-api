<?php

/**
 * This is the model base class for the table "chapter".
 *
 * Columns in table "chapter" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property string $slug_en
 * @property integer $thumbnail_media_id
 * @property string $about_en
 * @property string $teachers_guide_en
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
 * @property string $chapter_qa_state_id_en
 * @property string $chapter_qa_state_id_es
 * @property string $chapter_qa_state_id_fa
 * @property string $chapter_qa_state_id_hi
 * @property string $chapter_qa_state_id_pt
 * @property string $chapter_qa_state_id_sv
 * @property string $chapter_qa_state_id_cn
 * @property string $chapter_qa_state_id_de
 * @property string $teachers_guide_es
 * @property string $teachers_guide_fa
 * @property string $teachers_guide_hi
 * @property string $teachers_guide_pt
 * @property string $teachers_guide_sv
 * @property string $teachers_guide_cn
 * @property string $teachers_guide_de
 *
 * Relations of table "chapter" available as properties of the model:
 * @property ChapterQaState $chapterQaStateIdEn
 * @property ChapterQaState $chapterQaStateIdCn
 * @property ChapterQaState $chapterQaStateIdDe
 * @property ChapterQaState $chapterQaStateIdEs
 * @property ChapterQaState $chapterQaStateIdFa
 * @property ChapterQaState $chapterQaStateIdHi
 * @property ChapterQaState $chapterQaStateIdPt
 * @property ChapterQaState $chapterQaStateIdSv
 * @property Chapter $clonedFrom
 * @property Chapter[] $chapters
 * @property Node $node
 * @property P3Media $thumbnailMedia
 */
abstract class BaseChapter extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'chapter';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title_en, slug_en, thumbnail_media_id, about_en, teachers_guide_en, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, chapter_qa_state_id_en, chapter_qa_state_id_es, chapter_qa_state_id_fa, chapter_qa_state_id_hi, chapter_qa_state_id_pt, chapter_qa_state_id_sv, chapter_qa_state_id_cn, chapter_qa_state_id_de, teachers_guide_es, teachers_guide_fa, teachers_guide_hi, teachers_guide_pt, teachers_guide_sv, teachers_guide_cn, teachers_guide_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, thumbnail_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, chapter_qa_state_id_en, chapter_qa_state_id_es, chapter_qa_state_id_fa, chapter_qa_state_id_hi, chapter_qa_state_id_pt, chapter_qa_state_id_sv, chapter_qa_state_id_cn, chapter_qa_state_id_de', 'length', 'max' => 20),
                array('title_en, slug_en, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('about_en, teachers_guide_en, created, modified, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, teachers_guide_es, teachers_guide_fa, teachers_guide_hi, teachers_guide_pt, teachers_guide_sv, teachers_guide_cn, teachers_guide_de', 'safe'),
                array('id, version, cloned_from_id, title_en, slug_en, thumbnail_media_id, about_en, teachers_guide_en, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, chapter_qa_state_id_en, chapter_qa_state_id_es, chapter_qa_state_id_fa, chapter_qa_state_id_hi, chapter_qa_state_id_pt, chapter_qa_state_id_sv, chapter_qa_state_id_cn, chapter_qa_state_id_de, teachers_guide_es, teachers_guide_fa, teachers_guide_hi, teachers_guide_pt, teachers_guide_sv, teachers_guide_cn, teachers_guide_de', 'safe', 'on' => 'search'),
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
                'chapterQaStateIdEn' => array(self::BELONGS_TO, 'ChapterQaState', 'chapter_qa_state_id_en'),
                'chapterQaStateIdCn' => array(self::BELONGS_TO, 'ChapterQaState', 'chapter_qa_state_id_cn'),
                'chapterQaStateIdDe' => array(self::BELONGS_TO, 'ChapterQaState', 'chapter_qa_state_id_de'),
                'chapterQaStateIdEs' => array(self::BELONGS_TO, 'ChapterQaState', 'chapter_qa_state_id_es'),
                'chapterQaStateIdFa' => array(self::BELONGS_TO, 'ChapterQaState', 'chapter_qa_state_id_fa'),
                'chapterQaStateIdHi' => array(self::BELONGS_TO, 'ChapterQaState', 'chapter_qa_state_id_hi'),
                'chapterQaStateIdPt' => array(self::BELONGS_TO, 'ChapterQaState', 'chapter_qa_state_id_pt'),
                'chapterQaStateIdSv' => array(self::BELONGS_TO, 'ChapterQaState', 'chapter_qa_state_id_sv'),
                'clonedFrom' => array(self::BELONGS_TO, 'Chapter', 'cloned_from_id'),
                'chapters' => array(self::HAS_MANY, 'Chapter', 'cloned_from_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'thumbnailMedia' => array(self::BELONGS_TO, 'P3Media', 'thumbnail_media_id'),
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
            'thumbnail_media_id' => Yii::t('model', 'Thumbnail Media'),
            'about_en' => Yii::t('model', 'About En'),
            'teachers_guide_en' => Yii::t('model', 'Teachers Guide En'),
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
            'chapter_qa_state_id_en' => Yii::t('model', 'Chapter Qa State Id En'),
            'chapter_qa_state_id_es' => Yii::t('model', 'Chapter Qa State Id Es'),
            'chapter_qa_state_id_fa' => Yii::t('model', 'Chapter Qa State Id Fa'),
            'chapter_qa_state_id_hi' => Yii::t('model', 'Chapter Qa State Id Hi'),
            'chapter_qa_state_id_pt' => Yii::t('model', 'Chapter Qa State Id Pt'),
            'chapter_qa_state_id_sv' => Yii::t('model', 'Chapter Qa State Id Sv'),
            'chapter_qa_state_id_cn' => Yii::t('model', 'Chapter Qa State Id Cn'),
            'chapter_qa_state_id_de' => Yii::t('model', 'Chapter Qa State Id De'),
            'teachers_guide_es' => Yii::t('model', 'Teachers Guide Es'),
            'teachers_guide_fa' => Yii::t('model', 'Teachers Guide Fa'),
            'teachers_guide_hi' => Yii::t('model', 'Teachers Guide Hi'),
            'teachers_guide_pt' => Yii::t('model', 'Teachers Guide Pt'),
            'teachers_guide_sv' => Yii::t('model', 'Teachers Guide Sv'),
            'teachers_guide_cn' => Yii::t('model', 'Teachers Guide Cn'),
            'teachers_guide_de' => Yii::t('model', 'Teachers Guide De'),
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
        $criteria->compare('t.thumbnail_media_id', $this->thumbnail_media_id);
        $criteria->compare('t.about_en', $this->about_en, true);
        $criteria->compare('t.teachers_guide_en', $this->teachers_guide_en, true);
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
        $criteria->compare('t.chapter_qa_state_id_en', $this->chapter_qa_state_id_en);
        $criteria->compare('t.chapter_qa_state_id_es', $this->chapter_qa_state_id_es);
        $criteria->compare('t.chapter_qa_state_id_fa', $this->chapter_qa_state_id_fa);
        $criteria->compare('t.chapter_qa_state_id_hi', $this->chapter_qa_state_id_hi);
        $criteria->compare('t.chapter_qa_state_id_pt', $this->chapter_qa_state_id_pt);
        $criteria->compare('t.chapter_qa_state_id_sv', $this->chapter_qa_state_id_sv);
        $criteria->compare('t.chapter_qa_state_id_cn', $this->chapter_qa_state_id_cn);
        $criteria->compare('t.chapter_qa_state_id_de', $this->chapter_qa_state_id_de);
        $criteria->compare('t.teachers_guide_es', $this->teachers_guide_es, true);
        $criteria->compare('t.teachers_guide_fa', $this->teachers_guide_fa, true);
        $criteria->compare('t.teachers_guide_hi', $this->teachers_guide_hi, true);
        $criteria->compare('t.teachers_guide_pt', $this->teachers_guide_pt, true);
        $criteria->compare('t.teachers_guide_sv', $this->teachers_guide_sv, true);
        $criteria->compare('t.teachers_guide_cn', $this->teachers_guide_cn, true);
        $criteria->compare('t.teachers_guide_de', $this->teachers_guide_de, true);


        return $criteria;

    }

}
