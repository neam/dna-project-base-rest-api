<?php
//$this->breadcrumbs[Yii::t('crud', 'Chapters')] = array('index');
$this->breadcrumbs[] = $model->title;

// Deps for smooth scroll
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$smootScrollJs = Yii::app()->assetManager->publish(Yii::getPathOfAlias('vendor.kswedberg.jquery-smooth-scroll') . '/jquery.smooth-scroll.js');
$cs->registerScriptFile($smootScrollJs, CClientScript::POS_HEAD);
?>

<script>
	$(function() {

		// smooth scroll
		$('a').smoothScroll({
			afterScroll: function(e) {
				// Necessary to do manually
				window.location.hash = e.scrollTarget;
			}
		});

		// side bar affix (disabled since G3 gs does not sport affix behavior)
		/*
		 var $window = $(window)
		 setTimeout(function() {
		 $('.bs-docs-sidenav').affix({
		 offset: {
		 top: function() {
		 return $window.width() <= 980 ? 290 : 210
		 }
		 , bottom: 270
		 }
		 })
		 }, 100);
		 */

	});
</script>

<div class="row">
	<div class="span3 bs-docs-sidebar">
		<?php if (is_array($model->sections)): ?>
			<ul class="nav nav-list bs-docs-sidenav affix">

				<?php
				foreach ($model->sections as $i => $foreignobj)
				{
					echo CHtml::openTag('li', array('class' => $i == 0 ? 'active' : null));
					echo CHtml::link('<i class="icon-chevron-right"></i> ' . $foreignobj->menu_label, '#' . $foreignobj->slug);
					echo CHtml::closeTag('li');
				}
				?>
			</ul>
			<?php
		else:
			echo 'No associations';
		endif;
		?>

	</div>
	<div class="span9">

		<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
		<!--<h1><?php echo Yii::t('crud', 'Chapter') ?> <small><?php echo CHtml::encode($model->title); ?></small></h1>-->

		<?php //$this->renderPartial("_toolbar", array("model" => $model)); ?>

		<?php if (is_array($model->sections)): ?>
			<?php foreach ($model->sections as $foreignobj): ?>

				<section id="<?= $foreignobj->slug ?>">

					<div class="page-header">
						<h1><?= $foreignobj->title ?></h1>
					</div>

					Actual contents TODO i18n

				</section>

			<?php endforeach; ?>

			<?php
		else:
			echo 'Chapter contains no sections';
		endif;
		?>

	</div>
</div>
