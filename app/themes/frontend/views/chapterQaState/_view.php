<div class="view well well-white">

    <div class="admin-container hide">
        <?php echo CHtml::link('<i class="glyphicon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Chapter Qa State'))), array('chapterQaState/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('chapterQaState/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_draft_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_draft_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_preview_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_preview_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_public_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_public_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_approval_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_approval_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_proofing_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_proofing_progress); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_approved')); ?>:</b>
    <?php echo CHtml::encode($data->slug_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_approved')); ?>:</b>
    <?php echo CHtml::encode($data->thumbnail_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_approved')); ?>:</b>
    <?php echo CHtml::encode($data->about_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('video_approved')); ?>:</b>
    <?php echo CHtml::encode($data->video_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_approved')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('credits_approved')); ?>:</b>
    <?php echo CHtml::encode($data->credits_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->slug_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->thumbnail_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->about_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('video_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->video_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('draft_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->draft_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('credits_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->credits_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('preview_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->preview_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('draft_saved')); ?>:</b>
    <?php echo CHtml::encode($data->draft_saved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('public_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->public_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_en_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_en_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_ar_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_ar_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_bg_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_bg_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_ca_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_ca_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_cs_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_cs_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_da_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_da_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_de_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_de_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_en_gb_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_en_gb_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_en_us_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_en_us_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_el_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_el_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_es_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_es_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_fi_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_fi_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_fil_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_fil_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_fr_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_fr_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_hi_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_hi_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_hr_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_hr_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_hu_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_hu_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_id_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_id_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_iw_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_iw_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_it_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_it_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_ja_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_ja_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_ko_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_ko_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_lt_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_lt_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_lv_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_lv_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_nl_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_nl_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_no_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_no_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_pl_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_pl_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_pt_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_pt_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_pt_br_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_pt_br_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_pt_pt_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_pt_pt_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_ro_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_ro_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_ru_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_ru_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_sk_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_sk_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_sl_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_sl_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_sr_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_sr_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_sv_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_sv_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_th_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_th_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_tr_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_tr_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_uk_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_uk_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_vi_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_vi_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('approval_progress')); ?>:</b>
    <?php echo CHtml::encode($data->approval_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_zh_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_zh_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('proofing_progress')); ?>:</b>
    <?php echo CHtml::encode($data->proofing_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_zh_cn_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_zh_cn_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('previewing_welcome')); ?>:</b>
    <?php echo CHtml::encode($data->previewing_welcome); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('candidate_for_public_status')); ?>:</b>
    <?php echo CHtml::encode($data->candidate_for_public_status); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_zh_tw_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_zh_tw_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_en_approved')); ?>:</b>
    <?php echo CHtml::encode($data->title_en_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_en_approved')); ?>:</b>
    <?php echo CHtml::encode($data->slug_en_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('exercises_approved')); ?>:</b>
    <?php echo CHtml::encode($data->exercises_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_en_approved')); ?>:</b>
    <?php echo CHtml::encode($data->about_en_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_media_id_approved')); ?>:</b>
    <?php echo CHtml::encode($data->thumbnail_media_id_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('snapshots_approved')); ?>:</b>
    <?php echo CHtml::encode($data->snapshots_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('videos_approved')); ?>:</b>
    <?php echo CHtml::encode($data->videos_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_en_approved')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_en_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('related_approved')); ?>:</b>
    <?php echo CHtml::encode($data->related_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_approved')); ?>:</b>
    <?php echo CHtml::encode($data->title_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_en_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->title_en_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_en_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->slug_en_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('about_en_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->about_en_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_media_id_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->thumbnail_media_id_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_en_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->teachers_guide_en_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('exercises_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->exercises_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('videos_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->videos_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('snapshots_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->snapshots_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('related_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->related_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->title_proofed); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('ChapterQaState.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Chapter Qa State'))), array('chapterQaState/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Chapter Qa State'))), array('chapterQaState/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
