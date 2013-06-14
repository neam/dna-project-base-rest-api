<?php
$this->breadcrumbs['Page Associations'] = array('index');
$this->breadcrumbs[] = $model->id;

if (!$this->menu)
	$this->menu = array(
		array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
		array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
		array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
		array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
		array('label' => Yii::t('app', 'List'), 'url' => array('index')),
	);
?>

<h1><?php echo Yii::t('app', 'View'); ?> PageAssociation <?php echo $model->id; ?></h1>

<div class="view">

	<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('page_id')); ?>:</b>
	<?php echo CHtml::encode($model->page_id); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('ordinal')); ?>:</b>
	<?php echo CHtml::encode($model->ordinal); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($model->title); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($model->created); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($model->modified); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('viz_view_id')); ?>:</b>
	<?php echo CHtml::encode($model->viz_view_id); ?>
	<br />

	<?php /*
	  <b><?php echo CHtml::encode($model->getAttributeLabel('video_file_id')); ?>:</b>
	  <?php echo CHtml::encode($model->video_file_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($model->getAttributeLabel('teachers_guide_id')); ?>:</b>
	  <?php echo CHtml::encode($model->teachers_guide_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($model->getAttributeLabel('exercise_id')); ?>:</b>
	  <?php echo CHtml::encode($model->exercise_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($model->getAttributeLabel('presentation_id')); ?>:</b>
	  <?php echo CHtml::encode($model->presentation_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($model->getAttributeLabel('data_chunk_id')); ?>:</b>
	  <?php echo CHtml::encode($model->data_chunk_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($model->getAttributeLabel('header_id')); ?>:</b>
	  <?php echo CHtml::encode($model->header_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($model->getAttributeLabel('p3_widget_id')); ?>:</b>
	  <?php echo CHtml::encode($model->p3_widget_id); ?>
	  <br />

	 */ ?>

</div>

