<?php
$this->breadcrumbs[] = Yii::t('crud', 'Section Contents');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('section-content-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Section Contents'); ?> <small><?php echo Yii::t('crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->widget('TbGridView', array(
	'id' => 'section-content-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		array(
			'name' => 'section_id',
			'value' => 'CHtml::value($data,\'section.chapter_id\')',
			'filter' => CHtml::listData(Section::model()->findAll(), 'id', 'chapter_id'),
		),
		'ordinal',
		'created',
		'modified',
		array(
			'name' => 'html_chunk_id',
			'value' => 'CHtml::value($data,\'htmlChunk.markup\')',
			'filter' => CHtml::listData(HtmlChunk::model()->findAll(), 'id', 'markup'),
		),
		array(
			'name' => 'viz_view_id',
			'value' => 'CHtml::value($data,\'vizView.title\')',
			'filter' => CHtml::listData(VizView::model()->findAll(), 'id', 'title'),
		),
		/*
		  array(
		  'name'=>'video_file_id',
		  'value'=>'CHtml::value($data,\'videoFile.title\')',
		  'filter'=>CHtml::listData(VideoFile::model()->findAll(), 'id', 'title'),
		  ),
		  array(
		  'name'=>'teachers_guide_id',
		  'value'=>'CHtml::value($data,\'teachersGuide.title\')',
		  'filter'=>CHtml::listData(TeachersGuide::model()->findAll(), 'id', 'title'),
		  ),
		  array(
		  'name'=>'exercise_id',
		  'value'=>'CHtml::value($data,\'exercise.title\')',
		  'filter'=>CHtml::listData(Exercise::model()->findAll(), 'id', 'title'),
		  ),
		  array(
		  'name'=>'presentation_id',
		  'value'=>'CHtml::value($data,\'presentation.title\')',
		  'filter'=>CHtml::listData(Presentation::model()->findAll(), 'id', 'title'),
		  ),
		  array(
		  'name'=>'data_chunk_id',
		  'value'=>'CHtml::value($data,\'dataChunk.title\')',
		  'filter'=>CHtml::listData(DataChunk::model()->findAll(), 'id', 'title'),
		  ),
		  array(
		  'name'=>'download_link_id',
		  'value'=>'CHtml::value($data,\'downloadLink.title\')',
		  'filter'=>CHtml::listData(DownloadLink::model()->findAll(), 'id', 'title'),
		  ),
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
