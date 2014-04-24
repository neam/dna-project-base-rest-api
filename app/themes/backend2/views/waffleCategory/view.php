<?php
$this->breadcrumbs[Yii::t('model', 'Waffle Categories')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Waffle Category'); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('ref')); ?>:</b>
<?php echo CHtml::encode($model->ref); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_list_name')); ?>:</b>
<?php echo CHtml::encode($model->_list_name); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_property_name')); ?>:</b>
<?php echo CHtml::encode($model->_property_name); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_possessive')); ?>:</b>
<?php echo CHtml::encode($model->_possessive); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('_choice_format')); ?>:</b>
<?php echo CHtml::encode($model->_choice_format); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('_description')); ?>:</b>
<?php echo CHtml::encode($model->_description); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('waffle_id')); ?>:</b>
<?php echo CHtml::encode($model->waffle_id); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('waffle_category_qa_state_id')); ?>:</b>
<?php echo CHtml::encode($model->waffle_category_qa_state_id); ?>
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
            '\TbDetailView',
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
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
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
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'cloned_from_id',
                        'value' => ($model->clonedFrom !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->clonedFrom->itemLabel,
                                    array('//waffleCategory/view', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//waffleCategory/update', 'id' => $model->clonedFrom->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'ref',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'ref',
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_list_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_list_name',
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_property_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_property_name',
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_possessive',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_possessive',
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_choice_format',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_choice_format',
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => '_description',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_description',
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'waffle_id',
                        'value' => ($model->waffle !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->waffle->itemLabel,
                                    array('//waffle/view', 'id' => $model->waffle->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//waffle/update', 'id' => $model->waffle->id),
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
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
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
                                    'url' => $this->createUrl('/waffleCategory/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'owner_id',
                        'value' => ($model->owner !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->owner->itemLabel,
                                    array('//account/view', 'id' => $model->owner->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//account/update', 'id' => $model->owner->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'node_id',
                        'value' => ($model->node !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->node->itemLabel,
                                    array('//node/view', 'id' => $model->node->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//node/update', 'id' => $model->node->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'waffle_category_qa_state_id',
                        'value' => ($model->waffleCategoryQaState !== null) ? CHtml::link(
                                    '<i class="icon glyphicon-circle-arrow-left"></i> ' . $model->waffleCategoryQaState->itemLabel,
                                    array('//waffleCategoryQaState/view', 'id' => $model->waffleCategoryQaState->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon glyphicon-pencil"></i> ',
                                    array('//waffleCategoryQaState/update', 'id' => $model->waffleCategoryQaState->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>