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
		<?php echo $form->label($model, 'section_id'); ?>
		<?php echo $form->dropDownList($model, 'section_id', CHtml::listData(Section::model()->findAll(), 'id', 'chapter_id'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ordinal'); ?>
		<?php echo $form->textField($model, 'ordinal'); ?>
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
		<?php echo $form->label($model, 'p3_page_id'); ?>
		<?php echo $form->dropDownList($model, 'p3_page_id', CHtml::listData(P3Page::model()->findAll(), 'id', 'layout'), array('prompt' => 'all')); ?>
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

        <div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->
