<?php
$this->breadcrumbs[] = Yii::t('crud', 'Data Chunks');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('data-chunk-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Data Chunks'); ?> <small><?php echo Yii::t('crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->widget('TbGridView', array(
	'id' => 'data-chunk-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		'title_en',
		'created',
		'modified',
		array(
			'name' => 'data_source_id',
			'value' => 'CHtml::value($data,\'dataSource.title_en\')',
			'filter' => CHtml::listData(DataSource::model()->findAll(), 'id', 'title_en'),
		),
		array(
			'name' => 'slideshow_file_id',
			'value' => 'CHtml::value($data,\'slideshowFile.title_en\')',
			'filter' => CHtml::listData(SlideshowFile::model()->findAll(), 'id', 'title_en'),
		),
		'title_es',
		/*
		  'title_fa',
		  'title_hi',
		  'title_pt',
		  'title_sv',
		  'title_de',
		 */
		array(
			'class' => 'TbButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",
		),
	),
));
?>
