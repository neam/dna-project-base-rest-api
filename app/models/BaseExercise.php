<?php

/**
 * This is the model base class for the table "exercise".
 *
 * Columns in table "exercise" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property string $slug_en
 * @property string $question_en
 * @property string $description_en
 * @property integer $thumbnail_media_id
 * @property string $slideshow_file_id
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
 * @property string $question_es
 * @property string $question_fa
 * @property string $question_hi
 * @property string $question_pt
 * @property string $question_sv
 * @property string $question_cn
 * @property string $question_de
 * @property string $description_es
 * @property string $description_fa
 * @property string $description_hi
 * @property string $description_pt
 * @property string $description_sv
 * @property string $description_cn
 * @property string $description_de
 * @property string $exercise_qa_state_id
 *
 * Relations of table "exercise" available as properties of the model:
 * @property ExerciseQaState $exerciseQaState
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
                array('version, cloned_from_id, title_en, slug_en, question_en, description_en, thumbnail_media_id, slideshow_file_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, question_es, question_fa, question_hi, question_pt, question_sv, question_cn, question_de, description_es, description_fa, description_hi, description_pt, description_sv, description_cn, description_de, exercise_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, thumbnail_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, slideshow_file_id, node_id, exercise_qa_state_id', 'length', 'max' => 20),
                array('title_en, slug_en, question_en, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, question_es, question_fa, question_hi, question_pt, question_sv, question_cn, question_de', 'length', 'max' => 255),
                array('description_en, created, modified, description_es, description_fa, description_hi, description_pt, description_sv, description_cn, description_de', 'safe'),
                array('id, version, cloned_from_id, title_en, slug_en, question_en, description_en, thumbnail_media_id, slideshow_file_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, question_es, question_fa, question_hi, question_pt, question_sv, question_cn, question_de, description_es, description_fa, description_hi, description_pt, description_sv, description_cn, description_de, exercise_qa_state_id', 'safe', 'on' => 'search'),
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
            'exerciseQaState' => array(self::BELONGS_TO, 'ExerciseQaState', 'exercise_qa_state_id'),
            'clonedFrom' => array(self::BELONGS_TO, 'Exercise', 'cloned_from_id'),
            'exercises' => array(self::HAS_MANY, 'Exercise', 'cloned_from_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'thumbnailMedia' => array(self::BELONGS_TO, 'P3Media', 'thumbnail_media_id'),
            'slideshowFile' => array(self::BELONGS_TO, 'SlideshowFile', 'slideshow_file_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'exercise_id'),
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
            'question_en' => Yii::t('model', 'Question En'),
            'description_en' => Yii::t('model', 'Description En'),
            'thumbnail_media_id' => Yii::t('model', 'Thumbnail Media'),
            'slideshow_file_id' => Yii::t('model', 'Slideshow File'),
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
            'question_es' => Yii::t('model', 'Question Es'),
            'question_fa' => Yii::t('model', 'Question Fa'),
            'question_hi' => Yii::t('model', 'Question Hi'),
            'question_pt' => Yii::t('model', 'Question Pt'),
            'question_sv' => Yii::t('model', 'Question Sv'),
            'question_cn' => Yii::t('model', 'Question Cn'),
            'question_de' => Yii::t('model', 'Question De'),
            'description_es' => Yii::t('model', 'Description Es'),
            'description_fa' => Yii::t('model', 'Description Fa'),
            'description_hi' => Yii::t('model', 'Description Hi'),
            'description_pt' => Yii::t('model', 'Description Pt'),
            'description_sv' => Yii::t('model', 'Description Sv'),
            'description_cn' => Yii::t('model', 'Description Cn'),
            'description_de' => Yii::t('model', 'Description De'),
            'exercise_qa_state_id' => Yii::t('model', 'Exercise Qa State'),
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
        $criteria->compare('t.question_en', $this->question_en, true);
        $criteria->compare('t.description_en', $this->description_en, true);
        $criteria->compare('t.thumbnail_media_id', $this->thumbnail_media_id);
        $criteria->compare('t.slideshow_file_id', $this->slideshow_file_id);
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
        $criteria->compare('t.question_es', $this->question_es, true);
        $criteria->compare('t.question_fa', $this->question_fa, true);
        $criteria->compare('t.question_hi', $this->question_hi, true);
        $criteria->compare('t.question_pt', $this->question_pt, true);
        $criteria->compare('t.question_sv', $this->question_sv, true);
        $criteria->compare('t.question_cn', $this->question_cn, true);
        $criteria->compare('t.question_de', $this->question_de, true);
        $criteria->compare('t.description_es', $this->description_es, true);
        $criteria->compare('t.description_fa', $this->description_fa, true);
        $criteria->compare('t.description_hi', $this->description_hi, true);
        $criteria->compare('t.description_pt', $this->description_pt, true);
        $criteria->compare('t.description_sv', $this->description_sv, true);
        $criteria->compare('t.description_cn', $this->description_cn, true);
        $criteria->compare('t.description_de', $this->description_de, true);
        $criteria->compare('t.exercise_qa_state_id', $this->exercise_qa_state_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
