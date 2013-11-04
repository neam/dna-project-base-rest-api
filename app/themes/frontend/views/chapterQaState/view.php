<?php
$this->breadcrumbs[Yii::t('model', 'Chapter Qa States')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Chapter Qa State'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('preview_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->preview_validation_progress); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('public_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->public_validation_progress); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('approval_progress')); ?>:</b>
<?php echo CHtml::encode($model->approval_progress); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('proofing_progress')); ?>:</b>
<?php echo CHtml::encode($model->proofing_progress); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('translations_draft_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_draft_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translations_preview_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_preview_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translations_public_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_public_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translations_approval_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_approval_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translations_proofing_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_proofing_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('previewing_welcome')); ?>:</b>
<?php echo CHtml::encode($model->previewing_welcome); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('candidate_for_public_status')); ?>:</b>
<?php echo CHtml::encode($model->candidate_for_public_status); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_approved')); ?>:</b>
<?php echo CHtml::encode($model->title_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_approved')); ?>:</b>
<?php echo CHtml::encode($model->slug_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('thumbnail_approved')); ?>:</b>
<?php echo CHtml::encode($model->thumbnail_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_approved')); ?>:</b>
<?php echo CHtml::encode($model->about_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_approved')); ?>:</b>
<?php echo CHtml::encode($model->video_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('teachers_guide_approved')); ?>:</b>
<?php echo CHtml::encode($model->teachers_guide_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercises_approved')); ?>:</b>
<?php echo CHtml::encode($model->exercises_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('snapshots_approved')); ?>:</b>
<?php echo CHtml::encode($model->snapshots_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('credits_approved')); ?>:</b>
<?php echo CHtml::encode($model->credits_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_proofed')); ?>:</b>
<?php echo CHtml::encode($model->title_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_proofed')); ?>:</b>
<?php echo CHtml::encode($model->slug_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('thumbnail_proofed')); ?>:</b>
<?php echo CHtml::encode($model->thumbnail_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_proofed')); ?>:</b>
<?php echo CHtml::encode($model->about_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_proofed')); ?>:</b>
<?php echo CHtml::encode($model->video_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('teachers_guide_proofed')); ?>:</b>
<?php echo CHtml::encode($model->teachers_guide_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercises_proofed')); ?>:</b>
<?php echo CHtml::encode($model->exercises_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('snapshots_proofed')); ?>:</b>
<?php echo CHtml::encode($model->snapshots_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('credits_proofed')); ?>:</b>
<?php echo CHtml::encode($model->credits_proofed); ?>
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
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'preview_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'preview_validation_progress',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'public_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'public_validation_progress',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translations_draft_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translations_draft_validation_progress',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translations_preview_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translations_preview_validation_progress',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translations_public_validation_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translations_public_validation_progress',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translations_approval_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translations_approval_progress',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'translations_proofing_progress',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'translations_proofing_progress',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'previewing_welcome',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'previewing_welcome',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'candidate_for_public_status',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'candidate_for_public_status',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_approved',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'thumbnail_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'thumbnail_approved',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'about_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'about_approved',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'video_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'video_approved',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'teachers_guide_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'teachers_guide_approved',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'exercises_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'exercises_approved',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'snapshots_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'snapshots_approved',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'credits_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'credits_approved',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'slug_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_proofed',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'thumbnail_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'thumbnail_proofed',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'about_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'about_proofed',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'video_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'video_proofed',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'teachers_guide_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'teachers_guide_proofed',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'exercises_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'exercises_proofed',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'snapshots_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'snapshots_proofed',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'credits_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'credits_proofed',
                                    'url' => $this->createUrl('/chapterQaState/editableSaver'),
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