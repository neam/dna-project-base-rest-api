<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model', 'Waffle Publisher'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('WafflePublisher.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
<?php echo CHtml::encode($model->version); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
<?php echo CHtml::encode($model->cloned_from_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('ref')); ?>:</b>
<?php echo CHtml::encode($model->ref); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('_name')); ?>:</b>
<?php echo CHtml::encode($model->_name); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('_description')); ?>:</b>
<?php echo CHtml::encode($model->_description); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('url')); ?>:</b>
<?php echo CHtml::encode($model->url); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('image_small_media_id')); ?>:</b>
<?php echo CHtml::encode($model->image_small_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('image_large_media_id')); ?>:</b>
<?php echo CHtml::encode($model->image_large_media_id); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('waffle_publisher_qa_state_id')); ?>:</b>
<?php echo CHtml::encode($model->waffle_publisher_qa_state_id); ?>
<br />

    */
?>
-->
