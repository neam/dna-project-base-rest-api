<?php
$this->breadcrumbs[Yii::t('model', 'Video Files')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Video File'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('title_en')); ?>:</b>
<?php echo CHtml::encode($model->title_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en')); ?>:</b>
<?php echo CHtml::encode($model->slug_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('about_en')); ?>:</b>
<?php echo CHtml::encode($model->about_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('thumbnail_media_id')); ?>:</b>
<?php echo CHtml::encode($model->thumbnail_media_id); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('original_media_id')); ?>:</b>
<?php echo CHtml::encode($model->original_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('generate_processed_media')); ?>:</b>
<?php echo CHtml::encode($model->generate_processed_media); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_en')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_en')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($model->node_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_es')); ?>:</b>
<?php echo CHtml::encode($model->title_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_fa')); ?>:</b>
<?php echo CHtml::encode($model->title_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_hi')); ?>:</b>
<?php echo CHtml::encode($model->title_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_pt')); ?>:</b>
<?php echo CHtml::encode($model->title_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_sv')); ?>:</b>
<?php echo CHtml::encode($model->title_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_cn')); ?>:</b>
<?php echo CHtml::encode($model->title_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_de')); ?>:</b>
<?php echo CHtml::encode($model->title_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_es')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_fa')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_hi')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_pt')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_sv')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_cn')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_de')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_es')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_fa); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_de')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_es')); ?>:</b>
<?php echo CHtml::encode($model->slug_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_fa')); ?>:</b>
<?php echo CHtml::encode($model->slug_fa); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_cn')); ?>:</b>
<?php echo CHtml::encode($model->slug_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_de')); ?>:</b>
<?php echo CHtml::encode($model->slug_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_es')); ?>:</b>
<?php echo CHtml::encode($model->about_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_fa')); ?>:</b>
<?php echo CHtml::encode($model->about_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_hi')); ?>:</b>
<?php echo CHtml::encode($model->about_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_pt')); ?>:</b>
<?php echo CHtml::encode($model->about_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_sv')); ?>:</b>
<?php echo CHtml::encode($model->about_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_cn')); ?>:</b>
<?php echo CHtml::encode($model->about_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_de')); ?>:</b>
<?php echo CHtml::encode($model->about_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_qa_state_id_en')); ?>:</b>
<?php echo CHtml::encode($model->video_file_qa_state_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_qa_state_id_es')); ?>:</b>
<?php echo CHtml::encode($model->video_file_qa_state_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_qa_state_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->video_file_qa_state_id_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_qa_state_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->video_file_qa_state_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_qa_state_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->video_file_qa_state_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_qa_state_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->video_file_qa_state_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_qa_state_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->video_file_qa_state_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_qa_state_id_de')); ?>:</b>
<?php echo CHtml::encode($model->video_file_qa_state_id_de); ?>
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'cloned_from_id',
                        'value' => ($model->clonedFrom !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->clonedFrom->itemLabel,
                                array('//videoFile/view', 'id' => $model->clonedFrom->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFile/update', 'id' => $model->clonedFrom->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'title_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_en',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_en',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                        'name' => 'subtitles_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'subtitles_en',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'created',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'created',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
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
                        'name' => 'title_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_es',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'title_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_fa',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'title_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_hi',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'title_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_pt',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'title_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_sv',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'title_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_cn',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'title_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_de',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'subtitles_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'subtitles_es',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'subtitles_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'subtitles_fa',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'subtitles_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'subtitles_hi',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'subtitles_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'subtitles_pt',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'subtitles_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'subtitles_sv',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'subtitles_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'subtitles_cn',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'subtitles_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'subtitles_de',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
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
                        'name' => 'processed_media_id_fa',
                        'value' => ($model->processedMediaIdFa !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdFa->itemLabel,
                                array('//p3Media/view', 'id' => $model->processedMediaIdFa->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//p3Media/update', 'id' => $model->processedMediaIdFa->id),
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
                        'name' => 'processed_media_id_cn',
                        'value' => ($model->processedMediaIdCn !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->processedMediaIdCn->itemLabel,
                                array('//p3Media/view', 'id' => $model->processedMediaIdCn->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//p3Media/update', 'id' => $model->processedMediaIdCn->id),
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
                        'name' => 'slug_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'slug_es',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'slug_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'slug_fa',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'slug_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'slug_cn',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
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
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_es',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_fa',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_hi',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_pt',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_sv',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_cn',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_de',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'video_file_qa_state_id_en',
                        'value' => ($model->videoFileQaStateIdEn !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFileQaStateIdEn->itemLabel,
                                array('//videoFileQaState/view', 'id' => $model->videoFileQaStateIdEn->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFileQaState/update', 'id' => $model->videoFileQaStateIdEn->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'video_file_qa_state_id_es',
                        'value' => ($model->videoFileQaStateIdEs !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFileQaStateIdEs->itemLabel,
                                array('//videoFileQaState/view', 'id' => $model->videoFileQaStateIdEs->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFileQaState/update', 'id' => $model->videoFileQaStateIdEs->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'video_file_qa_state_id_fa',
                        'value' => ($model->videoFileQaStateIdFa !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFileQaStateIdFa->itemLabel,
                                array('//videoFileQaState/view', 'id' => $model->videoFileQaStateIdFa->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFileQaState/update', 'id' => $model->videoFileQaStateIdFa->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'video_file_qa_state_id_hi',
                        'value' => ($model->videoFileQaStateIdHi !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFileQaStateIdHi->itemLabel,
                                array('//videoFileQaState/view', 'id' => $model->videoFileQaStateIdHi->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFileQaState/update', 'id' => $model->videoFileQaStateIdHi->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'video_file_qa_state_id_pt',
                        'value' => ($model->videoFileQaStateIdPt !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFileQaStateIdPt->itemLabel,
                                array('//videoFileQaState/view', 'id' => $model->videoFileQaStateIdPt->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFileQaState/update', 'id' => $model->videoFileQaStateIdPt->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'video_file_qa_state_id_sv',
                        'value' => ($model->videoFileQaStateIdSv !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFileQaStateIdSv->itemLabel,
                                array('//videoFileQaState/view', 'id' => $model->videoFileQaStateIdSv->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFileQaState/update', 'id' => $model->videoFileQaStateIdSv->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'video_file_qa_state_id_cn',
                        'value' => ($model->videoFileQaStateIdCn !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFileQaStateIdCn->itemLabel,
                                array('//videoFileQaState/view', 'id' => $model->videoFileQaStateIdCn->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFileQaState/update', 'id' => $model->videoFileQaStateIdCn->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'video_file_qa_state_id_de',
                        'value' => ($model->videoFileQaStateIdDe !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFileQaStateIdDe->itemLabel,
                                array('//videoFileQaState/view', 'id' => $model->videoFileQaStateIdDe->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//videoFileQaState/update', 'id' => $model->videoFileQaStateIdDe->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>