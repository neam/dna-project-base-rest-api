<div class="wide form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
	));
	?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id', array('size' => 20, 'maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'page_id'); ?>
		<?php echo $form->dropDownList($model, 'page_id', CHtml::listData(Page::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ordinal'); ?>
		<?php echo $form->textField($model, 'ordinal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'modified'); ?>
		<?php echo $form->textField($model, 'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'viz_view_id'); ?>
		<?php echo $form->dropDownList($model, 'viz_view_id', CHtml::listData(VizView::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'video_file_id'); ?>
		<?php echo $form->dropDownList($model, 'video_file_id', CHtml::listData(VideoFile::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'teachers_guide_id'); ?>
		<?php echo $form->dropDownList($model, 'teachers_guide_id', CHtml::listData(TeachersGuide::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'exercise_id'); ?>
		<?php echo $form->dropDownList($model, 'exercise_id', CHtml::listData(Exercise::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'presentation_id'); ?>
		<?php echo $form->dropDownList($model, 'presentation_id', CHtml::listData(Presentation::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_chunk_id'); ?>
		<?php echo $form->dropDownList($model, 'data_chunk_id', CHtml::listData(DataChunk::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'header_id'); ?>
		<?php echo $form->dropDownList($model, 'header_id', CHtml::listData(Header::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'p3_widget_id'); ?>
		<?php echo $form->dropDownList($model, 'p3_widget_id', CHtml::listData(P3Widget::model()->findAll(), 'id', 'alias'), array('prompt' => 'all')); ?>
	</div>

        <div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->
