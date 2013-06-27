<div class="view">

	<?php if (!is_null($data->processed_media_id)): ?>

		TODO: Actually include mediaelement

	<?php else: ?>

		<div class="alert">
			<?php echo Yii::t('app', 'No processed media file available'); ?>
		</div>

	<?php endif; ?>

	<?php if (Yii::app()->user->checkAccess('VideoFile.*')): ?>
		<div class="admin-container show">
			<?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('crud', 'Update {model}', array('{model}' => Yii::t('crud', 'Video File'))), array('videoFile/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
		</div>
	<?php endif; ?>

</div>
