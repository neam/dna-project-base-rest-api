<?php
$this->breadcrumbs[Yii::t('model', 'Exercises')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>

<h1>

    <?php echo Yii::t('model', 'Exercise'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en')); ?>:</b>
<?php echo CHtml::encode($model->slug_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_question')); ?>:</b>
<?php echo CHtml::encode($model->_question); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_description')); ?>:</b>
<?php echo CHtml::encode($model->_description); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('thumbnail_media_id')); ?>:</b>
<?php echo CHtml::encode($model->thumbnail_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slideshow_file_id')); ?>:</b>
<?php echo CHtml::encode($model->slideshow_file_id); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_es')); ?>:</b>
<?php echo CHtml::encode($model->slug_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_hi')); ?>:</b>
<?php echo CHtml::encode($model->slug_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_pt')); ?>:</b>
<?php echo CHtml::encode($model->slug_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_sv')); ?>:</b>
<?php echo CHtml::encode($model->slug_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_de')); ?>:</b>
<?php echo CHtml::encode($model->slug_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_zh')); ?>:</b>
<?php echo CHtml::encode($model->slug_zh); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ar')); ?>:</b>
<?php echo CHtml::encode($model->slug_ar); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_bg')); ?>:</b>
<?php echo CHtml::encode($model->slug_bg); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ca')); ?>:</b>
<?php echo CHtml::encode($model->slug_ca); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_cs')); ?>:</b>
<?php echo CHtml::encode($model->slug_cs); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_da')); ?>:</b>
<?php echo CHtml::encode($model->slug_da); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en_gb')); ?>:</b>
<?php echo CHtml::encode($model->slug_en_gb); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en_us')); ?>:</b>
<?php echo CHtml::encode($model->slug_en_us); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_el')); ?>:</b>
<?php echo CHtml::encode($model->slug_el); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_fi')); ?>:</b>
<?php echo CHtml::encode($model->slug_fi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_fil')); ?>:</b>
<?php echo CHtml::encode($model->slug_fil); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_fr')); ?>:</b>
<?php echo CHtml::encode($model->slug_fr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_hr')); ?>:</b>
<?php echo CHtml::encode($model->slug_hr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_hu')); ?>:</b>
<?php echo CHtml::encode($model->slug_hu); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_id')); ?>:</b>
<?php echo CHtml::encode($model->slug_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_iw')); ?>:</b>
<?php echo CHtml::encode($model->slug_iw); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_it')); ?>:</b>
<?php echo CHtml::encode($model->slug_it); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ja')); ?>:</b>
<?php echo CHtml::encode($model->slug_ja); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ko')); ?>:</b>
<?php echo CHtml::encode($model->slug_ko); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_lt')); ?>:</b>
<?php echo CHtml::encode($model->slug_lt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_lv')); ?>:</b>
<?php echo CHtml::encode($model->slug_lv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_nl')); ?>:</b>
<?php echo CHtml::encode($model->slug_nl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_no')); ?>:</b>
<?php echo CHtml::encode($model->slug_no); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_pl')); ?>:</b>
<?php echo CHtml::encode($model->slug_pl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_pt_br')); ?>:</b>
<?php echo CHtml::encode($model->slug_pt_br); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_pt_pt')); ?>:</b>
<?php echo CHtml::encode($model->slug_pt_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ro')); ?>:</b>
<?php echo CHtml::encode($model->slug_ro); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ru')); ?>:</b>
<?php echo CHtml::encode($model->slug_ru); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_sk')); ?>:</b>
<?php echo CHtml::encode($model->slug_sk); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_sl')); ?>:</b>
<?php echo CHtml::encode($model->slug_sl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_sr')); ?>:</b>
<?php echo CHtml::encode($model->slug_sr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_th')); ?>:</b>
<?php echo CHtml::encode($model->slug_th); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_tr')); ?>:</b>
<?php echo CHtml::encode($model->slug_tr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_uk')); ?>:</b>
<?php echo CHtml::encode($model->slug_uk); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_vi')); ?>:</b>
<?php echo CHtml::encode($model->slug_vi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_zh_cn')); ?>:</b>
<?php echo CHtml::encode($model->slug_zh_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_zh_tw')); ?>:</b>
<?php echo CHtml::encode($model->slug_zh_tw); ?>
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'cloned_from_id',
                        'value' => ($model->clonedFrom !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->clonedFrom->itemLabel,
                                    array('//exercise/view', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exercise/update', 'id' => $model->clonedFrom->id),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_en',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_question',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_question',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_description',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_description',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'thumbnail_media_id',
                        'value' => ($model->thumbnailMedia !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->thumbnailMedia->itemLabel,
                                    array('//p3Media/view', 'id' => $model->thumbnailMedia->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->thumbnailMedia->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'slideshow_file_id',
                        'value' => ($model->slideshowFile !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->slideshowFile->itemLabel,
                                    array('//slideshowFile/view', 'id' => $model->slideshowFile->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//slideshowFile/update', 'id' => $model->slideshowFile->id),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                        'name' => 'slug_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_es',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_hi',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_pt',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_sv',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_de',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'exercise_qa_state_id',
                        'value' => ($model->exerciseQaState !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaState->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaState->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaState->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'slug_zh',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_zh',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_ar',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_ar',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_bg',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_bg',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_ca',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_ca',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_cs',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_cs',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_da',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_da',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_en_gb',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_en_gb',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_en_us',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_en_us',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_el',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_el',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_fi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_fi',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_fil',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_fil',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_fr',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_fr',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_hr',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_hr',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_hu',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_hu',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_id',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_iw',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_iw',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_it',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_it',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_ja',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_ja',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_ko',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_ko',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_lt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_lt',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_lv',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_lv',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_nl',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_nl',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_no',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_no',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_pl',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_pl',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_pt_br',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_pt_br',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_pt_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_pt_pt',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_ro',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_ro',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_ru',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_ru',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_sk',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_sk',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_sl',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_sl',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_sr',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_sr',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_th',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_th',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_tr',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_tr',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_uk',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_uk',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_vi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_vi',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_zh_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_zh_cn',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_zh_tw',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_zh_tw',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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