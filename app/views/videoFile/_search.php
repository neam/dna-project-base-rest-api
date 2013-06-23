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
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'created',
			'language' => substr(Yii::app()->language, 0, strpos(Yii::app()->language, '_')),
			'htmlOptions' => array('size' => 10),
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd hh:ii:ss',
			),
		    )
		);
		;
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'modified'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'modified',
			'language' => substr(Yii::app()->language, 0, strpos(Yii::app()->language, '_')),
			'htmlOptions' => array('size' => 10),
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd hh:ii:ss',
			),
		    )
		);
		;
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'original_media_id'); ?>
		<?php echo $form->dropDownList($model, 'original_media_id', CHtml::listData(P3Media::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'processed_media_id'); ?>
		<?php echo $form->dropDownList($model, 'processed_media_id', CHtml::listData(P3Media::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

        <div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->
