<div class="view">

	<?php if (!is_null($data->html_chunk_id)): ?>
		<?php $this->renderPartial('/htmlChunk/_view', array('data' => $data->htmlChunk)); ?>
	<?php elseif (!is_null($data->viz_view_id)): ?>
		<?php $this->renderPartial('/vizView/_view', array('data' => $data->vizView)); ?>
	<?php elseif (!is_null($data->video_file_id)): ?>
		<?php $this->renderPartial('/videoFile/_view', array('data' => $data->videoFile)); ?>
	<?php elseif (!is_null($data->teachers_guide_id)): ?>
		<?php $this->renderPartial('/teachersGuide/_view', array('data' => $data->teachersGuide)); ?>
	<?php elseif (!is_null($data->exercise_id)): ?>
		<?php $this->renderPartial('/exercise/_view', array('data' => $data->exercise)); ?>
	<?php elseif (!is_null($data->presentation_id)): ?>
		<?php $this->renderPartial('/presentation/_view', array('data' => $data->presentation)); ?>
	<?php elseif (!is_null($data->data_chunk_id)): ?>
		<?php $this->renderPartial('/dataChunk/_view', array('data' => $data->dataChunk)); ?>
	<?php else: ?>
		<?php echo Yii::t('app', 'Section content has no linked content'); ?>
	<?php endif; ?>

</div>
