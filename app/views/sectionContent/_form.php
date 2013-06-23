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
		'id' => 'section-content-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
		'type' => 'horizontal',
	));

	echo $form->errorSummary($model);
	?>
	<div class="row">
		<div class="span8"> <!-- main inputs -->


			<?php
			echo $form->relationRow($model, 'section_id', array(
				'model' => $model,
				'relation' => 'section',
				'fields' => 'title',
				'allowEmpty' => false,
				'style' => 'dropdownlist',
				'htmlOptions' => array(
					'checkAll' => 'all',
				),
			    ), array('class' => 'span5'));
			?>

			<?php echo $form->textFieldRow($model, 'ordinal', array('class' => 'span5')); ?>

			<?php
			echo $form->relationRow($model, 'html_chunk_id', array(
				'model' => $model,
				'relation' => 'htmlChunk',
				'fields' => 'modified',
				'allowEmpty' => true,
				'style' => 'dropdownlist',
				'htmlOptions' => array(
					'checkAll' => 'all',
				),
			    ), array('class' => 'span5'));
			?>

			<?php
			echo $form->relationRow($model, 'viz_view_id', array(
				'model' => $model,
				'relation' => 'vizView',
				'fields' => 'title',
				'allowEmpty' => true,
				'style' => 'dropdownlist',
				'htmlOptions' => array(
					'checkAll' => 'all',
				),
			    ), array('class' => 'span5'));
			?>

			<?php
			echo $form->relationRow($model, 'video_file_id', array(
				'model' => $model,
				'relation' => 'videoFile',
				'fields' => 'title',
				'allowEmpty' => true,
				'style' => 'dropdownlist',
				'htmlOptions' => array(
					'checkAll' => 'all',
				),
			    ), array('class' => 'span5'));
			?>

			<?php
			echo $form->relationRow($model, 'teachers_guide_id', array(
				'model' => $model,
				'relation' => 'teachersGuide',
				'fields' => 'title',
				'allowEmpty' => true,
				'style' => 'dropdownlist',
				'htmlOptions' => array(
					'checkAll' => 'all',
				),
			    ), array('class' => 'span5'));
			?>

			<?php
			echo $form->relationRow($model, 'exercise_id', array(
				'model' => $model,
				'relation' => 'exercise',
				'fields' => 'title',
				'allowEmpty' => true,
				'style' => 'dropdownlist',
				'htmlOptions' => array(
					'checkAll' => 'all',
				),
			    ), array('class' => 'span5'));
			?>

			<?php
			echo $form->relationRow($model, 'presentation_id', array(
				'model' => $model,
				'relation' => 'presentation',
				'fields' => 'title',
				'allowEmpty' => true,
				'style' => 'dropdownlist',
				'htmlOptions' => array(
					'checkAll' => 'all',
				),
			    ), array('class' => 'span5'));
			?>

			<?php
			echo $form->relationRow($model, 'data_chunk_id', array(
				'model' => $model,
				'relation' => 'dataChunk',
				'fields' => 'title',
				'allowEmpty' => true,
				'style' => 'dropdownlist',
				'htmlOptions' => array(
					'checkAll' => 'all',
				),
			    ), array('class' => 'span5'));
			?>
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