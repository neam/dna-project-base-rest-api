<?php
$this->breadcrumbs[Yii::t('model', 'Data Sources')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Data Source'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('logo_media_id')); ?>:</b>
<?php echo CHtml::encode($model->logo_media_id); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('mini_logo_media_id')); ?>:</b>
<?php echo CHtml::encode($model->mini_logo_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('link')); ?>:</b>
<?php echo CHtml::encode($model->link); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_qa_state_id_en')); ?>:</b>
<?php echo CHtml::encode($model->data_source_qa_state_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_qa_state_id_es')); ?>:</b>
<?php echo CHtml::encode($model->data_source_qa_state_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_qa_state_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->data_source_qa_state_id_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_qa_state_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->data_source_qa_state_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_qa_state_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->data_source_qa_state_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_qa_state_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->data_source_qa_state_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_qa_state_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->data_source_qa_state_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_source_qa_state_id_de')); ?>:</b>
<?php echo CHtml::encode($model->data_source_qa_state_id_de); ?>
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'logo_media_id',
                        'value' => ($model->logoMedia !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->logoMedia->itemLabel,
                                    array('//p3Media/view', 'id' => $model->logoMedia->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->logoMedia->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'mini_logo_media_id',
                        'value' => ($model->miniLogoMedia !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->miniLogoMedia->itemLabel,
                                    array('//p3Media/view', 'id' => $model->miniLogoMedia->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//p3Media/update', 'id' => $model->miniLogoMedia->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'link',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'link',
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
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
                                    'url' => $this->createUrl('/dataSource/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'data_source_qa_state_id_en',
                        'value' => ($model->dataSourceQaStateIdEn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSourceQaStateIdEn->itemLabel,
                                    array('//dataSourceQaState/view', 'id' => $model->dataSourceQaStateIdEn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSourceQaState/update', 'id' => $model->dataSourceQaStateIdEn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_source_qa_state_id_es',
                        'value' => ($model->dataSourceQaStateIdEs !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSourceQaStateIdEs->itemLabel,
                                    array('//dataSourceQaState/view', 'id' => $model->dataSourceQaStateIdEs->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSourceQaState/update', 'id' => $model->dataSourceQaStateIdEs->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_source_qa_state_id_fa',
                        'value' => ($model->dataSourceQaStateIdFa !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSourceQaStateIdFa->itemLabel,
                                    array('//dataSourceQaState/view', 'id' => $model->dataSourceQaStateIdFa->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSourceQaState/update', 'id' => $model->dataSourceQaStateIdFa->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_source_qa_state_id_hi',
                        'value' => ($model->dataSourceQaStateIdHi !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSourceQaStateIdHi->itemLabel,
                                    array('//dataSourceQaState/view', 'id' => $model->dataSourceQaStateIdHi->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSourceQaState/update', 'id' => $model->dataSourceQaStateIdHi->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_source_qa_state_id_pt',
                        'value' => ($model->dataSourceQaStateIdPt !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSourceQaStateIdPt->itemLabel,
                                    array('//dataSourceQaState/view', 'id' => $model->dataSourceQaStateIdPt->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSourceQaState/update', 'id' => $model->dataSourceQaStateIdPt->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_source_qa_state_id_sv',
                        'value' => ($model->dataSourceQaStateIdSv !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSourceQaStateIdSv->itemLabel,
                                    array('//dataSourceQaState/view', 'id' => $model->dataSourceQaStateIdSv->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSourceQaState/update', 'id' => $model->dataSourceQaStateIdSv->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_source_qa_state_id_cn',
                        'value' => ($model->dataSourceQaStateIdCn !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSourceQaStateIdCn->itemLabel,
                                    array('//dataSourceQaState/view', 'id' => $model->dataSourceQaStateIdCn->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSourceQaState/update', 'id' => $model->dataSourceQaStateIdCn->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'data_source_qa_state_id_de',
                        'value' => ($model->dataSourceQaStateIdDe !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->dataSourceQaStateIdDe->itemLabel,
                                    array('//dataSourceQaState/view', 'id' => $model->dataSourceQaStateIdDe->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//dataSourceQaState/update', 'id' => $model->dataSourceQaStateIdDe->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>