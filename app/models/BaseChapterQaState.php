<?php

/**
 * This is the model base class for the table "chapter_qa_state".
 *
 * Columns in table "chapter_qa_state" available as properties of the model:
 * @property string $id
 * @property string $status
 * @property integer $translations_draft_validation_progress
 * @property integer $translations_preview_validation_progress
 * @property integer $translations_public_validation_progress
 * @property integer $translations_approval_progress
 * @property integer $translations_proofing_progress
 * @property integer $slug_approved
 * @property integer $thumbnail_approved
 * @property integer $about_approved
 * @property integer $video_approved
 * @property integer $teachers_guide_approved
 * @property integer $credits_approved
 * @property integer $slug_proofed
 * @property integer $thumbnail_proofed
 * @property integer $about_proofed
 * @property integer $video_proofed
 * @property integer $teachers_guide_proofed
 * @property integer $draft_validation_progress
 * @property integer $credits_proofed
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
 * @property integer $approval_progress
 * @property integer $translate_into_zh_validation_progress
 * @property integer $proofing_progress
 * @property integer $translate_into_zh_cn_validation_progress
 * @property integer $previewing_welcome
 * @property integer $candidate_for_public_status
 * @property integer $translate_into_zh_tw_validation_progress
 * @property integer $title_en_approved
 * @property integer $slug_en_approved
 * @property integer $exercises_approved
 * @property integer $about_en_approved
 * @property integer $thumbnail_media_id_approved
 * @property integer $snapshots_approved
 * @property integer $videos_approved
 * @property integer $teachers_guide_en_approved
 * @property integer $related_approved
 * @property integer $title_approved
 * @property integer $title_en_proofed
 * @property integer $slug_en_proofed
 * @property integer $about_en_proofed
 * @property integer $thumbnail_media_id_proofed
 * @property integer $teachers_guide_en_proofed
 * @property integer $exercises_proofed
 * @property integer $videos_proofed
 * @property integer $snapshots_proofed
 * @property integer $related_proofed
 * @property integer $title_proofed
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
                array('status, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, slug_approved, thumbnail_approved, about_approved, video_approved, teachers_guide_approved, credits_approved, slug_proofed, thumbnail_proofed, about_proofed, video_proofed, teachers_guide_proofed, draft_validation_progress, credits_proofed, preview_validation_progress, draft_saved, public_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, approval_progress, translate_into_zh_validation_progress, proofing_progress, translate_into_zh_cn_validation_progress, previewing_welcome, candidate_for_public_status, translate_into_zh_tw_validation_progress, title_en_approved, slug_en_approved, exercises_approved, about_en_approved, thumbnail_media_id_approved, snapshots_approved, videos_approved, teachers_guide_en_approved, related_approved, title_approved, title_en_proofed, slug_en_proofed, about_en_proofed, thumbnail_media_id_proofed, teachers_guide_en_proofed, exercises_proofed, videos_proofed, snapshots_proofed, related_proofed, title_proofed', 'default', 'setOnEmpty' => true, 'value' => null),
                array('translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, slug_approved, thumbnail_approved, about_approved, video_approved, teachers_guide_approved, credits_approved, slug_proofed, thumbnail_proofed, about_proofed, video_proofed, teachers_guide_proofed, draft_validation_progress, credits_proofed, preview_validation_progress, draft_saved, public_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, approval_progress, translate_into_zh_validation_progress, proofing_progress, translate_into_zh_cn_validation_progress, previewing_welcome, candidate_for_public_status, translate_into_zh_tw_validation_progress, title_en_approved, slug_en_approved, exercises_approved, about_en_approved, thumbnail_media_id_approved, snapshots_approved, videos_approved, teachers_guide_en_approved, related_approved, title_approved, title_en_proofed, slug_en_proofed, about_en_proofed, thumbnail_media_id_proofed, teachers_guide_en_proofed, exercises_proofed, videos_proofed, snapshots_proofed, related_proofed, title_proofed', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, slug_approved, thumbnail_approved, about_approved, video_approved, teachers_guide_approved, credits_approved, slug_proofed, thumbnail_proofed, about_proofed, video_proofed, teachers_guide_proofed, draft_validation_progress, credits_proofed, preview_validation_progress, draft_saved, public_validation_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, approval_progress, translate_into_zh_validation_progress, proofing_progress, translate_into_zh_cn_validation_progress, previewing_welcome, candidate_for_public_status, translate_into_zh_tw_validation_progress, title_en_approved, slug_en_approved, exercises_approved, about_en_approved, thumbnail_media_id_approved, snapshots_approved, videos_approved, teachers_guide_en_approved, related_approved, title_approved, title_en_proofed, slug_en_proofed, about_en_proofed, thumbnail_media_id_proofed, teachers_guide_en_proofed, exercises_proofed, videos_proofed, snapshots_proofed, related_proofed, title_proofed', 'safe', 'on' => 'search'),
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
                'chapters' => array(self::HAS_MANY, 'Chapter', 'chapter_qa_state_id'),
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
            'thumbnail_approved' => Yii::t('model', 'Thumbnail Approved'),
            'about_approved' => Yii::t('model', 'About Approved'),
            'video_approved' => Yii::t('model', 'Video Approved'),
            'teachers_guide_approved' => Yii::t('model', 'Teachers Guide Approved'),
            'credits_approved' => Yii::t('model', 'Credits Approved'),
            'slug_proofed' => Yii::t('model', 'Slug Proofed'),
            'thumbnail_proofed' => Yii::t('model', 'Thumbnail Proofed'),
            'about_proofed' => Yii::t('model', 'About Proofed'),
            'video_proofed' => Yii::t('model', 'Video Proofed'),
            'teachers_guide_proofed' => Yii::t('model', 'Teachers Guide Proofed'),
            'draft_validation_progress' => Yii::t('model', 'Draft Validation Progress'),
            'credits_proofed' => Yii::t('model', 'Credits Proofed'),
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
            'approval_progress' => Yii::t('model', 'Approval Progress'),
            'translate_into_zh_validation_progress' => Yii::t('model', 'Translate Into Zh Validation Progress'),
            'proofing_progress' => Yii::t('model', 'Proofing Progress'),
            'translate_into_zh_cn_validation_progress' => Yii::t('model', 'Translate Into Zh Cn Validation Progress'),
            'previewing_welcome' => Yii::t('model', 'Previewing Welcome'),
            'candidate_for_public_status' => Yii::t('model', 'Candidate For Public Status'),
            'translate_into_zh_tw_validation_progress' => Yii::t('model', 'Translate Into Zh Tw Validation Progress'),
            'title_en_approved' => Yii::t('model', 'Title En Approved'),
            'slug_en_approved' => Yii::t('model', 'Slug En Approved'),
            'exercises_approved' => Yii::t('model', 'Exercises Approved'),
            'about_en_approved' => Yii::t('model', 'About En Approved'),
            'thumbnail_media_id_approved' => Yii::t('model', 'Thumbnail Media Id Approved'),
            'snapshots_approved' => Yii::t('model', 'Snapshots Approved'),
            'videos_approved' => Yii::t('model', 'Videos Approved'),
            'teachers_guide_en_approved' => Yii::t('model', 'Teachers Guide En Approved'),
            'related_approved' => Yii::t('model', 'Related Approved'),
            'title_approved' => Yii::t('model', 'Title Approved'),
            'title_en_proofed' => Yii::t('model', 'Title En Proofed'),
            'slug_en_proofed' => Yii::t('model', 'Slug En Proofed'),
            'about_en_proofed' => Yii::t('model', 'About En Proofed'),
            'thumbnail_media_id_proofed' => Yii::t('model', 'Thumbnail Media Id Proofed'),
            'teachers_guide_en_proofed' => Yii::t('model', 'Teachers Guide En Proofed'),
            'exercises_proofed' => Yii::t('model', 'Exercises Proofed'),
            'videos_proofed' => Yii::t('model', 'Videos Proofed'),
            'snapshots_proofed' => Yii::t('model', 'Snapshots Proofed'),
            'related_proofed' => Yii::t('model', 'Related Proofed'),
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
        $criteria->compare('t.translations_draft_validation_progress', $this->translations_draft_validation_progress);
        $criteria->compare('t.translations_preview_validation_progress', $this->translations_preview_validation_progress);
        $criteria->compare('t.translations_public_validation_progress', $this->translations_public_validation_progress);
        $criteria->compare('t.translations_approval_progress', $this->translations_approval_progress);
        $criteria->compare('t.translations_proofing_progress', $this->translations_proofing_progress);
        $criteria->compare('t.slug_approved', $this->slug_approved);
        $criteria->compare('t.thumbnail_approved', $this->thumbnail_approved);
        $criteria->compare('t.about_approved', $this->about_approved);
        $criteria->compare('t.video_approved', $this->video_approved);
        $criteria->compare('t.teachers_guide_approved', $this->teachers_guide_approved);
        $criteria->compare('t.credits_approved', $this->credits_approved);
        $criteria->compare('t.slug_proofed', $this->slug_proofed);
        $criteria->compare('t.thumbnail_proofed', $this->thumbnail_proofed);
        $criteria->compare('t.about_proofed', $this->about_proofed);
        $criteria->compare('t.video_proofed', $this->video_proofed);
        $criteria->compare('t.teachers_guide_proofed', $this->teachers_guide_proofed);
        $criteria->compare('t.draft_validation_progress', $this->draft_validation_progress);
        $criteria->compare('t.credits_proofed', $this->credits_proofed);
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
        $criteria->compare('t.approval_progress', $this->approval_progress);
        $criteria->compare('t.translate_into_zh_validation_progress', $this->translate_into_zh_validation_progress);
        $criteria->compare('t.proofing_progress', $this->proofing_progress);
        $criteria->compare('t.translate_into_zh_cn_validation_progress', $this->translate_into_zh_cn_validation_progress);
        $criteria->compare('t.previewing_welcome', $this->previewing_welcome);
        $criteria->compare('t.candidate_for_public_status', $this->candidate_for_public_status);
        $criteria->compare('t.translate_into_zh_tw_validation_progress', $this->translate_into_zh_tw_validation_progress);
        $criteria->compare('t.title_en_approved', $this->title_en_approved);
        $criteria->compare('t.slug_en_approved', $this->slug_en_approved);
        $criteria->compare('t.exercises_approved', $this->exercises_approved);
        $criteria->compare('t.about_en_approved', $this->about_en_approved);
        $criteria->compare('t.thumbnail_media_id_approved', $this->thumbnail_media_id_approved);
        $criteria->compare('t.snapshots_approved', $this->snapshots_approved);
        $criteria->compare('t.videos_approved', $this->videos_approved);
        $criteria->compare('t.teachers_guide_en_approved', $this->teachers_guide_en_approved);
        $criteria->compare('t.related_approved', $this->related_approved);
        $criteria->compare('t.title_approved', $this->title_approved);
        $criteria->compare('t.title_en_proofed', $this->title_en_proofed);
        $criteria->compare('t.slug_en_proofed', $this->slug_en_proofed);
        $criteria->compare('t.about_en_proofed', $this->about_en_proofed);
        $criteria->compare('t.thumbnail_media_id_proofed', $this->thumbnail_media_id_proofed);
        $criteria->compare('t.teachers_guide_en_proofed', $this->teachers_guide_en_proofed);
        $criteria->compare('t.exercises_proofed', $this->exercises_proofed);
        $criteria->compare('t.videos_proofed', $this->videos_proofed);
        $criteria->compare('t.snapshots_proofed', $this->snapshots_proofed);
        $criteria->compare('t.related_proofed', $this->related_proofed);
        $criteria->compare('t.title_proofed', $this->title_proofed);


        return $criteria;

    }

}
