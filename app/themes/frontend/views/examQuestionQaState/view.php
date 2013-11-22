<?php
$this->breadcrumbs[Yii::t('model', 'Exam Question Qa States')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Exam Question Qa State'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_approved')); ?>:</b>
<?php echo CHtml::encode($model->slug_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('question_approved')); ?>:</b>
<?php echo CHtml::encode($model->question_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('source_approved')); ?>:</b>
<?php echo CHtml::encode($model->source_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_proofed')); ?>:</b>
<?php echo CHtml::encode($model->slug_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('question_proofed')); ?>:</b>
<?php echo CHtml::encode($model->question_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('source_proofed')); ?>:</b>
<?php echo CHtml::encode($model->source_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('draft_saved')); ?>:</b>
<?php echo CHtml::encode($model->draft_saved); ?>
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'question_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_approved',
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'source_approved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'source_approved',
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'question_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'question_proofed',
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'source_proofed',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'source_proofed',
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'draft_saved',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'draft_saved',
                                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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