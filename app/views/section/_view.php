<div class="view">

	<?php if (!empty($data->sectionContents)): ?>
		<?php foreach ($data->sectionContents as $foreignobj): ?>

			<?php
			$this->renderPartial('/sectionContent/_view', array("data" => $foreignobj));
			?>

		<?php endforeach; ?>

		<?php
	else:
		echo Yii::t('app', 'Section contains no sectionContents');
	endif;
	?>

</div>