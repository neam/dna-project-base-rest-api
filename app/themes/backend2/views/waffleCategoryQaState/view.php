<?php
$this->breadcrumbs[Yii::t('model', 'Waffle Category Qa States')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Waffle Category Qa State'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($model->status); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('draft_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->draft_validation_progress); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('preview_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->preview_validation_progress); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('public_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->public_validation_progress); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_en_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_en_validation_progress); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_ar_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_ar_validation_progress); ?>
<br/>

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

<b><?php echo CHtml::encode($model->getAttributeLabel('short_name_approved')); ?>:</b>
<?php echo CHtml::encode($model->short_name_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('ref_approved')); ?>:</b>
<?php echo CHtml::encode($model->ref_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('name_approved')); ?>:</b>
<?php echo CHtml::encode($model->name_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_proofed')); ?>:</b>
<?php echo CHtml::encode($model->title_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('short_name_proofed')); ?>:</b>
<?php echo CHtml::encode($model->short_name_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('ref_proofed')); ?>:</b>
<?php echo CHtml::encode($model->ref_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('name_proofed')); ?>:</b>
<?php echo CHtml::encode($model->name_proofed); ?>
<br />

    */
?>

<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('model', 'Data') ?>
            <small>
                <?php echo $model->itemLabel ?>            </small>
        </h2>

        <?php
        $this->widget(
            '\TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'id',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'id',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'status',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'status',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'draft_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'draft_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'preview_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'preview_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'public_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'public_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_en_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_en_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_ar_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_ar_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_bg_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_bg_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_ca_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_ca_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_cs_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_cs_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_da_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_da_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_de_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_de_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_en_gb_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_en_gb_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_en_us_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_en_us_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_el_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_el_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_es_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_es_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_fi_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_fi_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_fil_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_fil_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_fr_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_fr_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_hi_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_hi_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_hr_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_hr_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_hu_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_hu_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_id_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_id_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_iw_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_iw_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_it_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_it_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_ja_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_ja_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_ko_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_ko_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_lt_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_lt_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_lv_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_lv_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_nl_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_nl_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_no_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_no_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_pl_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_pl_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_pt_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_pt_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_pt_br_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_pt_br_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_pt_pt_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_pt_pt_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_ro_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_ro_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_ru_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_ru_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_sk_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_sk_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_sl_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_sl_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_sr_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_sr_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_sv_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_sv_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_th_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_th_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_tr_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_tr_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_uk_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_uk_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_vi_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_vi_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_zh_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_zh_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_zh_cn_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_zh_cn_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translate_into_zh_tw_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translate_into_zh_tw_validation_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'approval_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'approval_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'proofing_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'proofing_progress',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'previewing_welcome',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'previewing_welcome',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'candidate_for_public_status',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'candidate_for_public_status',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'title_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'title_approved',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'short_name_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'short_name_approved',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'ref_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'ref_approved',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'name_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'name_approved',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'title_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'title_proofed',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'short_name_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'short_name_proofed',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'ref_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'ref_proofed',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'name_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'name_proofed',
                                    'url' => $this->createUrl('/waffleCategoryQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>