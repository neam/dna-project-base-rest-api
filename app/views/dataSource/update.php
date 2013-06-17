<?php
$this->breadcrumbs[Yii::t('crud', 'Data Sources')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Data Source') ?> <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small></h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<h2>
	<?php echo Yii::t('crud', 'Editable Detail View') ?></h2>

<?php
$this->widget('EditableDetailView', array(
	'data' => $model,
	'url' => $this->createUrl('editableSaver'),
));
?>



<h2>
	<?php echo Yii::t('crud', 'Data Chunks'); ?> </h2>

<div class="btn-group">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons' => array(
			array('label' => Yii::t('crud', 'Create'), 'icon' => 'icon-plus', 'url' => array('dataChunk/create', 'data_source_id' => $model->id), array('class' => ''))
		),
	));
	?></div>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('dataChunks');
$this->widget('TbGridView', array(
	'id' => 'dataChunk-grid',
	'dataProvider' => $relatedSearchModel->search(),
	'filter' => $relatedSearchModel,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title',
			'editable' => array(
				'url' => $this->createUrl('dataChunk/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'created',
			'editable' => array(
				'url' => $this->createUrl('dataChunk/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'modified',
			'editable' => array(
				'url' => $this->createUrl('dataChunk/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'name' => 'slideshow_file_id',
			'value' => 'CHtml::value($data,\'slideshowFile.title\')',
			'filter' => CHtml::listData(SlideshowFile::model()->findAll(), 'id', 'title'),
		),
		array(
			'class' => 'TbButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('dataChunk/view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('dataChunk/update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('dataChunk/delete', array('id' => \$data->id))",
		),
	),
));
?>


<h2>
	<?php echo Yii::t('crud', 'Spreadsheet Files'); ?> </h2>

<div class="btn-group">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons' => array(
			array('label' => Yii::t('crud', 'Create'), 'icon' => 'icon-plus', 'url' => array('spreadsheetFile/create', 'data_source_id' => $model->id), array('class' => ''))
		),
	));
	?></div>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('spreadsheetFiles');
$this->widget('TbGridView', array(
	'id' => 'spreadsheetFile-grid',
	'dataProvider' => $relatedSearchModel->search(),
	'filter' => $relatedSearchModel,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title',
			'editable' => array(
				'url' => $this->createUrl('spreadsheetFile/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'created',
			'editable' => array(
				'url' => $this->createUrl('spreadsheetFile/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'modified',
			'editable' => array(
				'url' => $this->createUrl('spreadsheetFile/editableSaver'),
				'placement' => 'right',
			)
		),
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
			'viewButtonUrl' => "Yii::app()->controller->createUrl('spreadsheetFile/view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('spreadsheetFile/update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('spreadsheetFile/delete', array('id' => \$data->id))",
		),
	),
));
?>


<h2>
	<?php echo Yii::t('crud', 'Update Form') ?></h2>

<?php
$this->renderPartial('_form', array(
	'model' => $model));
?>
