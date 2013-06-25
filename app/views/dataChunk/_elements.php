<div class="row">
	<div class="span8"> <!-- main inputs -->


		<?php echo $form->textFieldRow($model, 'title', array('maxlength' => 255)); ?>

		<?php
		echo $form->relationRow($model, 'data_source_id', array(
			'model' => $model,
			'relation' => 'dataSource',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Data Source'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#data-source-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php
		echo $form->relationRow($model, 'slideshow_file_id', array(
			'model' => $model,
			'relation' => 'slideshowFile',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Slideshow File'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#slideshow-file-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

	</div> <!-- main inputs -->


	<div class="span4"> <!-- sub inputs -->

	</div> <!-- sub inputs -->
</div>

<?php
$this->appendClip('modal_forms');
$this->renderPartial('/dataSource/_modal_form', array(
	'inputSelector' => '#DataChunk_data_source_id',
	'model' => new DataSource,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/slideshowFile/_modal_form', array(
	'inputSelector' => '#DataChunk_slideshow_file_id',
	'model' => new SlideshowFile,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
