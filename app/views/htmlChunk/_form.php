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
		'id' => 'html-chunk-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
	));

	echo $form->errorSummary($model);
	?>
	<div class="row">
		<div class="span8"> <!-- main inputs -->


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'markup'); ?>

					<?php echo $form->textArea($model, 'markup', array('rows' => 6, 'cols' => 50)); ?>
					<?php echo $form->error($model, 'markup'); ?>
					<?php
					if ('help.markup' != $help = Yii::t('crud', 'help.markup'))
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
			'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('htmlchunk/admin'),
			'class' => 'btn'
		));
		echo ' ' . CHtml::submitButton(Yii::t('crud', 'Save'), array(
			'class' => 'btn btn-primary'
		));
		?>
	</div>

	<?php $this->endWidget() ?>
</div> <!-- form -->