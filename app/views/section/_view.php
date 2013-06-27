<div class="view">

	<?php if (!empty($data->sectionContents)): ?>
		<?php foreach ($data->sectionContents as $foreignobj): ?>

			<?php
			$this->renderPartial('/sectionContent/_view', array("data" => $foreignobj));
			?>

		<?php endforeach; ?>

		<?php
	else:
		?>
		<div class="alert">
			<?php echo Yii::t('app', 'Section contains no sectionContents'); ?>
		</div>
	<?php
	endif;
	?>

	<?php if (Yii::app()->user->checkAccess('Section.*')): ?>
		<div class="admin-container show">
			<?php echo CHtml::link('<i class="icon-edit"></i> Update Section', array('section/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
		</div>
	<?php endif; ?>

</div>
