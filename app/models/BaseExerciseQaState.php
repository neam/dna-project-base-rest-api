<?php

/**
 * This is the model base class for the table "exercise_qa_state".
 *
 * Columns in table "exercise_qa_state" available as properties of the model:
 * @property string $id
 * @property string $status
 * @property integer $draft_validation_progress
 * @property integer $preview_validation_progress
 * @property integer $public_validation_progress
 * @property integer $approval_progress
 * @property integer $proofing_progress
 * @property integer $translations_draft_validation_progress
 * @property integer $translations_preview_validation_progress
 * @property integer $translations_public_validation_progress
 * @property integer $translations_approval_progress
 * @property integer $translations_proofing_progress
 * @property integer $previewing_welcome
 * @property integer $candidate_for_public_status
 * @property integer $title_approved
 * @property integer $slug_approved
 * @property integer $question_approved
 * @property integer $description_approved
 * @property integer $thumbnail_approved
 * @property integer $materials_approved
 * @property integer $title_proofed
 * @property integer $slug_proofed
 * @property integer $question_proofed
 * @property integer $description_proofed
 * @property integer $thumbnail_proofed
 * @property integer $materials_proofed
 *
 * Relations of table "exercise_qa_state" available as properties of the model:
 * @property Exercise[] $exercises
 * @property Exercise[] $exercises1
 * @property Exercise[] $exercises2
 * @property Exercise[] $exercises3
 * @property Exercise[] $exercises4
 * @property Exercise[] $exercises5
 * @property Exercise[] $exercises6
 * @property Exercise[] $exercises7
 */
abstract class BaseExerciseQaState extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'exercise_qa_state';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, slug_approved, question_approved, description_approved, thumbnail_approved, materials_approved, title_proofed, slug_proofed, question_proofed, description_proofed, thumbnail_proofed, materials_proofed', 'default', 'setOnEmpty' => true, 'value' => null),
                array('draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, slug_approved, question_approved, description_approved, thumbnail_approved, materials_approved, title_proofed, slug_proofed, question_proofed, description_proofed, thumbnail_proofed, materials_proofed', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, slug_approved, question_approved, description_approved, thumbnail_approved, materials_approved, title_proofed, slug_proofed, question_proofed, description_proofed, thumbnail_proofed, materials_proofed', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->status;
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
                'exercises' => array(self::HAS_MANY, 'Exercise', 'exercise_qa_state_id_en'),
                'exercises1' => array(self::HAS_MANY, 'Exercise', 'exercise_qa_state_id_cn'),
                'exercises2' => array(self::HAS_MANY, 'Exercise', 'exercise_qa_state_id_de'),
                'exercises3' => array(self::HAS_MANY, 'Exercise', 'exercise_qa_state_id_es'),
                'exercises4' => array(self::HAS_MANY, 'Exercise', 'exercise_qa_state_id_fa'),
                'exercises5' => array(self::HAS_MANY, 'Exercise', 'exercise_qa_state_id_hi'),
                'exercises6' => array(self::HAS_MANY, 'Exercise', 'exercise_qa_state_id_pt'),
                'exercises7' => array(self::HAS_MANY, 'Exercise', 'exercise_qa_state_id_sv'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'status' => Yii::t('model', 'Status'),
            'draft_validation_progress' => Yii::t('model', 'Draft Validation Progress'),
            'preview_validation_progress' => Yii::t('model', 'Preview Validation Progress'),
            'public_validation_progress' => Yii::t('model', 'Public Validation Progress'),
            'approval_progress' => Yii::t('model', 'Approval Progress'),
            'proofing_progress' => Yii::t('model', 'Proofing Progress'),
            'translations_draft_validation_progress' => Yii::t('model', 'Translations Draft Validation Progress'),
            'translations_preview_validation_progress' => Yii::t('model', 'Translations Preview Validation Progress'),
            'translations_public_validation_progress' => Yii::t('model', 'Translations Public Validation Progress'),
            'translations_approval_progress' => Yii::t('model', 'Translations Approval Progress'),
            'translations_proofing_progress' => Yii::t('model', 'Translations Proofing Progress'),
            'previewing_welcome' => Yii::t('model', 'Previewing Welcome'),
            'candidate_for_public_status' => Yii::t('model', 'Candidate For Public Status'),
            'title_approved' => Yii::t('model', 'Title Approved'),
            'slug_approved' => Yii::t('model', 'Slug Approved'),
            'question_approved' => Yii::t('model', 'Question Approved'),
            'description_approved' => Yii::t('model', 'Description Approved'),
            'thumbnail_approved' => Yii::t('model', 'Thumbnail Approved'),
            'materials_approved' => Yii::t('model', 'Materials Approved'),
            'title_proofed' => Yii::t('model', 'Title Proofed'),
            'slug_proofed' => Yii::t('model', 'Slug Proofed'),
            'question_proofed' => Yii::t('model', 'Question Proofed'),
            'description_proofed' => Yii::t('model', 'Description Proofed'),
            'thumbnail_proofed' => Yii::t('model', 'Thumbnail Proofed'),
            'materials_proofed' => Yii::t('model', 'Materials Proofed'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.draft_validation_progress', $this->draft_validation_progress);
        $criteria->compare('t.preview_validation_progress', $this->preview_validation_progress);
        $criteria->compare('t.public_validation_progress', $this->public_validation_progress);
        $criteria->compare('t.approval_progress', $this->approval_progress);
        $criteria->compare('t.proofing_progress', $this->proofing_progress);
        $criteria->compare('t.translations_draft_validation_progress', $this->translations_draft_validation_progress);
        $criteria->compare('t.translations_preview_validation_progress', $this->translations_preview_validation_progress);
        $criteria->compare('t.translations_public_validation_progress', $this->translations_public_validation_progress);
        $criteria->compare('t.translations_approval_progress', $this->translations_approval_progress);
        $criteria->compare('t.translations_proofing_progress', $this->translations_proofing_progress);
        $criteria->compare('t.previewing_welcome', $this->previewing_welcome);
        $criteria->compare('t.candidate_for_public_status', $this->candidate_for_public_status);
        $criteria->compare('t.title_approved', $this->title_approved);
        $criteria->compare('t.slug_approved', $this->slug_approved);
        $criteria->compare('t.question_approved', $this->question_approved);
        $criteria->compare('t.description_approved', $this->description_approved);
        $criteria->compare('t.thumbnail_approved', $this->thumbnail_approved);
        $criteria->compare('t.materials_approved', $this->materials_approved);
        $criteria->compare('t.title_proofed', $this->title_proofed);
        $criteria->compare('t.slug_proofed', $this->slug_proofed);
        $criteria->compare('t.question_proofed', $this->question_proofed);
        $criteria->compare('t.description_proofed', $this->description_proofed);
        $criteria->compare('t.thumbnail_proofed', $this->thumbnail_proofed);
        $criteria->compare('t.materials_proofed', $this->materials_proofed);


        return $criteria;

    }

}
