<div class="row">
	<div class="span8"> <!-- main inputs -->


		<?php echo $form->textAreaRow($model, 'markup', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

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

