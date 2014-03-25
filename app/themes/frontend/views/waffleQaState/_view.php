<div class="view well well-white">

    <div class="admin-container hide">
        <?php echo CHtml::link('<i class="glyphicon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Waffle Qa State'))), array('waffleQaState/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('waffleQaState/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('draft_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->draft_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('reviewable_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->reviewable_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('publishable_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->publishable_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_en_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_en_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_ar_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_ar_validation_progress); ?>
    <br/>

    <?php /*
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_zh_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_zh_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_zh_cn_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_zh_cn_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translate_into_zh_tw_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translate_into_zh_tw_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('approval_progress')); ?>:</b>
    <?php echo CHtml::encode($data->approval_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('proofing_progress')); ?>:</b>
    <?php echo CHtml::encode($data->proofing_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('allow_review')); ?>:</b>
    <?php echo CHtml::encode($data->allow_review); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('allow_publish')); ?>:</b>
    <?php echo CHtml::encode($data->allow_publish); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_en_approved')); ?>:</b>
    <?php echo CHtml::encode($data->title_en_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_en_approved')); ?>:</b>
    <?php echo CHtml::encode($data->slug_en_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('short_title_en_approved')); ?>:</b>
    <?php echo CHtml::encode($data->short_title_en_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('file_format_approved')); ?>:</b>
    <?php echo CHtml::encode($data->file_format_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('license_approved')); ?>:</b>
    <?php echo CHtml::encode($data->license_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('license_link_approved')); ?>:</b>
    <?php echo CHtml::encode($data->license_link_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('waffle_publisher_id_approved')); ?>:</b>
    <?php echo CHtml::encode($data->waffle_publisher_id_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('json_import_media_id_approved')); ?>:</b>
    <?php echo CHtml::encode($data->json_import_media_id_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_approved')); ?>:</b>
    <?php echo CHtml::encode($data->title_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_en_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->title_en_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_contents_approved')); ?>:</b>
    <?php echo CHtml::encode($data->po_contents_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_en_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->slug_en_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('short_title_en_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->short_title_en_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('file_format_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->file_format_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('license_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->license_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('license_link_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->license_link_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('waffle_publisher_id_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->waffle_publisher_id_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('json_import_media_id_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->json_import_media_id_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->title_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_contents_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->po_contents_proofed); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('WaffleQaState.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Waffle Qa State'))), array('waffleQaState/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Waffle Qa State'))), array('waffleQaState/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
