<?php

/**
 * This is the model base class for the table "chapter_qa_state".
 *
 * Columns in table "chapter_qa_state" available as properties of the model:
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
 * @property integer $thumbnail_approved
 * @property integer $about_approved
 * @property integer $video_approved
 * @property integer $teachers_guide_approved
 * @property integer $exercises_approved
 * @property integer $snapshots_approved
 * @property integer $credits_approved
 * @property integer $title_proofed
 * @property integer $slug_proofed
 * @property integer $thumbnail_proofed
 * @property integer $about_proofed
 * @property integer $video_proofed
 * @property integer $teachers_guide_proofed
 * @property integer $exercises_proofed
 * @property integer $snapshots_proofed
 * @property integer $credits_proofed
 *
 * Relations of table "chapter_qa_state" available as properties of the model:
 * @property Chapter[] $chapters
 */
abstract class BaseChapterQaState extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'chapter_qa_state';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, slug_approved, thumbnail_approved, about_approved, video_approved, teachers_guide_approved, exercises_approved, snapshots_approved, credits_approved, title_proofed, slug_proofed, thumbnail_proofed, about_proofed, video_proofed, teachers_guide_proofed, exercises_proofed, snapshots_proofed, credits_proofed', 'default', 'setOnEmpty' => true, 'value' => null),
                array('draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, slug_approved, thumbnail_approved, about_approved, video_approved, teachers_guide_approved, exercises_approved, snapshots_approved, credits_approved, title_proofed, slug_proofed, thumbnail_proofed, about_proofed, video_proofed, teachers_guide_proofed, exercises_proofed, snapshots_proofed, credits_proofed', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, slug_approved, thumbnail_approved, about_approved, video_approved, teachers_guide_approved, exercises_approved, snapshots_approved, credits_approved, title_proofed, slug_proofed, thumbnail_proofed, about_proofed, video_proofed, teachers_guide_proofed, exercises_proofed, snapshots_proofed, credits_proofed', 'safe', 'on' => 'search'),
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
        return array(
            'chapters' => array(self::HAS_MANY, 'Chapter', 'chapter_qa_state_id'),
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
            'thumbnail_approved' => Yii::t('model', 'Thumbnail Approved'),
            'about_approved' => Yii::t('model', 'About Approved'),
            'video_approved' => Yii::t('model', 'Video Approved'),
            'teachers_guide_approved' => Yii::t('model', 'Teachers Guide Approved'),
            'exercises_approved' => Yii::t('model', 'Exercises Approved'),
            'snapshots_approved' => Yii::t('model', 'Snapshots Approved'),
            'credits_approved' => Yii::t('model', 'Credits Approved'),
            'title_proofed' => Yii::t('model', 'Title Proofed'),
            'slug_proofed' => Yii::t('model', 'Slug Proofed'),
            'thumbnail_proofed' => Yii::t('model', 'Thumbnail Proofed'),
            'about_proofed' => Yii::t('model', 'About Proofed'),
            'video_proofed' => Yii::t('model', 'Video Proofed'),
            'teachers_guide_proofed' => Yii::t('model', 'Teachers Guide Proofed'),
            'exercises_proofed' => Yii::t('model', 'Exercises Proofed'),
            'snapshots_proofed' => Yii::t('model', 'Snapshots Proofed'),
            'credits_proofed' => Yii::t('model', 'Credits Proofed'),
        );
    }

    public function search($criteria = null)
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
        $criteria->compare('t.thumbnail_approved', $this->thumbnail_approved);
        $criteria->compare('t.about_approved', $this->about_approved);
        $criteria->compare('t.video_approved', $this->video_approved);
        $criteria->compare('t.teachers_guide_approved', $this->teachers_guide_approved);
        $criteria->compare('t.exercises_approved', $this->exercises_approved);
        $criteria->compare('t.snapshots_approved', $this->snapshots_approved);
        $criteria->compare('t.credits_approved', $this->credits_approved);
        $criteria->compare('t.title_proofed', $this->title_proofed);
        $criteria->compare('t.slug_proofed', $this->slug_proofed);
        $criteria->compare('t.thumbnail_proofed', $this->thumbnail_proofed);
        $criteria->compare('t.about_proofed', $this->about_proofed);
        $criteria->compare('t.video_proofed', $this->video_proofed);
        $criteria->compare('t.teachers_guide_proofed', $this->teachers_guide_proofed);
        $criteria->compare('t.exercises_proofed', $this->exercises_proofed);
        $criteria->compare('t.snapshots_proofed', $this->snapshots_proofed);
        $criteria->compare('t.credits_proofed', $this->credits_proofed);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
