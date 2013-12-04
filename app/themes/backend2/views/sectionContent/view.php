<?php
$this->breadcrumbs[Yii::t('model', 'Section Contents')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>

<h1>

    <?php echo Yii::t('model', 'Section Content'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('section_id')); ?>:</b>
<?php echo CHtml::encode($model->section_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('ordinal')); ?>:</b>
<?php echo CHtml::encode($model->ordinal); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('html_chunk_id')); ?>:</b>
<?php echo CHtml::encode($model->html_chunk_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('snapshot_id')); ?>:</b>
<?php echo CHtml::encode($model->snapshot_id); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_id')); ?>:</b>
<?php echo CHtml::encode($model->video_file_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_id')); ?>:</b>
<?php echo CHtml::encode($model->exercise_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slideshow_file_id')); ?>:</b>
<?php echo CHtml::encode($model->slideshow_file_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_id')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('download_link_id')); ?>:</b>
<?php echo CHtml::encode($model->download_link_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_id')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($model->node_id); ?>
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
                                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'section_id',
                        'value' => ($model->section !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->section->itemLabel,
                                    array('//section/view', 'id' => $model->section->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//section/update', 'id' => $model->section->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'ordinal',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'ordinal',
                                    'url' => $this->createUrl('/sectionContent/editableSaver'),
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
                                    'url' => $this->createUrl('/sectionContent/editableSaver'),
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
                                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'html_chunk_id',
                        'value' => ($model->htmlChunk !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->htmlChunk->itemLabel,
                                    array('//htmlChunk/view', 'id' => $model->htmlChunk->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//htmlChunk/update', 'id' => $model->htmlChunk->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'snapshot_id',
                        'value' => ($model->snapshot !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->snapshot->itemLabel,
                                    array('//snapshot/view', 'id' => $model->snapshot->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//snapshot/update', 'id' => $model->snapshot->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'video_file_id',
                        'value' => ($model->videoFile !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->videoFile->itemLabel,
                                    array('//videoFile/view', 'id' => $model->videoFile->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//videoFile/update', 'id' => $model->videoFile->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exercise_id',
                        'value' => ($model->exercise !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exercise->itemLabel,
                                    array('//exercise/view', 'id' => $model->exercise->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exercise/update', 'id' => $model->exercise->id),
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
                        'name' => 'data_chunk_id',
                        'value' => ($model->dataChunk !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataChunk->itemLabel,
                                    array('//dataChunk/view', 'id' => $model->dataChunk->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataChunk/update', 'id' => $model->dataChunk->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'download_link_id',
                        'value' => ($model->downloadLink !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->downloadLink->itemLabel,
                                    array('//downloadLink/view', 'id' => $model->downloadLink->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//downloadLink/update', 'id' => $model->downloadLink->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exam_question_id',
                        'value' => ($model->examQuestion !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestion->itemLabel,
                                    array('//examQuestion/view', 'id' => $model->examQuestion->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestion/update', 'id' => $model->examQuestion->id),
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
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>