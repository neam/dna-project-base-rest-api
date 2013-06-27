<div class="row">
	<div class="span8"> <!-- main inputs -->


		<?php
		echo $form->relationRow($model, 'chapter_id', array(
			'model' => $model,
			'relation' => 'chapter',
			'fields' => 'title',
			'allowEmpty' => false,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<?php
		$formId = 'section-chapter_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Chapter'))),
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
		$this->renderPartial('/chapter/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#Section_chapter_id',
			'model' => new Chapter,
			'pk' => 'id',
			'field' => 'title',
		));
		$this->endClip();
		?>


		<?php echo $form->textFieldRow($model, 'title', array('maxlength' => 255)); ?>

		<?php echo $form->textFieldRow($model, 'slug', array('maxlength' => 255)); ?>

		<?php echo $form->textFieldRow($model, 'ordinal'); ?>

		<?php echo $form->textFieldRow($model, 'menu_label', array('maxlength' => 255)); ?>
	</div> <!-- main inputs -->


	<div class="span4"> <!-- sub inputs -->

	</div> <!-- sub inputs -->
</div>
