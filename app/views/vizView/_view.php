<div class="view">

	<?php echo str_replace("{language}", Yii::app()->language, $data->embed_template); ?>

	<?php if (Yii::app()->user->checkAccess('VizView.*')): ?>
		<div class="admin-container show">
			<?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('crud', 'Update {model}', array('{model}' => Yii::t('crud', 'Viz View'))), array('vizView/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
		</div>
	<?php endif; ?>

</div>
