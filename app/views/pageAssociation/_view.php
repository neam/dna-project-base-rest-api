<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_id')); ?>:</b>
	<?php echo CHtml::encode($data->page_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordinal')); ?>:</b>
	<?php echo CHtml::encode($data->ordinal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viz_view_id')); ?>:</b>
	<?php echo CHtml::encode($data->viz_view_id); ?>
	<br />

	<?php /*
	  <b><?php echo CHtml::encode($data->getAttributeLabel('video_file_id')); ?>:</b>
	  <?php echo CHtml::encode($data->video_file_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($data->getAttributeLabel('teachers_guide_id')); ?>:</b>
	  <?php echo CHtml::encode($data->teachers_guide_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	  <?php echo CHtml::encode($data->exercise_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($data->getAttributeLabel('presentation_id')); ?>:</b>
	  <?php echo CHtml::encode($data->presentation_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($data->getAttributeLabel('data_chunk_id')); ?>:</b>
	  <?php echo CHtml::encode($data->data_chunk_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($data->getAttributeLabel('header_id')); ?>:</b>
	  <?php echo CHtml::encode($data->header_id); ?>
	  <br />

	  <b><?php echo CHtml::encode($data->getAttributeLabel('p3_widget_id')); ?>:</b>
	  <?php echo CHtml::encode($data->p3_widget_id); ?>
	  <br />

	 */ ?>

</div>
