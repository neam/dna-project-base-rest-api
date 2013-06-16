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
		'id' => 'section-content-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
	));

	echo $form->errorSummary($model);
	?>
	<div class="row">
		<div class="span8"> <!-- main inputs -->


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'ordinal'); ?>

					<?php echo $form->textField($model, 'ordinal'); ?>
					<?php echo $form->error($model, 'ordinal'); ?>
					<?php
					if ('help.ordinal' != $help = Yii::t('crud', 'help.ordinal'))
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


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'viz_view_id'); ?>
					<?php echo $form->textField($model, 'viz_view_id', array('size' => 20, 'maxlength' => 20)); ?>
					<?php echo $form->error($model, 'viz_view_id'); ?>
					<?php
					if ('help.viz_view_id' != $help = Yii::t('crud', 'help.viz_view_id'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'video_file_id'); ?>
					<?php echo $form->textField($model, 'video_file_id', array('size' => 20, 'maxlength' => 20)); ?>
					<?php echo $form->error($model, 'video_file_id'); ?>
					<?php
					if ('help.video_file_id' != $help = Yii::t('crud', 'help.video_file_id'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'teachers_guide_id'); ?>
					<?php echo $form->textField($model, 'teachers_guide_id', array('size' => 20, 'maxlength' => 20)); ?>
					<?php echo $form->error($model, 'teachers_guide_id'); ?>
					<?php
					if ('help.teachers_guide_id' != $help = Yii::t('crud', 'help.teachers_guide_id'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'exercise_id'); ?>
					<?php echo $form->textField($model, 'exercise_id', array('size' => 20, 'maxlength' => 20)); ?>
					<?php echo $form->error($model, 'exercise_id'); ?>
					<?php
					if ('help.exercise_id' != $help = Yii::t('crud', 'help.exercise_id'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'presentation_id'); ?>
					<?php echo $form->textField($model, 'presentation_id', array('size' => 20, 'maxlength' => 20)); ?>
					<?php echo $form->error($model, 'presentation_id'); ?>
					<?php
					if ('help.presentation_id' != $help = Yii::t('crud', 'help.presentation_id'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'data_chunk_id'); ?>
					<?php echo $form->textField($model, 'data_chunk_id', array('size' => 20, 'maxlength' => 20)); ?>
					<?php echo $form->error($model, 'data_chunk_id'); ?>
					<?php
					if ('help.data_chunk_id' != $help = Yii::t('crud', 'help.data_chunk_id'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<?php echo $form->labelEx($model, 'p3_widget_id'); ?>
					<?php echo $form->textField($model, 'p3_widget_id'); ?>
					<?php echo $form->error($model, 'p3_widget_id'); ?>
					<?php
					if ('help.p3_widget_id' != $help = Yii::t('crud', 'help.p3_widget_id'))
					{
						echo "<span class='help-block'>{$help}</span>";
					}
					?>
				</div>
			</div>

			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<label for="section"><?php echo Yii::t('crud', 'Section'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'section',
						'fields' => 'title',
						'allowEmpty' => false,
						'style' => 'dropdownlist',
						'htmlOptions' => array(
							'checkAll' => 'all'),
					    )
					)
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
			'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('sectioncontent/admin'),
			'class' => 'btn'
		));
		echo ' ' . CHtml::submitButton(Yii::t('crud', 'Save'), array(
			'class' => 'btn btn-primary'
		));
		?>
	</div>

	<?php $this->endWidget() ?>
</div> <!-- form -->