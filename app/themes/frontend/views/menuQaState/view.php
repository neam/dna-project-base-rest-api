<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model', 'Menu Qa State'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('MenuQaState.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($model->status); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('draft_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->draft_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('preview_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->preview_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('public_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->public_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_en_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_en_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_ar_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_ar_validation_progress); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_bg_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_bg_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_ca_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_ca_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_cs_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_cs_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_da_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_da_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_de_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_de_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_en_gb_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_en_gb_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_en_us_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_en_us_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_el_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_el_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_es_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_es_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_fi_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_fi_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_fil_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_fil_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_fr_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_fr_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_hi_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_hi_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_hr_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_hr_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_hu_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_hu_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_id_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_id_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_iw_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_iw_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_it_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_it_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_ja_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_ja_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_ko_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_ko_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_lt_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_lt_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_lv_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_lv_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_nl_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_nl_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_no_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_no_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_pl_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_pl_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_pt_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_pt_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_pt_br_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_pt_br_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_pt_pt_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_pt_pt_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_ro_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_ro_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_ru_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_ru_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_sk_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_sk_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_sl_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_sl_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_sr_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_sr_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_sv_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_sv_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_th_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_th_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_tr_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_tr_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_uk_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_uk_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_vi_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_vi_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_zh_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_zh_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_zh_cn_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_zh_cn_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_zh_tw_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_zh_tw_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('approval_progress')); ?>:</b>
<?php echo CHtml::encode($model->approval_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('proofing_progress')); ?>:</b>
<?php echo CHtml::encode($model->proofing_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('previewing_welcome')); ?>:</b>
<?php echo CHtml::encode($model->previewing_welcome); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('candidate_for_public_status')); ?>:</b>
<?php echo CHtml::encode($model->candidate_for_public_status); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_approved')); ?>:</b>
<?php echo CHtml::encode($model->title_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_approved')); ?>:</b>
<?php echo CHtml::encode($model->slug_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('pages_approved')); ?>:</b>
<?php echo CHtml::encode($model->pages_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_proofed')); ?>:</b>
<?php echo CHtml::encode($model->title_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_proofed')); ?>:</b>
<?php echo CHtml::encode($model->slug_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('pages_proofed')); ?>:</b>
<?php echo CHtml::encode($model->pages_proofed); ?>
<br />

    */
?>
-->
