<div class="view">

	<?php echo $data->markup; ?>

	<?php if (Yii::app()->user->checkAccess('HtmlChunk.*')): ?>
		<div class="admin-container show">
			<?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('crud', 'Update {model}', array('{model}' => Yii::t('crud', 'Html Chunk'))), array('htmlChunk/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
		</div>
	<?php endif; ?>

</div>
