<?php
$this->breadcrumbs[Yii::t('crud', 'Section Contents')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Section Content') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
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

<b><?php echo CHtml::encode($model->getAttributeLabel('viz_view_id')); ?>:</b>
<?php echo CHtml::encode($model->viz_view_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('video_file_id')); ?>:</b>
<?php echo CHtml::encode($model->video_file_id); ?>
<br />

<?php /*
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

  <b><?php echo CHtml::encode($model->getAttributeLabel('p3_widget_id')); ?>:</b>
  <?php echo CHtml::encode($model->p3_widget_id); ?>
  <br />

 */ ?>


<h2>
	<?php echo Yii::t('crud', 'Data') ?></h2>

<p>
	<?php
	$this->widget('TbDetailView', array(
		'data' => $model,
		'attributes' => array(
			'id',
			array(
				'name' => 'section_id',
				'value' => ($model->section !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->section->title, array('section/view', 'id' => $model->section->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			'ordinal',
			'created',
			'modified',
			'viz_view_id',
			'video_file_id',
			'teachers_guide_id',
			'exercise_id',
			'presentation_id',
			'data_chunk_id',
			'p3_widget_id',
		),
	));
	?></p>

