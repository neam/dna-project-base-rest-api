<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model','Exam Question Alternative'); ?>
    <small>
        <?php echo Yii::t('model','View')?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('ExamQuestionAlternative.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug')); ?>:</b>
<?php echo CHtml::encode($model->slug); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('_markup')); ?>:</b>
<?php echo CHtml::encode($model->_markup); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('correct')); ?>:</b>
<?php echo CHtml::encode($model->correct); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_id')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('owner_id')); ?>:</b>
<?php echo CHtml::encode($model->owner_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($model->node_id); ?>
<br />

    */
    ?>
-->
