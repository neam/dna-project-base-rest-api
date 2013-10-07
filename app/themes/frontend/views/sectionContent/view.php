<?php
$this->breadcrumbs[Yii::t('model', 'Section Contents')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('viz_view_id')); ?>:</b>
<?php echo CHtml::encode($model->viz_view_id); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_id')); ?>:</b>
<?php echo CHtml::encode($model->video_file_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('teachers_guide_id')); ?>:</b>
<?php echo CHtml::encode($model->teachers_guide_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_id')); ?>:</b>
<?php echo CHtml::encode($model->exercise_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('presentation_id')); ?>:</b>
<?php echo CHtml::encode($model->presentation_id); ?>
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
                        'name' => 'viz_view_id',
                        'value' => ($model->vizView !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->vizView->itemLabel,
                                array('//vizView/view', 'id' => $model->vizView->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//vizView/update', 'id' => $model->vizView->id),
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
                        'name' => 'teachers_guide_id',
                        'value' => ($model->teachersGuide !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->teachersGuide->itemLabel,
                                array('//teachersGuide/view', 'id' => $model->teachersGuide->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//teachersGuide/update', 'id' => $model->teachersGuide->id),
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
                        'name' => 'presentation_id',
                        'value' => ($model->presentation !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->presentation->itemLabel,
                                array('//presentation/view', 'id' => $model->presentation->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//presentation/update', 'id' => $model->presentation->id),
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
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>