<?php

/**
 * This is the model base class for the table "waffle_qa_state".
 *
 * Columns in table "waffle_qa_state" available as properties of the model:
 * @property string $id
 * @property string $status
 * @property integer $draft_validation_progress
 * @property integer $reviewable_validation_progress
 * @property integer $publishable_validation_progress
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
 * @property integer $translate_into_zh_tw_validation_progress
 * @property integer $approval_progress
 * @property integer $proofing_progress
 * @property integer $allow_review
 * @property integer $allow_publish
 * @property integer $title_en_approved
 * @property integer $slug_en_approved
 * @property integer $short_title_en_approved
 * @property integer $file_format_approved
 * @property integer $license_approved
 * @property integer $license_link_approved
 * @property integer $waffle_publisher_id_approved
 * @property integer $json_import_media_id_approved
 * @property integer $title_approved
 * @property integer $title_en_proofed
 * @property integer $po_contents_approved
 * @property integer $slug_en_proofed
 * @property integer $short_title_en_proofed
 * @property integer $file_format_proofed
 * @property integer $license_proofed
 * @property integer $license_link_proofed
 * @property integer $waffle_publisher_id_proofed
 * @property integer $json_import_media_id_proofed
 * @property integer $title_proofed
 * @property integer $po_contents_proofed
 * @property integer $translate_into_fa_validation_progress
 *
 * Relations of table "waffle_qa_state" available as properties of the model:
 * @property Waffle[] $waffles
 */
