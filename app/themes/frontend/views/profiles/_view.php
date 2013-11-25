<div class="view well well-white">

    <div class="admin-container hide">
        <?php echo CHtml::link('<i class="icon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Profiles'))), array('profiles/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->user_id), array('profiles/view', 'user_id' => $data->user_id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
    <?php echo CHtml::encode($data->first_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
    <?php echo CHtml::encode($data->last_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('public_profile')); ?>:</b>
    <?php echo CHtml::encode($data->public_profile); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('picture_media_id')); ?>:</b>
    <?php echo CHtml::encode($data->picture_media_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
    <?php echo CHtml::encode($data->website); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('others_may_contact_me')); ?>:</b>
    <?php echo CHtml::encode($data->others_may_contact_me); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('about')); ?>:</b>
    <?php echo CHtml::encode($data->about); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('lives_in')); ?>:</b>
    <?php echo CHtml::encode($data->lives_in); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_en')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_en); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_es')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_hi')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_pt')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_sv')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_de')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_de); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_zh')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_zh); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_ar')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_ar); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_bg')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_bg); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_ca')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_ca); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_cs')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_cs); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_da')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_da); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_en_gb')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_en_gb); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_en_us')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_en_us); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_el')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_el); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_fi')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_fi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_fil')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_fil); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_fr')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_fr); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_hr')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_hr); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_hu')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_hu); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_id')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_iw')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_iw); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_it')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_it); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_ja')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_ja); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_ko')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_ko); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_lt')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_lt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_lv')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_lv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_nl')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_nl); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_no')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_no); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_pl')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_pl); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_pt_br')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_pt_br); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_pt_pt')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_pt_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_ro')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_ro); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_ru')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_ru); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_sk')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_sk); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_sl')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_sl); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_sr')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_sr); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_th')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_th); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_tr')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_tr); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_uk')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_uk); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_vi')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_vi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_zh_cn')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_zh_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_zh_tw')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_zh_tw); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('Profiles.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Profiles'))), array('profiles/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Profiles'))), array('profiles/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
