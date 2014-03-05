<div class="wide form">

    <?php
    $form = $this->beginWidget('\TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->textField($model, 'status', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_draft_validation_progress'); ?>
        <?php echo $form->textField($model, 'translations_draft_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_preview_validation_progress'); ?>
        <?php echo $form->textField($model, 'translations_preview_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_public_validation_progress'); ?>
        <?php echo $form->textField($model, 'translations_public_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_approval_progress'); ?>
        <?php echo $form->textField($model, 'translations_approval_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_proofing_progress'); ?>
        <?php echo $form->textField($model, 'translations_proofing_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_approved'); ?>
        <?php echo $form->checkBox($model, 'slug_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'thumbnail_approved'); ?>
        <?php echo $form->checkBox($model, 'thumbnail_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_approved'); ?>
        <?php echo $form->checkBox($model, 'about_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'video_approved'); ?>
        <?php echo $form->checkBox($model, 'video_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'teachers_guide_approved'); ?>
        <?php echo $form->checkBox($model, 'teachers_guide_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'credits_approved'); ?>
        <?php echo $form->checkBox($model, 'credits_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_proofed'); ?>
        <?php echo $form->checkBox($model, 'slug_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'thumbnail_proofed'); ?>
        <?php echo $form->checkBox($model, 'thumbnail_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_proofed'); ?>
        <?php echo $form->checkBox($model, 'about_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'video_proofed'); ?>
        <?php echo $form->checkBox($model, 'video_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'teachers_guide_proofed'); ?>
        <?php echo $form->checkBox($model, 'teachers_guide_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'draft_validation_progress'); ?>
        <?php echo $form->textField($model, 'draft_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'credits_proofed'); ?>
        <?php echo $form->checkBox($model, 'credits_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'preview_validation_progress'); ?>
        <?php echo $form->textField($model, 'preview_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'draft_saved'); ?>
        <?php echo $form->checkBox($model, 'draft_saved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'public_validation_progress'); ?>
        <?php echo $form->textField($model, 'public_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_en_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_en_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_ar_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_ar_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_bg_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_bg_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_ca_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_ca_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_cs_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_cs_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_da_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_da_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_de_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_de_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_en_gb_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_en_gb_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_en_us_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_en_us_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_el_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_el_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_es_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_es_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_fi_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_fi_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_fil_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_fil_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_fr_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_fr_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_hi_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_hi_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_hr_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_hr_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_hu_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_hu_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_id_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_id_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_iw_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_iw_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_it_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_it_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_ja_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_ja_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_ko_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_ko_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_lt_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_lt_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_lv_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_lv_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_nl_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_nl_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_no_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_no_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_pl_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_pl_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_pt_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_pt_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_pt_br_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_pt_br_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_pt_pt_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_pt_pt_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_ro_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_ro_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_ru_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_ru_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_sk_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_sk_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_sl_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_sl_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_sr_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_sr_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_sv_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_sv_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_th_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_th_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_tr_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_tr_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_uk_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_uk_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_vi_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_vi_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'approval_progress'); ?>
        <?php echo $form->textField($model, 'approval_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_zh_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_zh_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'proofing_progress'); ?>
        <?php echo $form->textField($model, 'proofing_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_zh_cn_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_zh_cn_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'previewing_welcome'); ?>
        <?php echo $form->checkBox($model, 'previewing_welcome'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'candidate_for_public_status'); ?>
        <?php echo $form->checkBox($model, 'candidate_for_public_status'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translate_into_zh_tw_validation_progress'); ?>
        <?php echo $form->textField($model, 'translate_into_zh_tw_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_en_approved'); ?>
        <?php echo $form->checkBox($model, 'title_en_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_en_approved'); ?>
        <?php echo $form->checkBox($model, 'slug_en_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exercises_approved'); ?>
        <?php echo $form->checkBox($model, 'exercises_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_en_approved'); ?>
        <?php echo $form->checkBox($model, 'about_en_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'thumbnail_media_id_approved'); ?>
        <?php echo $form->checkBox($model, 'thumbnail_media_id_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'snapshots_approved'); ?>
        <?php echo $form->checkBox($model, 'snapshots_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'videos_approved'); ?>
        <?php echo $form->checkBox($model, 'videos_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'teachers_guide_en_approved'); ?>
        <?php echo $form->checkBox($model, 'teachers_guide_en_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'related_approved'); ?>
        <?php echo $form->checkBox($model, 'related_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_approved'); ?>
        <?php echo $form->checkBox($model, 'title_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_en_proofed'); ?>
        <?php echo $form->checkBox($model, 'title_en_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_en_proofed'); ?>
        <?php echo $form->checkBox($model, 'slug_en_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_en_proofed'); ?>
        <?php echo $form->checkBox($model, 'about_en_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'thumbnail_media_id_proofed'); ?>
        <?php echo $form->checkBox($model, 'thumbnail_media_id_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'teachers_guide_en_proofed'); ?>
        <?php echo $form->checkBox($model, 'teachers_guide_en_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exercises_proofed'); ?>
        <?php echo $form->checkBox($model, 'exercises_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'videos_proofed'); ?>
        <?php echo $form->checkBox($model, 'videos_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'snapshots_proofed'); ?>
        <?php echo $form->checkBox($model, 'snapshots_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'related_proofed'); ?>
        <?php echo $form->checkBox($model, 'related_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_proofed'); ?>
        <?php echo $form->checkBox($model, 'title_proofed'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
