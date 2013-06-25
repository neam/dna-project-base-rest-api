<div class="view">

	<?php if (!is_null($data->processed_media_id)): ?>

		TODO: Actually include mediaelement

	<?php else: ?>

		<div class="alert">
			<?php echo Yii::t('app', 'No processed media file available'); ?>
		</div>

	<?php endif; ?>

</div>
