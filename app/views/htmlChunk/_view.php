<div class="view">

	<?php echo $data->markup; ?>

	<div class="admin-container show">
		<?php echo CHtml::link('<i class="icon-edit"></i> Update Html Chunk', array('htmlChunk/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
	</div>

</div>
