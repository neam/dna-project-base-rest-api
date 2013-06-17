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
		'id' => 'video-file-form',
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
					<?php echo $form->labelEx($model, 'type'); ?>
					<?php
					echo CHtml::activeDropDownList($model, 'type', array(
						'chapter' => 'chapter',
						'country-page' => 'country-page',
					));
					?>
					<?php echo $form->error($model, 'type'); ?>
					<?php
					if ('help.type' != $help = Yii::t('crud', 'help.type'))
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

			<?php
			$this->widget(
			    'bootstrap.widgets.TbButton', array(
				'label' => Yii::t('P3WidgetsModule.crud', 'Upload Files'),
				//'url' => array('/p3media/import/uploadPopup'),
				'htmlOptions' => array(
					'class' => 'btn-primary',
					'onclick' => 'window.open("' . $this->createUrl(
					    '/p3media/import/uploadPopup'
					) . '", "Upload", "width=800,height=800");',
					'target' => '_blank'
				)
			    )
			);
			?>


			<div class="row-fluid input-block-level-container">
				<div class="span12">
					<label for="originalMedia"><?php echo Yii::t('crud', 'OriginalMedia'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'originalMedia',
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
					<label for="processedMedia"><?php echo Yii::t('crud', 'ProcessedMedia'); ?></label>
					<?php
					$this->widget(
					    'Relation', array(
						'model' => $model,
						'relation' => 'processedMedia',
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

		</div> <!-- main inputs -->


		<div class="span4"> <!-- sub inputs -->

		</div> <!-- sub inputs -->
	</div>


	<div class="form-actions">

		<?php
		echo CHtml::Button(Yii::t('crud', 'Cancel'), array(
			'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('videofile/admin'),
			'class' => 'btn'
		));
		echo ' ' . CHtml::submitButton(Yii::t('crud', 'Save'), array(
			'class' => 'btn btn-primary'
		));
		?>
	</div>

	<?php $this->endWidget() ?>
</div> <!-- form -->