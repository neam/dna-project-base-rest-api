<?php

/**
 * This is the model base class for the table "data_source_qa_state".
 *
 * Columns in table "data_source_qa_state" available as properties of the model:
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
 * @property integer $link_approved
 * @property integer $slug_proofed
 * @property integer $title_proofed
 * @property integer $link_proofed
 * @property integer $draft_saved
 *
 * Relations of table "data_source_qa_state" available as properties of the model:
 * @property DataSource[] $dataSources
 * @property DataSource[] $dataSources1
 * @property DataSource[] $dataSources2
 * @property DataSource[] $dataSources3
 * @property DataSource[] $dataSources4
 * @property DataSource[] $dataSources5
 * @property DataSource[] $dataSources6
 * @property DataSource[] $dataSources7
 */
abstract class BaseDataSourceQaState extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'data_source_qa_state';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, title_approved, link_approved, slug_proofed, title_proofed, link_proofed, draft_saved', 'default', 'setOnEmpty' => true, 'value' => null),
                array('draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, title_approved, link_approved, slug_proofed, title_proofed, link_proofed, draft_saved', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, title_approved, link_approved, slug_proofed, title_proofed, link_proofed, draft_saved', 'safe', 'on' => 'search'),
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
                'dataSources' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id_en'),
                'dataSources1' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id_cn'),
                'dataSources2' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id_de'),
                'dataSources3' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id_es'),
                'dataSources4' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id_fa'),
                'dataSources5' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id_hi'),
                'dataSources6' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id_pt'),
                'dataSources7' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id_sv'),
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
            'link_approved' => Yii::t('model', 'Link Approved'),
            'slug_proofed' => Yii::t('model', 'Slug Proofed'),
            'title_proofed' => Yii::t('model', 'Title Proofed'),
            'link_proofed' => Yii::t('model', 'Link Proofed'),
            'draft_saved' => Yii::t('model', 'Draft Saved'),
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
        $criteria->compare('t.link_approved', $this->link_approved);
        $criteria->compare('t.slug_proofed', $this->slug_proofed);
        $criteria->compare('t.title_proofed', $this->title_proofed);
        $criteria->compare('t.link_proofed', $this->link_proofed);
        $criteria->compare('t.draft_saved', $this->draft_saved);


        return $criteria;

    }

}
