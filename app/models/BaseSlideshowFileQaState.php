<?php

/**
 * This is the model base class for the table "slideshow_file_qa_state".
 *
 * Columns in table "slideshow_file_qa_state" available as properties of the model:
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
 * @property integer $slug_approved
 * @property integer $title_approved
 * @property integer $file_approved
 * @property integer $slug_proofed
 * @property integer $title_proofed
 * @property integer $file_proofed
 *
 * Relations of table "slideshow_file_qa_state" available as properties of the model:
 * @property SlideshowFile[] $slideshowFiles
 * @property SlideshowFile[] $slideshowFiles1
 * @property SlideshowFile[] $slideshowFiles2
 * @property SlideshowFile[] $slideshowFiles3
 * @property SlideshowFile[] $slideshowFiles4
 * @property SlideshowFile[] $slideshowFiles5
 * @property SlideshowFile[] $slideshowFiles6
 * @property SlideshowFile[] $slideshowFiles7
 */
abstract class BaseSlideshowFileQaState extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'slideshow_file_qa_state';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, title_approved, file_approved, slug_proofed, title_proofed, file_proofed', 'default', 'setOnEmpty' => true, 'value' => null),
                array('draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, title_approved, file_approved, slug_proofed, title_proofed, file_proofed', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, title_approved, file_approved, slug_proofed, title_proofed, file_proofed', 'safe', 'on' => 'search'),
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
                'slideshowFiles' => array(self::HAS_MANY, 'SlideshowFile', 'slideshow_file_qa_state_id_en'),
                'slideshowFiles1' => array(self::HAS_MANY, 'SlideshowFile', 'slideshow_file_qa_state_id_cn'),
                'slideshowFiles2' => array(self::HAS_MANY, 'SlideshowFile', 'slideshow_file_qa_state_id_de'),
                'slideshowFiles3' => array(self::HAS_MANY, 'SlideshowFile', 'slideshow_file_qa_state_id_es'),
                'slideshowFiles4' => array(self::HAS_MANY, 'SlideshowFile', 'slideshow_file_qa_state_id_fa'),
                'slideshowFiles5' => array(self::HAS_MANY, 'SlideshowFile', 'slideshow_file_qa_state_id_hi'),
                'slideshowFiles6' => array(self::HAS_MANY, 'SlideshowFile', 'slideshow_file_qa_state_id_pt'),
                'slideshowFiles7' => array(self::HAS_MANY, 'SlideshowFile', 'slideshow_file_qa_state_id_sv'),
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
            'slug_approved' => Yii::t('model', 'Slug Approved'),
            'title_approved' => Yii::t('model', 'Title Approved'),
            'file_approved' => Yii::t('model', 'File Approved'),
            'slug_proofed' => Yii::t('model', 'Slug Proofed'),
            'title_proofed' => Yii::t('model', 'Title Proofed'),
            'file_proofed' => Yii::t('model', 'File Proofed'),
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
        $criteria->compare('t.slug_approved', $this->slug_approved);
        $criteria->compare('t.title_approved', $this->title_approved);
        $criteria->compare('t.file_approved', $this->file_approved);
        $criteria->compare('t.slug_proofed', $this->slug_proofed);
        $criteria->compare('t.title_proofed', $this->title_proofed);
        $criteria->compare('t.file_proofed', $this->file_proofed);


        return $criteria;

    }

}
