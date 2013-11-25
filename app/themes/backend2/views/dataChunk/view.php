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

<b><?php echo CHtml::encode($model->getAttributeLabel('_title')); ?>:</b>
<?php echo CHtml::encode($model->_title); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en')); ?>:</b>
<?php echo CHtml::encode($model->slug_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_about')); ?>:</b>
<?php echo CHtml::encode($model->_about); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('file_media_id')); ?>:</b>
<?php echo CHtml::encode($model->file_media_id); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('metadata')); ?>:</b>
<?php echo CHtml::encode($model->metadata); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_qa_state_id_en')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_qa_state_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_qa_state_id_es')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_qa_state_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_qa_state_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_qa_state_id_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_qa_state_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_qa_state_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_qa_state_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_qa_state_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_qa_state_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_qa_state_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_qa_state_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_qa_state_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_qa_state_id_de')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_qa_state_id_de); ?>
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
                        'name' => '_title',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_title',
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_about',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_about',
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
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
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
                                    'url' => $this->createUrl('/dataChunk/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'data_chunk_qa_state_id_en',
                        'value' => ($model->dataChunkQaStateIdEn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunkQaStateIdEn->itemLabel,
                                    array('//dataChunkQaState/view', 'id' => $model->dataChunkQaStateIdEn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunkQaState/update', 'id' => $model->dataChunkQaStateIdEn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_chunk_qa_state_id_es',
                        'value' => ($model->dataChunkQaStateIdEs !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunkQaStateIdEs->itemLabel,
                                    array('//dataChunkQaState/view', 'id' => $model->dataChunkQaStateIdEs->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunkQaState/update', 'id' => $model->dataChunkQaStateIdEs->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_chunk_qa_state_id_fa',
                        'value' => ($model->dataChunkQaStateIdFa !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunkQaStateIdFa->itemLabel,
                                    array('//dataChunkQaState/view', 'id' => $model->dataChunkQaStateIdFa->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunkQaState/update', 'id' => $model->dataChunkQaStateIdFa->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_chunk_qa_state_id_hi',
                        'value' => ($model->dataChunkQaStateIdHi !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunkQaStateIdHi->itemLabel,
                                    array('//dataChunkQaState/view', 'id' => $model->dataChunkQaStateIdHi->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunkQaState/update', 'id' => $model->dataChunkQaStateIdHi->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_chunk_qa_state_id_pt',
                        'value' => ($model->dataChunkQaStateIdPt !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunkQaStateIdPt->itemLabel,
                                    array('//dataChunkQaState/view', 'id' => $model->dataChunkQaStateIdPt->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunkQaState/update', 'id' => $model->dataChunkQaStateIdPt->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_chunk_qa_state_id_sv',
                        'value' => ($model->dataChunkQaStateIdSv !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunkQaStateIdSv->itemLabel,
                                    array('//dataChunkQaState/view', 'id' => $model->dataChunkQaStateIdSv->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunkQaState/update', 'id' => $model->dataChunkQaStateIdSv->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_chunk_qa_state_id_cn',
                        'value' => ($model->dataChunkQaStateIdCn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunkQaStateIdCn->itemLabel,
                                    array('//dataChunkQaState/view', 'id' => $model->dataChunkQaStateIdCn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunkQaState/update', 'id' => $model->dataChunkQaStateIdCn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_chunk_qa_state_id_de',
                        'value' => ($model->dataChunkQaStateIdDe !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunkQaStateIdDe->itemLabel,
                                    array('//dataChunkQaState/view', 'id' => $model->dataChunkQaStateIdDe->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunkQaState/update', 'id' => $model->dataChunkQaStateIdDe->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>