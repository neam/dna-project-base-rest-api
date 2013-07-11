<div class="row">
	<div class="span8"> <!-- main inputs -->


		<?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'originalMedia',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'original_media_id', $input);
		?>

		<?php
		$formId = 'word-file-original_media_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/p3Media/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#WordFile_original_media_id',
			'model' => new P3Media,
			'pk' => 'id',
			'field' => 'title',
		));
		$this->endClip();
		?>


		<?php
		$input = $this->widget(
		    'Relation', array(
			'model' => $model,
			'relation' => 'processedMedia',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all'),
		    )
		    , true);
		echo $form->customRow($model, 'processed_media_id', $input);
		?>

		<?php
		$formId = 'word-file-processed_media_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/p3Media/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#WordFile_processed_media_id',
			'model' => new P3Media,
			'pk' => 'id',
			'field' => 'title',
		));
		$this->endClip();
		?>


		<?php echo $form->textFieldRow($model, 'title_es', array('maxlength' => 255)); ?>

		<?php echo $form->textFieldRow($model, 'title_fa', array('maxlength' => 255)); ?>

		<?php echo $form->textFieldRow($model, 'title_hi', array('maxlength' => 255)); ?>

		<?php echo $form->textFieldRow($model, 'title_pt', array('maxlength' => 255)); ?>

		<?php echo $form->textFieldRow($model, 'title_sv', array('maxlength' => 255)); ?>

		<?php echo $form->textFieldRow($model, 'title_de', array('maxlength' => 255)); ?>
	</div> <!-- main inputs -->


	<div class="span4"> <!-- sub inputs -->

	</div> <!-- sub inputs -->
</div>
