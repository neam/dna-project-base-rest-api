<div class="row">
	<div class="span8"> <!-- main inputs -->


		<?php echo $form->textFieldRow($model, 'title', array('maxlength' => 255)); ?>

		<?php
		echo $form->relationRow($model, 'original_media_id', array(
			'model' => $model,
			'relation' => 'originalMedia',
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
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#p3-media-form-modal',
					),
				    ), true);
				?>
                        </div>
		</div>


		<?php
		echo $form->relationRow($model, 'processed_media_id', array(
			'model' => $model,
			'relation' => 'processedMedia',
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
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#p3-media-form-modal',
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
$this->renderPartial('/p3Media/_modal_form', array(
	'inputSelector' => '#SlideshowFile_original_media_id',
	'model' => new P3Media,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
<?php
$this->appendClip('modal_forms');
$this->renderPartial('/p3Media/_modal_form', array(
	'inputSelector' => '#SlideshowFile_processed_media_id',
	'model' => new P3Media,
	'pk' => 'id',
	'field' => 'title',
));
$this->endClip();
?>
