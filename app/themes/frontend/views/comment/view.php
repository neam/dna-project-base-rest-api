<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>

<!--<h1>
    
    <?php echo Yii::t('model', 'Comment'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('Comment.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('author_user_id')); ?>:</b>
<?php echo CHtml::encode($model->author_user_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('parent_id')); ?>:</b>
<?php echo CHtml::encode($model->parent_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('_comment')); ?>:</b>
<?php echo CHtml::encode($model->_comment); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('context_model')); ?>:</b>
<?php echo CHtml::encode($model->context_model); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('context_id')); ?>:</b>
<?php echo CHtml::encode($model->context_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('context_attribute')); ?>:</b>
<?php echo CHtml::encode($model->context_attribute); ?>
<br />

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
-->
