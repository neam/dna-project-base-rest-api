<?php
$this->breadcrumbs[Yii::t('model', 'Spreadsheet Files')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Spreadsheet File'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
<?php echo CHtml::encode($model->version); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
<?php echo CHtml::encode($model->cloned_from_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_title')); ?>:</b>
<?php echo CHtml::encode($model->_title); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_id')); ?>:</b>
<?php echo CHtml::encode($model->data_source_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('original_media_id')); ?>:</b>
<?php echo CHtml::encode($model->original_media_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('generate_processed_media')); ?>:</b>
<?php echo CHtml::encode($model->generate_processed_media); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_en')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('owner_id')); ?>:</b>
<?php echo CHtml::encode($model->owner_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($model->node_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_es')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_de')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_zh')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_zh); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ar')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_ar); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_bg')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_bg); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ca')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_ca); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_cs')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_cs); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_da')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_da); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_en_gb')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_en_gb); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_en_us')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_en_us); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_el')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_el); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_fi')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_fi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_fil')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_fil); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_fr')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_fr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_hr')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_hr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_hu')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_hu); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_id')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_iw')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_iw); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_it')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_it); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ja')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_ja); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ko')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_ko); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_lt')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_lt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_lv')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_lv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_nl')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_nl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_no')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_no); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pl')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_pl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pt_br')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_pt_br); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pt_pt')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_pt_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ro')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_ro); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ru')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_ru); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sk')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_sk); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sl')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_sl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sr')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_sr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_th')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_th); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_tr')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_tr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_uk')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_uk); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_vi')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_vi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_zh_cn')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_zh_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_zh_tw')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_zh_tw); ?>
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
            'TbDetailView',
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
                                    'url' => $this->createUrl('/spreadsheetFile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'version',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'version',
                                    'url' => $this->createUrl('/spreadsheetFile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'cloned_from_id',
                        'value' => ($model->clonedFrom !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->clonedFrom->itemLabel,
                                    array('//spreadsheetFile/view', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//spreadsheetFile/update', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => '_title',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_title',
                                    'url' => $this->createUrl('/spreadsheetFile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'data_source_id',
                        'value' => ($model->dataSource !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSource->itemLabel,
                                    array('//dataSource/view', 'id' => $model->dataSource->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSource/update', 'id' => $model->dataSource->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'original_media_id',
                        'value' => ($model->originalMedia !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->originalMedia->itemLabel,
                                    array('//p3Media/view', 'id' => $model->originalMedia->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->originalMedia->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'generate_processed_media',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'generate_processed_media',
                                    'url' => $this->createUrl('/spreadsheetFile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'processed_media_id_en',
                        'value' => ($model->processedMediaIdEn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdEn->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdEn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdEn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'created',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'created',
                                    'url' => $this->createUrl('/spreadsheetFile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'modified',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'modified',
                                    'url' => $this->createUrl('/spreadsheetFile/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'owner_id',
                        'value' => ($model->owner !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->owner->itemLabel,
                                    array('//users/view', 'id' => $model->owner->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//users/update', 'id' => $model->owner->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'node_id',
                        'value' => ($model->node !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->node->itemLabel,
                                    array('//node/view', 'id' => $model->node->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//node/update', 'id' => $model->node->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_es',
                        'value' => ($model->processedMediaIdEs !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdEs->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdEs->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdEs->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_hi',
                        'value' => ($model->processedMediaIdHi !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdHi->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdHi->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdHi->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_pt',
                        'value' => ($model->processedMediaIdPt !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdPt->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdPt->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdPt->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_sv',
                        'value' => ($model->processedMediaIdSv !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdSv->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdSv->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdSv->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_de',
                        'value' => ($model->processedMediaIdDe !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdDe->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdDe->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdDe->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_zh',
                        'value' => ($model->processedMediaIdZh !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdZh->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdZh->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdZh->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_ar',
                        'value' => ($model->processedMediaIdAr !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdAr->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdAr->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdAr->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_bg',
                        'value' => ($model->processedMediaIdBg !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdBg->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdBg->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdBg->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_ca',
                        'value' => ($model->processedMediaIdCa !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdCa->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdCa->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdCa->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_cs',
                        'value' => ($model->processedMediaIdCs !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdCs->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdCs->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdCs->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_da',
                        'value' => ($model->processedMediaIdDa !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdDa->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdDa->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdDa->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_en_gb',
                        'value' => ($model->processedMediaIdEnGb !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdEnGb->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdEnGb->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdEnGb->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_en_us',
                        'value' => ($model->processedMediaIdEnUs !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdEnUs->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdEnUs->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdEnUs->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_el',
                        'value' => ($model->processedMediaIdEl !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdEl->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdEl->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdEl->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_fi',
                        'value' => ($model->processedMediaIdFi !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdFi->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdFi->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdFi->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_fil',
                        'value' => ($model->processedMediaIdFil !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdFil->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdFil->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdFil->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_fr',
                        'value' => ($model->processedMediaIdFr !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdFr->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdFr->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdFr->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_hr',
                        'value' => ($model->processedMediaIdHr !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdHr->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdHr->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdHr->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_hu',
                        'value' => ($model->processedMediaIdHu !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdHu->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdHu->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdHu->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_id',
                        'value' => ($model->processedMediaId !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaId->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaId->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaId->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_iw',
                        'value' => ($model->processedMediaIdIw !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdIw->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdIw->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdIw->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_it',
                        'value' => ($model->processedMediaIdIt !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdIt->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdIt->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdIt->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_ja',
                        'value' => ($model->processedMediaIdJa !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdJa->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdJa->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdJa->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_ko',
                        'value' => ($model->processedMediaIdKo !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdKo->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdKo->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdKo->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_lt',
                        'value' => ($model->processedMediaIdLt !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdLt->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdLt->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdLt->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_lv',
                        'value' => ($model->processedMediaIdLv !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdLv->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdLv->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdLv->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_nl',
                        'value' => ($model->processedMediaIdNl !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdNl->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdNl->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdNl->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_no',
                        'value' => ($model->processedMediaIdNo !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdNo->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdNo->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdNo->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_pl',
                        'value' => ($model->processedMediaIdPl !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdPl->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdPl->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdPl->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_pt_br',
                        'value' => ($model->processedMediaIdPtBr !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdPtBr->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdPtBr->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdPtBr->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_pt_pt',
                        'value' => ($model->processedMediaIdPtPt !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdPtPt->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdPtPt->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdPtPt->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_ro',
                        'value' => ($model->processedMediaIdRo !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdRo->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdRo->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdRo->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_ru',
                        'value' => ($model->processedMediaIdRu !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdRu->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdRu->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdRu->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_sk',
                        'value' => ($model->processedMediaIdSk !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdSk->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdSk->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdSk->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_sl',
                        'value' => ($model->processedMediaIdSl !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdSl->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdSl->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdSl->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_sr',
                        'value' => ($model->processedMediaIdSr !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdSr->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdSr->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdSr->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_th',
                        'value' => ($model->processedMediaIdTh !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdTh->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdTh->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdTh->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_tr',
                        'value' => ($model->processedMediaIdTr !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdTr->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdTr->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdTr->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_uk',
                        'value' => ($model->processedMediaIdUk !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdUk->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdUk->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdUk->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_vi',
                        'value' => ($model->processedMediaIdVi !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdVi->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdVi->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdVi->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_zh_cn',
                        'value' => ($model->processedMediaIdZhCn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdZhCn->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdZhCn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdZhCn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'processed_media_id_zh_tw',
                        'value' => ($model->processedMediaIdZhTw !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdZhTw->itemLabel,
                                    array('//p3Media/view', 'id' => $model->processedMediaIdZhTw->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->processedMediaIdZhTw->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>