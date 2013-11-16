<?php

/**
 * This is the model base class for the table "chapter".
 *
 * Columns in table "chapter" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property string $_slug
 * @property integer $thumbnail_media_id
 * @property string $_about
 * @property string $_teachers_guide
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property string $chapter_qa_state_id_en
 * @property string $chapter_qa_state_id_es
 * @property string $chapter_qa_state_id_fa
 * @property string $chapter_qa_state_id_hi
 * @property string $chapter_qa_state_id_pt
 * @property string $chapter_qa_state_id_sv
 * @property string $chapter_qa_state_id_cn
 * @property string $chapter_qa_state_id_de
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
                array('version, cloned_from_id, _title, _slug, thumbnail_media_id, _about, _teachers_guide, created, modified, node_id, chapter_qa_state_id_en, chapter_qa_state_id_es, chapter_qa_state_id_fa, chapter_qa_state_id_hi, chapter_qa_state_id_pt, chapter_qa_state_id_sv, chapter_qa_state_id_cn, chapter_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, thumbnail_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, chapter_qa_state_id_en, chapter_qa_state_id_es, chapter_qa_state_id_fa, chapter_qa_state_id_hi, chapter_qa_state_id_pt, chapter_qa_state_id_sv, chapter_qa_state_id_cn, chapter_qa_state_id_de', 'length', 'max' => 20),
                array('_title, _slug', 'length', 'max' => 255),
                array('_about, _teachers_guide, created, modified', 'safe'),
                array('id, version, cloned_from_id, _title, _slug, thumbnail_media_id, _about, _teachers_guide, created, modified, node_id, chapter_qa_state_id_en, chapter_qa_state_id_es, chapter_qa_state_id_fa, chapter_qa_state_id_hi, chapter_qa_state_id_pt, chapter_qa_state_id_sv, chapter_qa_state_id_cn, chapter_qa_state_id_de', 'safe', 'on' => 'search'),
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
            '_title' => Yii::t('model', 'Title'),
            '_slug' => Yii::t('model', 'Slug'),
            'thumbnail_media_id' => Yii::t('model', 'Thumbnail Media'),
            '_about' => Yii::t('model', 'About'),
            '_teachers_guide' => Yii::t('model', 'Teachers Guide'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'chapter_qa_state_id_en' => Yii::t('model', 'Chapter Qa State Id En'),
            'chapter_qa_state_id_es' => Yii::t('model', 'Chapter Qa State Id Es'),
            'chapter_qa_state_id_fa' => Yii::t('model', 'Chapter Qa State Id Fa'),
            'chapter_qa_state_id_hi' => Yii::t('model', 'Chapter Qa State Id Hi'),
            'chapter_qa_state_id_pt' => Yii::t('model', 'Chapter Qa State Id Pt'),
            'chapter_qa_state_id_sv' => Yii::t('model', 'Chapter Qa State Id Sv'),
            'chapter_qa_state_id_cn' => Yii::t('model', 'Chapter Qa State Id Cn'),
            'chapter_qa_state_id_de' => Yii::t('model', 'Chapter Qa State Id De'),
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
        $criteria->compare('t._slug', $this->_slug, true);
        $criteria->compare('t.thumbnail_media_id', $this->thumbnail_media_id);
        $criteria->compare('t._about', $this->_about, true);
        $criteria->compare('t._teachers_guide', $this->_teachers_guide, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.chapter_qa_state_id_en', $this->chapter_qa_state_id_en);
        $criteria->compare('t.chapter_qa_state_id_es', $this->chapter_qa_state_id_es);
        $criteria->compare('t.chapter_qa_state_id_fa', $this->chapter_qa_state_id_fa);
        $criteria->compare('t.chapter_qa_state_id_hi', $this->chapter_qa_state_id_hi);
        $criteria->compare('t.chapter_qa_state_id_pt', $this->chapter_qa_state_id_pt);
        $criteria->compare('t.chapter_qa_state_id_sv', $this->chapter_qa_state_id_sv);
        $criteria->compare('t.chapter_qa_state_id_cn', $this->chapter_qa_state_id_cn);
        $criteria->compare('t.chapter_qa_state_id_de', $this->chapter_qa_state_id_de);


        return $criteria;

    }

}
