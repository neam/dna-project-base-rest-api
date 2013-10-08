<?php
$this->breadcrumbs[Yii::t('model', 'Data Chunks')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Data Chunk'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('slug')); ?>:</b>
<?php echo CHtml::encode($model->slug); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>:</b>
<?php echo CHtml::encode($model->about); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('file_media_id')); ?>:</b>
<?php echo CHtml::encode($model->file_media_id); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('metadata')); ?>:</b>
<?php echo CHtml::encode($model->metadata); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_id')); ?>:</b>
<?php echo CHtml::encode($model->data_source_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slideshow_file_id')); ?>:</b>
<?php echo CHtml::encode($model->slideshow_file_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('vector_graphic_id')); ?>:</b>
<?php echo CHtml::encode($model->vector_graphic_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id); ?>
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'cloned_from_id',
                        'value' => ($model->clonedFrom !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->clonedFrom->itemLabel,
                                array('//dataChunk/view', 'id' => $model->clonedFrom->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//dataChunk/update', 'id' => $model->clonedFrom->id),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'file_media_id',
                        'value' => ($model->fileMedia !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->fileMedia->itemLabel,
                                array('//p3Media/view', 'id' => $model->fileMedia->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//p3Media/update', 'id' => $model->fileMedia->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'metadata',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'metadata',
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                        'name' => 'vector_graphic_id',
                        'value' => ($model->vectorGraphic !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->vectorGraphic->itemLabel,
                                array('//vectorGraphic/view', 'id' => $model->vectorGraphic->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//vectorGraphic/update', 'id' => $model->vectorGraphic->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id',
                        'value' => ($model->authoringWorkflowExecution !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecution->itemLabel,
                                array('//execution/view', 'execution_id' => $model->authoringWorkflowExecution->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//execution/update', 'execution_id' => $model->authoringWorkflowExecution->execution_id),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                'url' => $this->createUrl('/dataChunk/editableSaver'),
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