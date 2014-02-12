<?php

/**
 * This is the model base class for the table "download_link_qa_state".
 *
 * Columns in table "download_link_qa_state" available as properties of the model:
 * @property string $id
 * @property string $status
 * @property integer $draft_validation_progress
 * @property integer $preview_validation_progress
 * @property integer $public_validation_progress
 * @property integer $approval_progress
 * @property integer $proofing_progress
 * @property integer $previewing_welcome
 * @property integer $candidate_for_public_status
 * @property integer $file_media_id_approved
 * @property integer $title_approved
 * @property integer $file_media_id_proofed
 * @property integer $title_proofed
 *
 * Relations of table "download_link_qa_state" available as properties of the model:
 * @property DownloadLink[] $downloadLinks
 */
abstract class BaseDownloadLinkQaState extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'download_link_qa_state';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, previewing_welcome, candidate_for_public_status, file_media_id_approved, title_approved, file_media_id_proofed, title_proofed', 'default', 'setOnEmpty' => true, 'value' => null),
                array('draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, previewing_welcome, candidate_for_public_status, file_media_id_approved, title_approved, file_media_id_proofed, title_proofed', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, previewing_welcome, candidate_for_public_status, file_media_id_approved, title_approved, file_media_id_proofed, title_proofed', 'safe', 'on' => 'search'),
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
                'downloadLinks' => array(self::HAS_MANY, 'DownloadLink', 'download_link_qa_state_id'),
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
            'previewing_welcome' => Yii::t('model', 'Previewing Welcome'),
            'candidate_for_public_status' => Yii::t('model', 'Candidate For Public Status'),
            'file_media_id_approved' => Yii::t('model', 'File Media Id Approved'),
            'title_approved' => Yii::t('model', 'Title Approved'),
            'file_media_id_proofed' => Yii::t('model', 'File Media Id Proofed'),
            'title_proofed' => Yii::t('model', 'Title Proofed'),
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
        $criteria->compare('t.previewing_welcome', $this->previewing_welcome);
        $criteria->compare('t.candidate_for_public_status', $this->candidate_for_public_status);
        $criteria->compare('t.file_media_id_approved', $this->file_media_id_approved);
        $criteria->compare('t.title_approved', $this->title_approved);
        $criteria->compare('t.file_media_id_proofed', $this->file_media_id_proofed);
        $criteria->compare('t.title_proofed', $this->title_proofed);


        return $criteria;

    }

}
