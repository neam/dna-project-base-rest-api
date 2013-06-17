<div class="">
	<p class="alert">
		<?php echo Yii::t('crud', 'Fields with <span class="required">*</span> are required.'); ?>
	</p>


	<?php
	$this->widget('echosen.EChosen', array('target' => 'select')
	);
	?>
	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'teachers-guide-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
	));

	echo $form->errorSummary($model);
	?>
	<div class="row">
		<div class="span8"> <!-- main inputs -->


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'title'); ?>

					<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
					<?php echo $form->error($model, 'title'); ?>
					<?php
					if ('help.title' != $help = Yii::t('crud', 'help.title'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'created'); ?>
					<?php echo $form->textField($model, 'created'); ?>
					<?php echo $form->error($model, 'created'); ?>
					<?php
					if ('help.created' != $help = Yii::t('crud', 'help.created'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'modified'); ?>
					<?php echo $form->textField($model, 'modified'); ?>
					<?php echo $form->error($model, 'modified'); ?>
					<?php
					if ('help.modified' != $help = Yii::t('crud', 'help.modified'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>

		</div> <!-- main inputs -->


		<div class="span4"> <!-- sub inputs -->

		</div> <!-- sub inputs -->
	</div>


	<div class="form-actions">

		<?php
		echo CHtml::Button(Yii::t('crud', 'Cancel'), array(
			'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('teachersguide/admin'),
			'class' => 'btn'
		));
		echo ' ' . CHtml::submitButton(Yii::t('crud', 'Save'), array(
			'class' => 'btn btn-primary'
		));
		?>
	</div>

	<?php $this->endWidget() ?>
</div> <!-- form -->