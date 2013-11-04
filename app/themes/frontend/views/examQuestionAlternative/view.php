<?php
$this->breadcrumbs[Yii::t('model', 'Exam Question Alternatives')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Exam Question Alternative'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('slug')); ?>:</b>
<?php echo CHtml::encode($model->slug); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('markup_en')); ?>:</b>
<?php echo CHtml::encode($model->markup_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('correct')); ?>:</b>
<?php echo CHtml::encode($model->correct); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_id')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($model->node_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('markup_es')); ?>:</b>
<?php echo CHtml::encode($model->markup_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('markup_fa')); ?>:</b>
<?php echo CHtml::encode($model->markup_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('markup_hi')); ?>:</b>
<?php echo CHtml::encode($model->markup_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('markup_pt')); ?>:</b>
<?php echo CHtml::encode($model->markup_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('markup_sv')); ?>:</b>
<?php echo CHtml::encode($model->markup_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('markup_cn')); ?>:</b>
<?php echo CHtml::encode($model->markup_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('markup_de')); ?>:</b>
<?php echo CHtml::encode($model->markup_de); ?>
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
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'markup_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'markup_en',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'correct',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'correct',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
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
                        'name' => 'created',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'created',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
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
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
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
                        'name' => 'markup_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'markup_es',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'markup_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'markup_fa',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'markup_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'markup_hi',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'markup_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'markup_pt',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'markup_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'markup_sv',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'markup_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'markup_cn',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'markup_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'markup_de',
                                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
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