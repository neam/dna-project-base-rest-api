<?php
$this->breadcrumbs[] = Yii::t('crud', 'Slideshow Files');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('slideshow-file-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Slideshow Files'); ?> <small><?php echo Yii::t('crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->widget('TbGridView', array(
	'id' => 'slideshow-file-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		'title',
		'created',
		'modified',
		array(
			'name' => 'original_media_id',
			'value' => 'CHtml::value($data,\'originalMedia.title\')',
			'filter' => CHtml::listData(P3Media::model()->findAll(), 'id', 'title'),
		),
		array(
			'name' => 'processed_media_id',
			'value' => 'CHtml::value($data,\'processedMedia.title\')',
			'filter' => CHtml::listData(P3Media::model()->findAll(), 'id', 'title'),
		),
		array(
			'class' => 'TbButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",
		),
	),
));
?>
