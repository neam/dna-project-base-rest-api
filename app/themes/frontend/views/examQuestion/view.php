<?php
$this->breadcrumbs[Yii::t('model', 'Exam Questions')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Exam Question'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en')); ?>:</b>
<?php echo CHtml::encode($model->slug_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('question_en')); ?>:</b>
<?php echo CHtml::encode($model->question_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('source_node_id')); ?>:</b>
<?php echo CHtml::encode($model->source_node_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_qa_state_id_en')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_qa_state_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_qa_state_id_es')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_qa_state_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_qa_state_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_qa_state_id_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_qa_state_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_qa_state_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_qa_state_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_qa_state_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_qa_state_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_qa_state_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_qa_state_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_qa_state_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_qa_state_id_de')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_qa_state_id_de); ?>
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'cloned_from_id',
                        'value' => ($model->clonedFrom !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->clonedFrom->itemLabel,
                                    array('//snapshot/view', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//snapshot/update', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'slug_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_en',
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'source_node_id',
                        'value' => ($model->sourceNode !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->sourceNode->itemLabel,
                                    array('//node/view', 'id' => $model->sourceNode->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//node/update', 'id' => $model->sourceNode->id),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                        'name' => 'slug_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'slug_es',
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'exam_question_qa_state_id_en',
                        'value' => ($model->examQuestionQaStateIdEn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestionQaStateIdEn->itemLabel,
                                    array('//examQuestionQaState/view', 'id' => $model->examQuestionQaStateIdEn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestionQaState/update', 'id' => $model->examQuestionQaStateIdEn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exam_question_qa_state_id_es',
                        'value' => ($model->examQuestionQaStateIdEs !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestionQaStateIdEs->itemLabel,
                                    array('//examQuestionQaState/view', 'id' => $model->examQuestionQaStateIdEs->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestionQaState/update', 'id' => $model->examQuestionQaStateIdEs->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exam_question_qa_state_id_fa',
                        'value' => ($model->examQuestionQaStateIdFa !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestionQaStateIdFa->itemLabel,
                                    array('//examQuestionQaState/view', 'id' => $model->examQuestionQaStateIdFa->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestionQaState/update', 'id' => $model->examQuestionQaStateIdFa->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exam_question_qa_state_id_hi',
                        'value' => ($model->examQuestionQaStateIdHi !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestionQaStateIdHi->itemLabel,
                                    array('//examQuestionQaState/view', 'id' => $model->examQuestionQaStateIdHi->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestionQaState/update', 'id' => $model->examQuestionQaStateIdHi->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exam_question_qa_state_id_pt',
                        'value' => ($model->examQuestionQaStateIdPt !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestionQaStateIdPt->itemLabel,
                                    array('//examQuestionQaState/view', 'id' => $model->examQuestionQaStateIdPt->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestionQaState/update', 'id' => $model->examQuestionQaStateIdPt->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exam_question_qa_state_id_sv',
                        'value' => ($model->examQuestionQaStateIdSv !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestionQaStateIdSv->itemLabel,
                                    array('//examQuestionQaState/view', 'id' => $model->examQuestionQaStateIdSv->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestionQaState/update', 'id' => $model->examQuestionQaStateIdSv->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exam_question_qa_state_id_cn',
                        'value' => ($model->examQuestionQaStateIdCn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestionQaStateIdCn->itemLabel,
                                    array('//examQuestionQaState/view', 'id' => $model->examQuestionQaStateIdCn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestionQaState/update', 'id' => $model->examQuestionQaStateIdCn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'exam_question_qa_state_id_de',
                        'value' => ($model->examQuestionQaStateIdDe !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->examQuestionQaStateIdDe->itemLabel,
                                    array('//examQuestionQaState/view', 'id' => $model->examQuestionQaStateIdDe->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//examQuestionQaState/update', 'id' => $model->examQuestionQaStateIdDe->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>