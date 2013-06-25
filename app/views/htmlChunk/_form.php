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
		'id' => 'html-chunk-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
		'type' => 'horizontal',
	));

	echo $form->errorSummary($model);
	?>
	<div class="row">
		<div class="span8"> <!-- main inputs -->

			<?php
			$editorOptions = array('class' => 'span4', 'rows' => 5, 'options' => array(
					'locale' => 'en',
					'link' => true,
					'image' => false,
					'color' => false,
					'html' => true,
			));

			$this->widget('bootstrap.widgets.TbTabs', array(
				'tabs' => array(
					array('label' => 'en', 'content' => $form->html5EditorRow($model, 'markup_en', $editorOptions), 'active' => true),
					array('label' => 'de', 'content' => $form->html5EditorRow($model, 'markup_de', $editorOptions)),
					array('label' => 'foo', 'content' => $form->html5EditorRow($model, 'markup_foo', $editorOptions)),
				),
			));
			?>

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