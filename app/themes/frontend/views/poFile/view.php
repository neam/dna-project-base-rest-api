<?php
$this->breadcrumbs[Yii::t('model', 'Po Files')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model','Po File'); ?>
    <small>
        <?php echo Yii::t('model','View')?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('PoFile.*')): ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
<?php echo CHtml::encode($model->title); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>:</b>
<?php echo CHtml::encode($model->about); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('original_media_id')); ?>:</b>
<?php echo CHtml::encode($model->original_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_en')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_en); ?>
<br />

<?php /*
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

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_es')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_de')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id_en')); ?>:</b>
<?php echo CHtml::encode($model->po_file_qa_state_id_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id_es')); ?>:</b>
<?php echo CHtml::encode($model->po_file_qa_state_id_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id_fa')); ?>:</b>
<?php echo CHtml::encode($model->po_file_qa_state_id_fa); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id_hi')); ?>:</b>
<?php echo CHtml::encode($model->po_file_qa_state_id_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id_pt')); ?>:</b>
<?php echo CHtml::encode($model->po_file_qa_state_id_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id_sv')); ?>:</b>
<?php echo CHtml::encode($model->po_file_qa_state_id_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id_cn')); ?>:</b>
<?php echo CHtml::encode($model->po_file_qa_state_id_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id_de')); ?>:</b>
<?php echo CHtml::encode($model->po_file_qa_state_id_de); ?>
<br />

    */
    ?>
-->
