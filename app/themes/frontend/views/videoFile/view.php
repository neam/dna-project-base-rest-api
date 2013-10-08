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

<b><?php echo CHtml::encode($model->getAttributeLabel('title_en')); ?>:</b>
<?php echo CHtml::encode($model->title_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('slug')); ?>:</b>
<?php echo CHtml::encode($model->slug); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>:</b>
<?php echo CHtml::encode($model->about); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('thumbnail_media_id')); ?>:</b>
<?php echo CHtml::encode($model->thumbnail_media_id); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('subtitles_en')); ?>:</b>
<?php echo CHtml::encode($model->subtitles_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_en')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translation_workflow_execution_id')); ?>:</b>
<?php echo CHtml::encode($model->translation_workflow_execution_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_es')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_de')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_de); ?>
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
                        'name' => 'slug',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'slug',
                                'url' => $this->createUrl('/videoFile/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about',
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
                        'name' => 'authoring_workflow_execution_id_en',
                        'value' => ($model->authoringWorkflowExecutionIdEn !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdEn->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecutionIdEn->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecutionIdEn->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'translation_workflow_execution_id',
                        'value' => ($model->translationWorkflowExecution !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->translationWorkflowExecution->itemLabel,
                                array('//execution/view', 'execution_id' => $model->translationWorkflowExecution->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->translationWorkflowExecution->execution_id),
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
                        'name' => 'authoring_workflow_execution_id_es',
                        'value' => ($model->authoringWorkflowExecutionIdEs !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdEs->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecutionIdEs->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecutionIdEs->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_fa',
                        'value' => ($model->authoringWorkflowExecutionIdFa !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdFa->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecutionIdFa->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecutionIdFa->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_hi',
                        'value' => ($model->authoringWorkflowExecutionIdHi !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdHi->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecutionIdHi->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecutionIdHi->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_pt',
                        'value' => ($model->authoringWorkflowExecutionIdPt !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdPt->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecutionIdPt->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecutionIdPt->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_sv',
                        'value' => ($model->authoringWorkflowExecutionIdSv !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdSv->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecutionIdSv->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecutionIdSv->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_cn',
                        'value' => ($model->authoringWorkflowExecutionIdCn !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdCn->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecutionIdCn->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecutionIdCn->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_de',
                        'value' => ($model->authoringWorkflowExecutionIdDe !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdDe->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecutionIdDe->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecutionIdDe->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>