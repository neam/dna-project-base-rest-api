<?php
$this->breadcrumbs[Yii::t('model', 'Exercises')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('title_en')); ?>:</b>
<?php echo CHtml::encode($model->title_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en')); ?>:</b>
<?php echo CHtml::encode($model->slug_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('question_en')); ?>:</b>
<?php echo CHtml::encode($model->question_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('description_en')); ?>:</b>
<?php echo CHtml::encode($model->description_en); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('question_es')); ?>:</b>
<?php echo CHtml::encode($model->question_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('question_fa')); ?>:</b>
<?php echo CHtml::encode($model->question_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('question_hi')); ?>:</b>
<?php echo CHtml::encode($model->question_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('question_pt')); ?>:</b>
<?php echo CHtml::encode($model->question_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('question_sv')); ?>:</b>
<?php echo CHtml::encode($model->question_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('question_cn')); ?>:</b>
<?php echo CHtml::encode($model->question_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('question_de')); ?>:</b>
<?php echo CHtml::encode($model->question_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('description_es')); ?>:</b>
<?php echo CHtml::encode($model->description_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('description_fa')); ?>:</b>
<?php echo CHtml::encode($model->description_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('description_hi')); ?>:</b>
<?php echo CHtml::encode($model->description_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('description_pt')); ?>:</b>
<?php echo CHtml::encode($model->description_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('description_sv')); ?>:</b>
<?php echo CHtml::encode($model->description_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('description_cn')); ?>:</b>
<?php echo CHtml::encode($model->description_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('description_de')); ?>:</b>
<?php echo CHtml::encode($model->description_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id_en')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id_es')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_qa_state_id_de')); ?>:</b>
<?php echo CHtml::encode($model->exercise_qa_state_id_de); ?>
<br />

    */
?>

<div class="row-fluid">
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
                        'name' => 'title_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'title_en',
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
                        'name' => 'question_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_en',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'description_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'description_en',
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
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
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
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
                        'name' => 'slug_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_fa',
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
                        'name' => 'slug_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_cn',
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
                        'name' => 'question_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_es',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'question_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_fa',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'question_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_hi',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'question_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_pt',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'question_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_sv',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'question_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_cn',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'question_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_de',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'description_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'description_es',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'description_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'description_fa',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'description_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'description_hi',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'description_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'description_pt',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'description_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'description_sv',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'description_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'description_cn',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'description_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'description_de',
                                    'url' => $this->createUrl('/exercise/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'exercise_qa_state_id_en',
                        'value' => ($model->exerciseQaStateIdEn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaStateIdEn->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaStateIdEn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaStateIdEn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exercise_qa_state_id_es',
                        'value' => ($model->exerciseQaStateIdEs !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaStateIdEs->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaStateIdEs->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaStateIdEs->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exercise_qa_state_id_fa',
                        'value' => ($model->exerciseQaStateIdFa !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaStateIdFa->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaStateIdFa->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaStateIdFa->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exercise_qa_state_id_hi',
                        'value' => ($model->exerciseQaStateIdHi !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaStateIdHi->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaStateIdHi->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaStateIdHi->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exercise_qa_state_id_pt',
                        'value' => ($model->exerciseQaStateIdPt !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaStateIdPt->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaStateIdPt->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaStateIdPt->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exercise_qa_state_id_sv',
                        'value' => ($model->exerciseQaStateIdSv !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaStateIdSv->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaStateIdSv->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaStateIdSv->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exercise_qa_state_id_cn',
                        'value' => ($model->exerciseQaStateIdCn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaStateIdCn->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaStateIdCn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaStateIdCn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exercise_qa_state_id_de',
                        'value' => ($model->exerciseQaStateIdDe !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->exerciseQaStateIdDe->itemLabel,
                                    array('//exerciseQaState/view', 'id' => $model->exerciseQaStateIdDe->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//exerciseQaState/update', 'id' => $model->exerciseQaStateIdDe->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>