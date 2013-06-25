<div class="">
	<p class="alert">
		<?php echo Yii::t('crud', 'Fields with <span class="required">*</span> are required.'); ?>
	</p>


	<?php
	$this->widget('echosen.EChosen', array('target' => 'select')
	);
	?>
	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'viz-view-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
		'type' => 'horizontal',
	));

	echo $form->errorSummary($model);
	?>
	<div class="row">
		<div class="span8"> <!-- main inputs -->


			<?php echo $form->textFieldRow($model, 'title', array('maxlength' => 255)); ?>

			<?php echo $form->textFieldRow($model, 'created', array()); ?>

			<?php echo $form->textFieldRow($model, 'modified', array()); ?>
		</div> <!-- main inputs -->


		<div class="span4"> <!-- sub inputs -->

		</div> <!-- sub inputs -->
	</div>


	<div class="form-actions">

		<?php
		echo CHtml::Button(Yii::t('crud', 'Cancel'), array(
			'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('vizview/admin'),
			'class' => 'btn'
		));
		echo ' ' . CHtml::submitButton(Yii::t('crud', 'Save'), array(
			'class' => 'btn btn-primary'
		));
		?>
	</div>

	<?php $this->endWidget() ?>
</div> <!-- form -->