<?php
$this->breadcrumbs[Yii::t('model', 'Comments')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Comment'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('author_user_id')); ?>:</b>
<?php echo CHtml::encode($model->author_user_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('parent_id')); ?>:</b>
<?php echo CHtml::encode($model->parent_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('_comment')); ?>:</b>
<?php echo CHtml::encode($model->_comment); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('context_model')); ?>:</b>
<?php echo CHtml::encode($model->context_model); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('context_id')); ?>:</b>
<?php echo CHtml::encode($model->context_id); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('context_attribute')); ?>:</b>
<?php echo CHtml::encode($model->context_attribute); ?>
<br/>

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('context_translate_into')); ?>:</b>
<?php echo CHtml::encode($model->context_translate_into); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
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
                                    'url' => $this->createUrl('/comment/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'author_user_id',
                        'value' => ($model->authorUser !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->authorUser->itemLabel,
                                    array('//users/view', 'id' => $model->authorUser->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//users/update', 'id' => $model->authorUser->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => 'parent_id',
                        'value' => ($model->parent !== null) ? CHtml::link(
                                    '<i class="icon icon-circle-arrow-left"></i> ' . $model->parent->itemLabel,
                                    array('//comment/view', 'id' => $model->parent->id),
                                    array('class' => '')) . ' ' . CHtml::link(
                                    '<i class="icon icon-pencil"></i> ',
                                    array('//comment/update', 'id' => $model->parent->id),
                                    array('class' => '')) : 'n/a',
                        'type' => 'html',
                    ),
                    array(
                        'name' => '_comment',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => '_comment',
                                    'url' => $this->createUrl('/comment/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'context_model',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'context_model',
                                    'url' => $this->createUrl('/comment/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'context_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'context_id',
                                    'url' => $this->createUrl('/comment/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'context_attribute',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'context_attribute',
                                    'url' => $this->createUrl('/comment/editableSaver'),
                                ),
                                true
                            )
                    ),
                    array(
                        'name' => 'context_translate_into',
                        'type' => 'raw',
                        'value' => $this->widget(
                                'TbEditableField',
                                array(
                                    'model' => $model,
                                    'attribute' => 'context_translate_into',
                                    'url' => $this->createUrl('/comment/editableSaver'),
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
                                    'url' => $this->createUrl('/comment/editableSaver'),
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
                                    'url' => $this->createUrl('/comment/editableSaver'),
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