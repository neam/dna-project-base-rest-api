<?php
$this->breadcrumbs[Yii::t('model', 'Source Messages')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model','Source Message'); ?>
    <small>
        <?php echo Yii::t('model','View')?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('SourceMessage.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('category')); ?>:</b>
<?php echo CHtml::encode($model->category); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('message')); ?>:</b>
<?php echo CHtml::encode($model->message); ?>
<br />

-->
