<?php
$this->breadcrumbs[Yii::t('model', 'Data Article Qa States')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Data Article Qa State'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('reviewable_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->reviewable_validation_progress); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('publishable_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->publishable_validation_progress); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('approval_progress')); ?>:</b>
<?php echo CHtml::encode($model->approval_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('proofing_progress')); ?>:</b>
<?php echo CHtml::encode($model->proofing_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translate_into_zh_tw_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translate_into_zh_tw_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('allow_review')); ?>:</b>
<?php echo CHtml::encode($model->allow_review); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('allow_publish')); ?>:</b>
<?php echo CHtml::encode($model->allow_publish); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en_approved')); ?>:</b>
<?php echo CHtml::encode($model->slug_en_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_en_approved')); ?>:</b>
<?php echo CHtml::encode($model->title_en_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_en_approved')); ?>:</b>
<?php echo CHtml::encode($model->about_en_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en_proofed')); ?>:</b>
<?php echo CHtml::encode($model->slug_en_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_en_proofed')); ?>:</b>
<?php echo CHtml::encode($model->title_en_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_en_proofed')); ?>:</b>
<?php echo CHtml::encode($model->about_en_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_approved')); ?>:</b>
<?php echo CHtml::encode($model->title_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_proofed')); ?>:</b>
<?php echo CHtml::encode($model->title_proofed); ?>
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'reviewable_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'reviewable_validation_progress',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'publishable_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'publishable_validation_progress',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'allow_review',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'allow_review',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'allow_publish',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'allow_publish',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_en_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_en_approved',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'title_en_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'title_en_approved',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'about_en_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'about_en_approved',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_en_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_en_proofed',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'title_en_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'title_en_proofed',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'about_en_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'about_en_proofed',
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/dataArticleQaState/editableSaver'),
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