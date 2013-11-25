<?php
$this->breadcrumbs[Yii::t('model', 'Text Doc Qa States')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model','Text Doc Qa State'); ?>
    <small>
        <?php echo Yii::t('model','View')?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('TextDocQaState.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($model->status); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('draft_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->draft_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('preview_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->preview_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('public_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->public_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('approval_progress')); ?>:</b>
<?php echo CHtml::encode($model->approval_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('proofing_progress')); ?>:</b>
<?php echo CHtml::encode($model->proofing_progress); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('translations_draft_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_draft_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translations_preview_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_preview_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translations_public_validation_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_public_validation_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translations_approval_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_approval_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('translations_proofing_progress')); ?>:</b>
<?php echo CHtml::encode($model->translations_proofing_progress); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('previewing_welcome')); ?>:</b>
<?php echo CHtml::encode($model->previewing_welcome); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('candidate_for_public_status')); ?>:</b>
<?php echo CHtml::encode($model->candidate_for_public_status); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_approved')); ?>:</b>
<?php echo CHtml::encode($model->slug_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_approved')); ?>:</b>
<?php echo CHtml::encode($model->title_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('file_approved')); ?>:</b>
<?php echo CHtml::encode($model->file_approved); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_proofed')); ?>:</b>
<?php echo CHtml::encode($model->slug_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title_proofed')); ?>:</b>
<?php echo CHtml::encode($model->title_proofed); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('file_proofed')); ?>:</b>
<?php echo CHtml::encode($model->file_proofed); ?>
<br />

    */
    ?>
-->
