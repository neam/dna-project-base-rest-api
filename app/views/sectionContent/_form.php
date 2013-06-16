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
					<label for="p3Page"><?php echo Yii::t('crud', 'P3Page'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'p3Page',
						'fields' => 'nameId',
						'allowEmpty' => true,
						'style' => 'dropdownlist',
						'htmlOptions' => array(
							'checkAll' => 'all'),
					    )
					)
					?>
				</div>
			</div>

			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<label for="vizView"><?php echo Yii::t('crud', 'VizView'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'vizView',
						'fields' => 'title',
						'allowEmpty' => true,
						'style' => 'dropdownlist',
						'htmlOptions' => array(
							'checkAll' => 'all'),
					    )
					)
					?>
				</div>
			</div>

			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<label for="videoFile"><?php echo Yii::t('crud', 'VideoFile'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'videoFile',
						'fields' => 'title',
						'allowEmpty' => true,
						'style' => 'dropdownlist',
						'htmlOptions' => array(
							'checkAll' => 'all'),
					    )
					)
					?>
				</div>
			</div>

			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<label for="teachersGuide"><?php echo Yii::t('crud', 'TeachersGuide'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'teachersGuide',
						'fields' => 'title',
						'allowEmpty' => true,
						'style' => 'dropdownlist',
						'htmlOptions' => array(
							'checkAll' => 'all'),
					    )
					)
					?>
				</div>
			</div>

			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<label for="exercise"><?php echo Yii::t('crud', 'Exercise'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'exercise',
						'fields' => 'title',
						'allowEmpty' => true,
						'style' => 'dropdownlist',
						'htmlOptions' => array(
							'checkAll' => 'all'),
					    )
					)
					?>
				</div>
			</div>

			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<label for="presentation"><?php echo Yii::t('crud', 'Presentation'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'presentation',
						'fields' => 'title',
						'allowEmpty' => true,
						'style' => 'dropdownlist',
						'htmlOptions' => array(
							'checkAll' => 'all'),
					    )
					)
					?>
				</div>
			</div>

			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<label for="dataChunk"><?php echo Yii::t('crud', 'DataChunk'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'dataChunk',
						'fields' => 'title',
						'allowEmpty' => true,
						'style' => 'dropdownlist',
						'htmlOptions' => array(
							'checkAll' => 'all'),
					    )
					)
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