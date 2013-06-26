<div class="row">
	<div class="span12"> <!-- main inputs -->

		<?php
		$editorOptions = array(
			'rows' => 5,
			'options' => array(
				//'locale' => 'en',
				'link' => true,
				'image' => false,
				'color' => false,
				'html' => true,
			),
			'width' => '98%', // necessary to workaround left border not showing
		);

		$this->widget('bootstrap.widgets.TbTabs', array(
			'tabs' => array(
				array('label' => 'en', 'content' => $form->html5EditorRow($model, 'markup', $editorOptions), 'active' => true),
				array('label' => 'de', 'content' => $form->html5EditorRow($model, 'markup_de', $editorOptions)),
				array('label' => 'foo', 'content' => $form->html5EditorRow($model, 'markup_foo', $editorOptions)),
			),
		));
		?>


	</div> <!-- main inputs -->

</div>

