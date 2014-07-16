<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model', 'I18n Catalog'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('I18nCatalog.*')): ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('i18n_category')); ?>:</b>
<?php echo CHtml::encode($model->i18n_category); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('po_contents')); ?>:</b>
<?php echo CHtml::encode($model->po_contents); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('pot_import_media_id')); ?>:</b>
<?php echo CHtml::encode($model->pot_import_media_id); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('i18n_catalog_qa_state_id')); ?>:</b>
<?php echo CHtml::encode($model->i18n_catalog_qa_state_id); ?>
<br />

    */
?>
-->
