<?php
$this->breadcrumbs[Yii::t('model', 'Snapshots')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Snapshot'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('about_en')); ?>:</b>
<?php echo CHtml::encode($model->about_en); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('link')); ?>:</b>
<?php echo CHtml::encode($model->link); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('embed_override')); ?>:</b>
<?php echo CHtml::encode($model->embed_override); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('tool_id')); ?>:</b>
<?php echo CHtml::encode($model->tool_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('authoring_workflow_execution_id_en')); ?>:</b>
<?php echo CHtml::encode($model->authoring_workflow_execution_id_en); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('about_es')); ?>:</b>
<?php echo CHtml::encode($model->about_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_fa')); ?>:</b>
<?php echo CHtml::encode($model->about_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_hi')); ?>:</b>
<?php echo CHtml::encode($model->about_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_pt')); ?>:</b>
<?php echo CHtml::encode($model->about_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_sv')); ?>:</b>
<?php echo CHtml::encode($model->about_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_cn')); ?>:</b>
<?php echo CHtml::encode($model->about_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about_de')); ?>:</b>
<?php echo CHtml::encode($model->about_de); ?>
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                        'name' => 'title_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'title_en',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_en',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_en',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'link',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'link',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'embed_override',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'embed_override',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'tool_id',
                        'value' => ($model->tool !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->tool->itemLabel,
                                array('//tool/view', 'id' => $model->tool->id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//tool/update', 'id' => $model->tool->id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_en',
                        'value' => ($model->authoringWorkflowExecutionIdEn !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdEn->itemLabel,
                                array('//ezcExecution/view', 'execution_id' => $model->authoringWorkflowExecutionIdEn->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//ezcExecution/update', 'execution_id' => $model->authoringWorkflowExecutionIdEn->execution_id),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
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
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_es',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_es',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_fa',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_fa',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_hi',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_hi',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_pt',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_pt',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_sv',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_sv',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_cn',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_cn',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'about_de',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'about_de',
                                'url' => $this->createUrl('/snapshot/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_es',
                        'value' => ($model->authoringWorkflowExecutionIdEs !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdEs->itemLabel,
                                array('//ezcExecution/view', 'execution_id' => $model->authoringWorkflowExecutionIdEs->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//ezcExecution/update', 'execution_id' => $model->authoringWorkflowExecutionIdEs->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_fa',
                        'value' => ($model->authoringWorkflowExecutionIdFa !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdFa->itemLabel,
                                array('//ezcExecution/view', 'execution_id' => $model->authoringWorkflowExecutionIdFa->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//ezcExecution/update', 'execution_id' => $model->authoringWorkflowExecutionIdFa->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_hi',
                        'value' => ($model->authoringWorkflowExecutionIdHi !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdHi->itemLabel,
                                array('//ezcExecution/view', 'execution_id' => $model->authoringWorkflowExecutionIdHi->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//ezcExecution/update', 'execution_id' => $model->authoringWorkflowExecutionIdHi->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_pt',
                        'value' => ($model->authoringWorkflowExecutionIdPt !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdPt->itemLabel,
                                array('//ezcExecution/view', 'execution_id' => $model->authoringWorkflowExecutionIdPt->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//ezcExecution/update', 'execution_id' => $model->authoringWorkflowExecutionIdPt->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_sv',
                        'value' => ($model->authoringWorkflowExecutionIdSv !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdSv->itemLabel,
                                array('//ezcExecution/view', 'execution_id' => $model->authoringWorkflowExecutionIdSv->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//ezcExecution/update', 'execution_id' => $model->authoringWorkflowExecutionIdSv->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_cn',
                        'value' => ($model->authoringWorkflowExecutionIdCn !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdCn->itemLabel,
                                array('//ezcExecution/view', 'execution_id' => $model->authoringWorkflowExecutionIdCn->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//ezcExecution/update', 'execution_id' => $model->authoringWorkflowExecutionIdCn->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'authoring_workflow_execution_id_de',
                        'value' => ($model->authoringWorkflowExecutionIdDe !== null) ? CHtml::link(
                                '<i class="icon icon-circle-arrow-left"></i> ' . $model->authoringWorkflowExecutionIdDe->itemLabel,
                                array('//ezcExecution/view', 'execution_id' => $model->authoringWorkflowExecutionIdDe->execution_id),
                                array('class' => '')) . ' ' . CHtml::link(
                                '<i class="icon icon-pencil"></i> ',
                                array('//ezcExecution/update', 'execution_id' => $model->authoringWorkflowExecutionIdDe->execution_id),
                                array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>