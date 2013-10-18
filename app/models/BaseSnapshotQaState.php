<?php

/**
 * This is the model base class for the table "snapshot_qa_state".
 *
 * Columns in table "snapshot_qa_state" available as properties of the model:
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
 * @property integer $link_approved
 * @property integer $slug_proofed
 * @property integer $link_proofed
 *
 * Relations of table "snapshot_qa_state" available as properties of the model:
 * @property Snapshot[] $snapshots
 * @property Snapshot[] $snapshots1
 * @property Snapshot[] $snapshots2
 * @property Snapshot[] $snapshots3
 * @property Snapshot[] $snapshots4
 * @property Snapshot[] $snapshots5
 * @property Snapshot[] $snapshots6
 * @property Snapshot[] $snapshots7
 */
abstract class BaseSnapshotQaState extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'snapshot_qa_state';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, link_approved, slug_proofed, link_proofed', 'default', 'setOnEmpty' => true, 'value' => null),
                array('draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, link_approved, slug_proofed, link_proofed', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, slug_approved, link_approved, slug_proofed, link_proofed', 'safe', 'on' => 'search'),
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
            'snapshots' => array(self::HAS_MANY, 'Snapshot', 'snapshot_qa_state_id_de'),
            'snapshots1' => array(self::HAS_MANY, 'Snapshot', 'snapshot_qa_state_id_en'),
            'snapshots2' => array(self::HAS_MANY, 'Snapshot', 'snapshot_qa_state_id_cn'),
            'snapshots3' => array(self::HAS_MANY, 'Snapshot', 'snapshot_qa_state_id_es'),
            'snapshots4' => array(self::HAS_MANY, 'Snapshot', 'snapshot_qa_state_id_fa'),
            'snapshots5' => array(self::HAS_MANY, 'Snapshot', 'snapshot_qa_state_id_hi'),
            'snapshots6' => array(self::HAS_MANY, 'Snapshot', 'snapshot_qa_state_id_pt'),
            'snapshots7' => array(self::HAS_MANY, 'Snapshot', 'snapshot_qa_state_id_sv'),
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
            'link_approved' => Yii::t('model', 'Link Approved'),
            'slug_proofed' => Yii::t('model', 'Slug Proofed'),
            'link_proofed' => Yii::t('model', 'Link Proofed'),
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
        $criteria->compare('t.slug_approved', $this->slug_approved);
        $criteria->compare('t.link_approved', $this->link_approved);
        $criteria->compare('t.slug_proofed', $this->slug_proofed);
        $criteria->compare('t.link_proofed', $this->link_proofed);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
