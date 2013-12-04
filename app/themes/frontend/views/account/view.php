<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>

<!--<h1>
    
    <?php echo Yii::t('model','Account'); ?>
    <small>
        <?php echo Yii::t('model','View')?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('Account.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>:</b>
<?php echo CHtml::encode($model->username); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('password')); ?>:</b>
<?php echo CHtml::encode($model->password); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</b>
<?php echo CHtml::encode($model->email); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('activkey')); ?>:</b>
<?php echo CHtml::encode($model->activkey); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('superuser')); ?>:</b>
<?php echo CHtml::encode($model->superuser); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($model->status); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:</b>
<?php echo CHtml::encode($model->create_at); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>:</b>
<?php echo CHtml::encode($model->lastvisit_at); ?>
<br />

    */
    ?>
-->
