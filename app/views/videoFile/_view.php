<div class="view">

	<?php if (!is_null($data->processed_media_id)): ?>

		TODO: Actually include mediaelement

	<?php else: ?>

		<div class="alert">
			<?php echo Yii::t('app', 'No processed media file available'); ?>
		</div>

	<?php endif; ?>
	<div class="admin-container show">
		<?php echo CHtml::link('<i class="icon-edit"></i> Update Video File', array('videoFile/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
	</div>

</div>
