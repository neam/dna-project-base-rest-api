<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>

<!--<h1>
    
    <?php echo Yii::t('model', 'Section Content'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('SectionContent.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('section_id')); ?>:</b>
<?php echo CHtml::encode($model->section_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('ordinal')); ?>:</b>
<?php echo CHtml::encode($model->ordinal); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('html_chunk_id')); ?>:</b>
<?php echo CHtml::encode($model->html_chunk_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('snapshot_id')); ?>:</b>
<?php echo CHtml::encode($model->snapshot_id); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_id')); ?>:</b>
<?php echo CHtml::encode($model->video_file_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exercise_id')); ?>:</b>
<?php echo CHtml::encode($model->exercise_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slideshow_file_id')); ?>:</b>
<?php echo CHtml::encode($model->slideshow_file_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_id')); ?>:</b>
<?php echo CHtml::encode($model->data_chunk_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('download_link_id')); ?>:</b>
<?php echo CHtml::encode($model->download_link_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('exam_question_id')); ?>:</b>
<?php echo CHtml::encode($model->exam_question_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($model->node_id); ?>
<br />

    */
?>
-->
