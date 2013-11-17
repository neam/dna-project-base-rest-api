<?php

/**
 * This is the model base class for the table "exercise".
 *
 * Columns in table "exercise" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property string $slug_en
 * @property string $_question
 * @property string $_description
 * @property integer $thumbnail_media_id
 * @property string $slideshow_file_id
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
 * @property string $exercise_qa_state_id_en
 * @property string $exercise_qa_state_id_es
 * @property string $exercise_qa_state_id_fa
 * @property string $exercise_qa_state_id_hi
 * @property string $exercise_qa_state_id_pt
 * @property string $exercise_qa_state_id_sv
 * @property string $exercise_qa_state_id_cn
 * @property string $exercise_qa_state_id_de
 *
 * Relations of table "exercise" available as properties of the model:
 * @property ExerciseQaState $exerciseQaStateIdEn
 * @property ExerciseQaState $exerciseQaStateIdCn
 * @property ExerciseQaState $exerciseQaStateIdDe
 * @property ExerciseQaState $exerciseQaStateIdEs
 * @property ExerciseQaState $exerciseQaStateIdFa
 * @property ExerciseQaState $exerciseQaStateIdHi
 * @property ExerciseQaState $exerciseQaStateIdPt
 * @property ExerciseQaState $exerciseQaStateIdSv
 * @property Exercise $clonedFrom
 * @property Exercise[] $exercises
 * @property Node $node
 * @property P3Media $thumbnailMedia
 * @property SlideshowFile $slideshowFile
 * @property SectionContent[] $sectionContents
 */
abstract class BaseExercise extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'exercise';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, _title, slug_en, _question, _description, thumbnail_media_id, slideshow_file_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, exercise_qa_state_id_en, exercise_qa_state_id_es, exercise_qa_state_id_fa, exercise_qa_state_id_hi, exercise_qa_state_id_pt, exercise_qa_state_id_sv, exercise_qa_state_id_cn, exercise_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, thumbnail_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, slideshow_file_id, node_id, exercise_qa_state_id_en, exercise_qa_state_id_es, exercise_qa_state_id_fa, exercise_qa_state_id_hi, exercise_qa_state_id_pt, exercise_qa_state_id_sv, exercise_qa_state_id_cn, exercise_qa_state_id_de', 'length', 'max' => 20),
                array('_title, slug_en, _question, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('_description, created, modified', 'safe'),
                array('id, version, cloned_from_id, _title, slug_en, _question, _description, thumbnail_media_id, slideshow_file_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, exercise_qa_state_id_en, exercise_qa_state_id_es, exercise_qa_state_id_fa, exercise_qa_state_id_hi, exercise_qa_state_id_pt, exercise_qa_state_id_sv, exercise_qa_state_id_cn, exercise_qa_state_id_de', 'safe', 'on' => 'search'),
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
                'exerciseQaStateIdEn' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id_en'),
                'exerciseQaStateIdCn' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id_cn'),
                'exerciseQaStateIdDe' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id_de'),
                'exerciseQaStateIdEs' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id_es'),
                'exerciseQaStateIdFa' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id_fa'),
                'exerciseQaStateIdHi' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id_hi'),
                'exerciseQaStateIdPt' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id_pt'),
                'exerciseQaStateIdSv' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id_sv'),
                'clonedFrom' => array(self::BELONGS_TO, 'Exercise', 'cloned_from_id'),
                'exercises' => array(self::HAS_MANY, 'Exercise', 'cloned_from_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'thumbnailMedia' => array(self::BELONGS_TO, 'P3Media', 'thumbnail_media_id'),
                'slideshowFile' => array(self::BELONGS_TO, 'SlideshowFile', 'slideshow_file_id'),
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'exercise_id'),
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
            '_question' => Yii::t('model', 'Question'),
            '_description' => Yii::t('model', 'Description'),
            'thumbnail_media_id' => Yii::t('model', 'Thumbnail Media'),
            'slideshow_file_id' => Yii::t('model', 'Slideshow File'),
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
            'exercise_qa_state_id_en' => Yii::t('model', 'Exercise Qa State Id En'),
            'exercise_qa_state_id_es' => Yii::t('model', 'Exercise Qa State Id Es'),
            'exercise_qa_state_id_fa' => Yii::t('model', 'Exercise Qa State Id Fa'),
            'exercise_qa_state_id_hi' => Yii::t('model', 'Exercise Qa State Id Hi'),
            'exercise_qa_state_id_pt' => Yii::t('model', 'Exercise Qa State Id Pt'),
            'exercise_qa_state_id_sv' => Yii::t('model', 'Exercise Qa State Id Sv'),
            'exercise_qa_state_id_cn' => Yii::t('model', 'Exercise Qa State Id Cn'),
            'exercise_qa_state_id_de' => Yii::t('model', 'Exercise Qa State Id De'),
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
        $criteria->compare('t._question', $this->_question, true);
        $criteria->compare('t._description', $this->_description, true);
        $criteria->compare('t.thumbnail_media_id', $this->thumbnail_media_id);
        $criteria->compare('t.slideshow_file_id', $this->slideshow_file_id);
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
        $criteria->compare('t.exercise_qa_state_id_en', $this->exercise_qa_state_id_en);
        $criteria->compare('t.exercise_qa_state_id_es', $this->exercise_qa_state_id_es);
        $criteria->compare('t.exercise_qa_state_id_fa', $this->exercise_qa_state_id_fa);
        $criteria->compare('t.exercise_qa_state_id_hi', $this->exercise_qa_state_id_hi);
        $criteria->compare('t.exercise_qa_state_id_pt', $this->exercise_qa_state_id_pt);
        $criteria->compare('t.exercise_qa_state_id_sv', $this->exercise_qa_state_id_sv);
        $criteria->compare('t.exercise_qa_state_id_cn', $this->exercise_qa_state_id_cn);
        $criteria->compare('t.exercise_qa_state_id_de', $this->exercise_qa_state_id_de);


        return $criteria;

    }

}
