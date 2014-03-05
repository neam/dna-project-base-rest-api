<?php

/**
 * This is the model base class for the table "data_source_qa_state".
 *
 * Columns in table "data_source_qa_state" available as properties of the model:
 * @property string $id
 * @property string $status
 * @property integer $translations_draft_validation_progress
 * @property integer $translations_preview_validation_progress
 * @property integer $translations_public_validation_progress
 * @property integer $translations_approval_progress
 * @property integer $translations_proofing_progress
 * @property integer $slug_approved
 * @property integer $title_approved
 * @property integer $link_approved
 * @property integer $slug_proofed
 * @property integer $title_proofed
 * @property integer $draft_validation_progress
 * @property integer $link_proofed
 * @property integer $preview_validation_progress
 * @property integer $draft_saved
 * @property integer $public_validation_progress
 * @property integer $translate_into_en_validation_progress
 * @property integer $translate_into_ar_validation_progress
 * @property integer $translate_into_bg_validation_progress
 * @property integer $translate_into_ca_validation_progress
 * @property integer $translate_into_cs_validation_progress
 * @property integer $translate_into_da_validation_progress
 * @property integer $translate_into_de_validation_progress
 * @property integer $translate_into_en_gb_validation_progress
 * @property integer $translate_into_en_us_validation_progress
 * @property integer $translate_into_el_validation_progress
 * @property integer $translate_into_es_validation_progress
 * @property integer $translate_into_fi_validation_progress
 * @property integer $translate_into_fil_validation_progress
 * @property integer $translate_into_fr_validation_progress
 * @property integer $translate_into_hi_validation_progress
 * @property integer $translate_into_hr_validation_progress
 * @property integer $translate_into_hu_validation_progress
 * @property integer $translate_into_id_validation_progress
 * @property integer $translate_into_iw_validation_progress
 * @property integer $translate_into_it_validation_progress
 * @property integer $translate_into_ja_validation_progress
 * @property integer $translate_into_ko_validation_progress
 * @property integer $translate_into_lt_validation_progress
 * @property integer $translate_into_lv_validation_progress
 * @property integer $translate_into_nl_validation_progress
 * @property integer $translate_into_no_validation_progress
 * @property integer $translate_into_pl_validation_progress
 * @property integer $translate_into_pt_validation_progress
 * @property integer $translate_into_pt_br_validation_progress
 * @property integer $translate_into_pt_pt_validation_progress
 * @property integer $translate_into_ro_validation_progress
 * @property integer $translate_into_ru_validation_progress
 * @property integer $translate_into_sk_validation_progress
 * @property integer $translate_into_sl_validation_progress
 * @property integer $translate_into_sr_validation_progress
 * @property integer $translate_into_sv_validation_progress
 * @property integer $translate_into_th_validation_progress
 * @property integer $translate_into_tr_validation_progress
 * @property integer $translate_into_uk_validation_progress
 * @property integer $translate_into_vi_validation_progress
 * @property integer $translate_into_zh_validation_progress
 * @property integer $translate_into_zh_cn_validation_progress
 * @property integer $approval_progress
 * @property integer $proofing_progress
 * @property integer $translate_into_zh_tw_validation_progress
 * @property integer $previewing_welcome
 * @property integer $candidate_for_public_status
 * @property integer $slug_en_approved
 * @property integer $title_en_approved
 * @property integer $about_en_approved
 * @property integer $slug_en_proofed
 * @property integer $title_en_proofed
 * @property integer $about_en_proofed
 *
 * Relations of table "data_source_qa_state" available as properties of the model:
 * @property DataSource[] $dataSources
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
                array('status, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, slug_approved, title_approved, link_approved, slug_proofed, title_proofed, draft_validation_progress, link_proofed, preview_validation_progress, draft_saved, public_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, approval_progress, proofing_progress, translate_into_zh_tw_validation_progress, previewing_welcome, candidate_for_public_status, slug_en_approved, title_en_approved, about_en_approved, slug_en_proofed, title_en_proofed, about_en_proofed', 'default', 'setOnEmpty' => true, 'value' => null),
                array('translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, slug_approved, title_approved, link_approved, slug_proofed, title_proofed, draft_validation_progress, link_proofed, preview_validation_progress, draft_saved, public_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, approval_progress, proofing_progress, translate_into_zh_tw_validation_progress, previewing_welcome, candidate_for_public_status, slug_en_approved, title_en_approved, about_en_approved, slug_en_proofed, title_en_proofed, about_en_proofed', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, slug_approved, title_approved, link_approved, slug_proofed, title_proofed, draft_validation_progress, link_proofed, preview_validation_progress, draft_saved, public_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, approval_progress, proofing_progress, translate_into_zh_tw_validation_progress, previewing_welcome, candidate_for_public_status, slug_en_approved, title_en_approved, about_en_approved, slug_en_proofed, title_en_proofed, about_en_proofed', 'safe', 'on' => 'search'),
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
                'dataSources' => array(self::HAS_MANY, 'DataSource', 'data_source_qa_state_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'status' => Yii::t('model', 'Status'),
            'translations_draft_validation_progress' => Yii::t('model', 'Translations Draft Validation Progress'),
            'translations_preview_validation_progress' => Yii::t('model', 'Translations Preview Validation Progress'),
            'translations_public_validation_progress' => Yii::t('model', 'Translations Public Validation Progress'),
            'translations_approval_progress' => Yii::t('model', 'Translations Approval Progress'),
            'translations_proofing_progress' => Yii::t('model', 'Translations Proofing Progress'),
            'slug_approved' => Yii::t('model', 'Slug Approved'),
            'title_approved' => Yii::t('model', 'Title Approved'),
            'link_approved' => Yii::t('model', 'Link Approved'),
            'slug_proofed' => Yii::t('model', 'Slug Proofed'),
            'title_proofed' => Yii::t('model', 'Title Proofed'),
            'draft_validation_progress' => Yii::t('model', 'Draft Validation Progress'),
            'link_proofed' => Yii::t('model', 'Link Proofed'),
            'preview_validation_progress' => Yii::t('model', 'Preview Validation Progress'),
            'draft_saved' => Yii::t('model', 'Draft Saved'),
            'public_validation_progress' => Yii::t('model', 'Public Validation Progress'),
            'translate_into_en_validation_progress' => Yii::t('model', 'Translate Into En Validation Progress'),
            'translate_into_ar_validation_progress' => Yii::t('model', 'Translate Into Ar Validation Progress'),
            'translate_into_bg_validation_progress' => Yii::t('model', 'Translate Into Bg Validation Progress'),
            'translate_into_ca_validation_progress' => Yii::t('model', 'Translate Into Ca Validation Progress'),
            'translate_into_cs_validation_progress' => Yii::t('model', 'Translate Into Cs Validation Progress'),
            'translate_into_da_validation_progress' => Yii::t('model', 'Translate Into Da Validation Progress'),
            'translate_into_de_validation_progress' => Yii::t('model', 'Translate Into De Validation Progress'),
            'translate_into_en_gb_validation_progress' => Yii::t('model', 'Translate Into En Gb Validation Progress'),
            'translate_into_en_us_validation_progress' => Yii::t('model', 'Translate Into En Us Validation Progress'),
            'translate_into_el_validation_progress' => Yii::t('model', 'Translate Into El Validation Progress'),
            'translate_into_es_validation_progress' => Yii::t('model', 'Translate Into Es Validation Progress'),
            'translate_into_fi_validation_progress' => Yii::t('model', 'Translate Into Fi Validation Progress'),
            'translate_into_fil_validation_progress' => Yii::t('model', 'Translate Into Fil Validation Progress'),
            'translate_into_fr_validation_progress' => Yii::t('model', 'Translate Into Fr Validation Progress'),
            'translate_into_hi_validation_progress' => Yii::t('model', 'Translate Into Hi Validation Progress'),
            'translate_into_hr_validation_progress' => Yii::t('model', 'Translate Into Hr Validation Progress'),
            'translate_into_hu_validation_progress' => Yii::t('model', 'Translate Into Hu Validation Progress'),
            'translate_into_id_validation_progress' => Yii::t('model', 'Translate Into Id Validation Progress'),
            'translate_into_iw_validation_progress' => Yii::t('model', 'Translate Into Iw Validation Progress'),
            'translate_into_it_validation_progress' => Yii::t('model', 'Translate Into It Validation Progress'),
            'translate_into_ja_validation_progress' => Yii::t('model', 'Translate Into Ja Validation Progress'),
            'translate_into_ko_validation_progress' => Yii::t('model', 'Translate Into Ko Validation Progress'),
            'translate_into_lt_validation_progress' => Yii::t('model', 'Translate Into Lt Validation Progress'),
            'translate_into_lv_validation_progress' => Yii::t('model', 'Translate Into Lv Validation Progress'),
            'translate_into_nl_validation_progress' => Yii::t('model', 'Translate Into Nl Validation Progress'),
            'translate_into_no_validation_progress' => Yii::t('model', 'Translate Into No Validation Progress'),
            'translate_into_pl_validation_progress' => Yii::t('model', 'Translate Into Pl Validation Progress'),
            'translate_into_pt_validation_progress' => Yii::t('model', 'Translate Into Pt Validation Progress'),
            'translate_into_pt_br_validation_progress' => Yii::t('model', 'Translate Into Pt Br Validation Progress'),
            'translate_into_pt_pt_validation_progress' => Yii::t('model', 'Translate Into Pt Pt Validation Progress'),
            'translate_into_ro_validation_progress' => Yii::t('model', 'Translate Into Ro Validation Progress'),
            'translate_into_ru_validation_progress' => Yii::t('model', 'Translate Into Ru Validation Progress'),
            'translate_into_sk_validation_progress' => Yii::t('model', 'Translate Into Sk Validation Progress'),
            'translate_into_sl_validation_progress' => Yii::t('model', 'Translate Into Sl Validation Progress'),
            'translate_into_sr_validation_progress' => Yii::t('model', 'Translate Into Sr Validation Progress'),
            'translate_into_sv_validation_progress' => Yii::t('model', 'Translate Into Sv Validation Progress'),
            'translate_into_th_validation_progress' => Yii::t('model', 'Translate Into Th Validation Progress'),
            'translate_into_tr_validation_progress' => Yii::t('model', 'Translate Into Tr Validation Progress'),
            'translate_into_uk_validation_progress' => Yii::t('model', 'Translate Into Uk Validation Progress'),
            'translate_into_vi_validation_progress' => Yii::t('model', 'Translate Into Vi Validation Progress'),
            'translate_into_zh_validation_progress' => Yii::t('model', 'Translate Into Zh Validation Progress'),
            'translate_into_zh_cn_validation_progress' => Yii::t('model', 'Translate Into Zh Cn Validation Progress'),
            'approval_progress' => Yii::t('model', 'Approval Progress'),
            'proofing_progress' => Yii::t('model', 'Proofing Progress'),
            'translate_into_zh_tw_validation_progress' => Yii::t('model', 'Translate Into Zh Tw Validation Progress'),
            'previewing_welcome' => Yii::t('model', 'Previewing Welcome'),
            'candidate_for_public_status' => Yii::t('model', 'Candidate For Public Status'),
            'slug_en_approved' => Yii::t('model', 'Slug En Approved'),
            'title_en_approved' => Yii::t('model', 'Title En Approved'),
            'about_en_approved' => Yii::t('model', 'About En Approved'),
            'slug_en_proofed' => Yii::t('model', 'Slug En Proofed'),
            'title_en_proofed' => Yii::t('model', 'Title En Proofed'),
            'about_en_proofed' => Yii::t('model', 'About En Proofed'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.translations_draft_validation_progress', $this->translations_draft_validation_progress);
        $criteria->compare('t.translations_preview_validation_progress', $this->translations_preview_validation_progress);
        $criteria->compare('t.translations_public_validation_progress', $this->translations_public_validation_progress);
        $criteria->compare('t.translations_approval_progress', $this->translations_approval_progress);
        $criteria->compare('t.translations_proofing_progress', $this->translations_proofing_progress);
        $criteria->compare('t.slug_approved', $this->slug_approved);
        $criteria->compare('t.title_approved', $this->title_approved);
        $criteria->compare('t.link_approved', $this->link_approved);
        $criteria->compare('t.slug_proofed', $this->slug_proofed);
        $criteria->compare('t.title_proofed', $this->title_proofed);
        $criteria->compare('t.draft_validation_progress', $this->draft_validation_progress);
        $criteria->compare('t.link_proofed', $this->link_proofed);
        $criteria->compare('t.preview_validation_progress', $this->preview_validation_progress);
        $criteria->compare('t.draft_saved', $this->draft_saved);
        $criteria->compare('t.public_validation_progress', $this->public_validation_progress);
        $criteria->compare('t.translate_into_en_validation_progress', $this->translate_into_en_validation_progress);
        $criteria->compare('t.translate_into_ar_validation_progress', $this->translate_into_ar_validation_progress);
        $criteria->compare('t.translate_into_bg_validation_progress', $this->translate_into_bg_validation_progress);
        $criteria->compare('t.translate_into_ca_validation_progress', $this->translate_into_ca_validation_progress);
        $criteria->compare('t.translate_into_cs_validation_progress', $this->translate_into_cs_validation_progress);
        $criteria->compare('t.translate_into_da_validation_progress', $this->translate_into_da_validation_progress);
        $criteria->compare('t.translate_into_de_validation_progress', $this->translate_into_de_validation_progress);
        $criteria->compare('t.translate_into_en_gb_validation_progress', $this->translate_into_en_gb_validation_progress);
        $criteria->compare('t.translate_into_en_us_validation_progress', $this->translate_into_en_us_validation_progress);
        $criteria->compare('t.translate_into_el_validation_progress', $this->translate_into_el_validation_progress);
        $criteria->compare('t.translate_into_es_validation_progress', $this->translate_into_es_validation_progress);
        $criteria->compare('t.translate_into_fi_validation_progress', $this->translate_into_fi_validation_progress);
        $criteria->compare('t.translate_into_fil_validation_progress', $this->translate_into_fil_validation_progress);
        $criteria->compare('t.translate_into_fr_validation_progress', $this->translate_into_fr_validation_progress);
        $criteria->compare('t.translate_into_hi_validation_progress', $this->translate_into_hi_validation_progress);
        $criteria->compare('t.translate_into_hr_validation_progress', $this->translate_into_hr_validation_progress);
        $criteria->compare('t.translate_into_hu_validation_progress', $this->translate_into_hu_validation_progress);
        $criteria->compare('t.translate_into_id_validation_progress', $this->translate_into_id_validation_progress);
        $criteria->compare('t.translate_into_iw_validation_progress', $this->translate_into_iw_validation_progress);
        $criteria->compare('t.translate_into_it_validation_progress', $this->translate_into_it_validation_progress);
        $criteria->compare('t.translate_into_ja_validation_progress', $this->translate_into_ja_validation_progress);
        $criteria->compare('t.translate_into_ko_validation_progress', $this->translate_into_ko_validation_progress);
        $criteria->compare('t.translate_into_lt_validation_progress', $this->translate_into_lt_validation_progress);
        $criteria->compare('t.translate_into_lv_validation_progress', $this->translate_into_lv_validation_progress);
        $criteria->compare('t.translate_into_nl_validation_progress', $this->translate_into_nl_validation_progress);
        $criteria->compare('t.translate_into_no_validation_progress', $this->translate_into_no_validation_progress);
        $criteria->compare('t.translate_into_pl_validation_progress', $this->translate_into_pl_validation_progress);
        $criteria->compare('t.translate_into_pt_validation_progress', $this->translate_into_pt_validation_progress);
        $criteria->compare('t.translate_into_pt_br_validation_progress', $this->translate_into_pt_br_validation_progress);
        $criteria->compare('t.translate_into_pt_pt_validation_progress', $this->translate_into_pt_pt_validation_progress);
        $criteria->compare('t.translate_into_ro_validation_progress', $this->translate_into_ro_validation_progress);
        $criteria->compare('t.translate_into_ru_validation_progress', $this->translate_into_ru_validation_progress);
        $criteria->compare('t.translate_into_sk_validation_progress', $this->translate_into_sk_validation_progress);
        $criteria->compare('t.translate_into_sl_validation_progress', $this->translate_into_sl_validation_progress);
        $criteria->compare('t.translate_into_sr_validation_progress', $this->translate_into_sr_validation_progress);
        $criteria->compare('t.translate_into_sv_validation_progress', $this->translate_into_sv_validation_progress);
        $criteria->compare('t.translate_into_th_validation_progress', $this->translate_into_th_validation_progress);
        $criteria->compare('t.translate_into_tr_validation_progress', $this->translate_into_tr_validation_progress);
        $criteria->compare('t.translate_into_uk_validation_progress', $this->translate_into_uk_validation_progress);
        $criteria->compare('t.translate_into_vi_validation_progress', $this->translate_into_vi_validation_progress);
        $criteria->compare('t.translate_into_zh_validation_progress', $this->translate_into_zh_validation_progress);
        $criteria->compare('t.translate_into_zh_cn_validation_progress', $this->translate_into_zh_cn_validation_progress);
        $criteria->compare('t.approval_progress', $this->approval_progress);
        $criteria->compare('t.proofing_progress', $this->proofing_progress);
        $criteria->compare('t.translate_into_zh_tw_validation_progress', $this->translate_into_zh_tw_validation_progress);
        $criteria->compare('t.previewing_welcome', $this->previewing_welcome);
        $criteria->compare('t.candidate_for_public_status', $this->candidate_for_public_status);
        $criteria->compare('t.slug_en_approved', $this->slug_en_approved);
        $criteria->compare('t.title_en_approved', $this->title_en_approved);
        $criteria->compare('t.about_en_approved', $this->about_en_approved);
        $criteria->compare('t.slug_en_proofed', $this->slug_en_proofed);
        $criteria->compare('t.title_en_proofed', $this->title_en_proofed);
        $criteria->compare('t.about_en_proofed', $this->about_en_proofed);


        return $criteria;

    }

}
