<div class="view">

	<?php if (!is_null($data->viz_view_id)): ?>
		<?php $this->renderPartial('/vizView/_view', array('data' => $data->vizView)); ?>
	<?php endif; ?>

	<?php if (!is_null($data->video_file_id)): ?>
		<?php $this->renderPartial('/videoFile/_view', array('data' => $data->videoFile)); ?>
	<?php endif; ?>

	<?php if (!is_null($data->teachers_guide_id)): ?>
		<?php $this->renderPartial('/teachersGuide/_view', array('data' => $data->teachersGuide)); ?>
	<?php endif; ?>

	<?php if (!is_null($data->exercise_id)): ?>
		<?php $this->renderPartial('/exercise/_view', array('data' => $data->exercise)); ?>
	<?php endif; ?>

	<?php if (!is_null($data->presentation_id)): ?>
		<?php $this->renderPartial('/presentation/_view', array('data' => $data->presentation)); ?>
	<?php endif; ?>

	<?php if (!is_null($data->data_chunk_id)): ?>
		<?php $this->renderPartial('/dataChunk/_view', array('data' => $data->dataChunk)); ?>
	<?php endif; ?>

</div>