abstract class BaseWaffleQaState extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'waffle_qa_state';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, draft_validation_progress, reviewable_validation_progress, publishable_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, translate_into_zh_tw_validation_progress, approval_progress, proofing_progress, allow_review, allow_publish, title_en_approved, slug_en_approved, short_title_en_approved, file_format_approved, license_approved, license_link_approved, waffle_publisher_id_approved, json_import_media_id_approved, title_approved, title_en_proofed, po_contents_approved, slug_en_proofed, short_title_en_proofed, file_format_proofed, license_proofed, license_link_proofed, waffle_publisher_id_proofed, json_import_media_id_proofed, title_proofed, po_contents_proofed, translate_into_fa_validation_progress', 'default', 'setOnEmpty' => true, 'value' => null),
                array('draft_validation_progress, reviewable_validation_progress, publishable_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, translate_into_zh_tw_validation_progress, approval_progress, proofing_progress, allow_review, allow_publish, title_en_approved, slug_en_approved, short_title_en_approved, file_format_approved, license_approved, license_link_approved, waffle_publisher_id_approved, json_import_media_id_approved, title_approved, title_en_proofed, po_contents_approved, slug_en_proofed, short_title_en_proofed, file_format_proofed, license_proofed, license_link_proofed, waffle_publisher_id_proofed, json_import_media_id_proofed, title_proofed, po_contents_proofed, translate_into_fa_validation_progress', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, draft_validation_progress, reviewable_validation_progress, publishable_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, translate_into_zh_tw_validation_progress, approval_progress, proofing_progress, allow_review, allow_publish, title_en_approved, slug_en_approved, short_title_en_approved, file_format_approved, license_approved, license_link_approved, waffle_publisher_id_approved, json_import_media_id_approved, title_approved, title_en_proofed, po_contents_approved, slug_en_proofed, short_title_en_proofed, file_format_proofed, license_proofed, license_link_proofed, waffle_publisher_id_proofed, json_import_media_id_proofed, title_proofed, po_contents_proofed, translate_into_fa_validation_progress', 'safe', 'on' => 'search'),
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
                'waffles' => array(self::HAS_MANY, 'Waffle', 'waffle_qa_state_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'status' => Yii::t('model', 'Status'),
            'draft_validation_progress' => Yii::t('model', 'Draft Validation Progress'),
            'reviewable_validation_progress' => Yii::t('model', 'Reviewable Validation Progress'),
            'publishable_validation_progress' => Yii::t('model', 'Publishable Validation Progress'),
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
            'translate_into_zh_tw_validation_progress' => Yii::t('model', 'Translate Into Zh Tw Validation Progress'),
            'approval_progress' => Yii::t('model', 'Approval Progress'),
            'proofing_progress' => Yii::t('model', 'Proofing Progress'),
            'allow_review' => Yii::t('model', 'Allow Review'),
            'allow_publish' => Yii::t('model', 'Allow Publish'),
            'title_en_approved' => Yii::t('model', 'Title En Approved'),
            'slug_en_approved' => Yii::t('model', 'Slug En Approved'),
            'short_title_en_approved' => Yii::t('model', 'Short Title En Approved'),
            'file_format_approved' => Yii::t('model', 'File Format Approved'),
            'license_approved' => Yii::t('model', 'License Approved'),
            'license_link_approved' => Yii::t('model', 'License Link Approved'),
            'waffle_publisher_id_approved' => Yii::t('model', 'Waffle Publisher Id Approved'),
            'json_import_media_id_approved' => Yii::t('model', 'Json Import Media Id Approved'),
            'title_approved' => Yii::t('model', 'Title Approved'),
            'title_en_proofed' => Yii::t('model', 'Title En Proofed'),
            'po_contents_approved' => Yii::t('model', 'Po Contents Approved'),
            'slug_en_proofed' => Yii::t('model', 'Slug En Proofed'),
            'short_title_en_proofed' => Yii::t('model', 'Short Title En Proofed'),
            'file_format_proofed' => Yii::t('model', 'File Format Proofed'),
            'license_proofed' => Yii::t('model', 'License Proofed'),
            'license_link_proofed' => Yii::t('model', 'License Link Proofed'),
            'waffle_publisher_id_proofed' => Yii::t('model', 'Waffle Publisher Id Proofed'),
            'json_import_media_id_proofed' => Yii::t('model', 'Json Import Media Id Proofed'),
            'title_proofed' => Yii::t('model', 'Title Proofed'),
            'po_contents_proofed' => Yii::t('model', 'Po Contents Proofed'),
            'translate_into_fa_validation_progress' => Yii::t('model', 'Translate Into Fa Validation Progress'),
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
        $criteria->compare('t.reviewable_validation_progress', $this->reviewable_validation_progress);
        $criteria->compare('t.publishable_validation_progress', $this->publishable_validation_progress);
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
        $criteria->compare('t.translate_into_zh_tw_validation_progress', $this->translate_into_zh_tw_validation_progress);
        $criteria->compare('t.approval_progress', $this->approval_progress);
        $criteria->compare('t.proofing_progress', $this->proofing_progress);
        $criteria->compare('t.allow_review', $this->allow_review);
        $criteria->compare('t.allow_publish', $this->allow_publish);
        $criteria->compare('t.title_en_approved', $this->title_en_approved);
        $criteria->compare('t.slug_en_approved', $this->slug_en_approved);
        $criteria->compare('t.short_title_en_approved', $this->short_title_en_approved);
        $criteria->compare('t.file_format_approved', $this->file_format_approved);
        $criteria->compare('t.license_approved', $this->license_approved);
        $criteria->compare('t.license_link_approved', $this->license_link_approved);
        $criteria->compare('t.waffle_publisher_id_approved', $this->waffle_publisher_id_approved);
        $criteria->compare('t.json_import_media_id_approved', $this->json_import_media_id_approved);
        $criteria->compare('t.title_approved', $this->title_approved);
        $criteria->compare('t.title_en_proofed', $this->title_en_proofed);
        $criteria->compare('t.po_contents_approved', $this->po_contents_approved);
        $criteria->compare('t.slug_en_proofed', $this->slug_en_proofed);
        $criteria->compare('t.short_title_en_proofed', $this->short_title_en_proofed);
        $criteria->compare('t.file_format_proofed', $this->file_format_proofed);
        $criteria->compare('t.license_proofed', $this->license_proofed);
        $criteria->compare('t.license_link_proofed', $this->license_link_proofed);
        $criteria->compare('t.waffle_publisher_id_proofed', $this->waffle_publisher_id_proofed);
        $criteria->compare('t.json_import_media_id_proofed', $this->json_import_media_id_proofed);
        $criteria->compare('t.title_proofed', $this->title_proofed);
        $criteria->compare('t.po_contents_proofed', $this->po_contents_proofed);
        $criteria->compare('t.translate_into_fa_validation_progress', $this->translate_into_fa_validation_progress);


        return $criteria;

    }

}
