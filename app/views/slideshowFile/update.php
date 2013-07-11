<?php
$this->breadcrumbs[Yii::t('crud', 'Slideshow Files')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Slideshow File') ?> <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small></h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->renderPartial('_form', array(
	'model' => $model));
?>

<?php
/*
  Code example to include an editable detail view:

  <h2>
  <?php echo Yii::t('crud','Editable Detail View')?></h2>

  <?php
  $this->widget('EditableDetailView', array(
  'data' => $model,
  'url' => $this->createUrl('editableSaver'),
  ));
  ?>

 */
?>



<h2>
	<?php echo Yii::t('crud', 'Data Chunks'); ?> </h2>

<div class="btn-group">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons' => array(
			array('label' => Yii::t('crud', 'Create'), 'icon' => 'icon-plus', 'url' => array('dataChunk/create', 'DataChunk' => array('slideshow_file_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
		),
	));
	?></div>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('dataChunks');
$this->widget('TbGridView', array(
	'id' => 'dataChunk-grid',
	'dataProvider' => $relatedSearchModel->search(),
	'filter' => count($model->dataChunks) > 1 ? $relatedSearchModel : null,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_en',
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
			'name' => 'data_source_id',
			'value' => 'CHtml::value($data,\'dataSource.title_en\')',
			'filter' => CHtml::listData(DataSource::model()->findAll(), 'id', 'title_en'),
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_es',
			'editable' => array(
				'url' => $this->createUrl('dataChunk/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_fa',
			'editable' => array(
				'url' => $this->createUrl('dataChunk/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_hi',
			'editable' => array(
				'url' => $this->createUrl('dataChunk/editableSaver'),
				'placement' => 'right',
			)
		),
		/*
		  array(
		  'class' => 'editable.EditableColumn',
		  'name' => 'title_pt',
		  'editable' => array(
		  'url' => $this->createUrl('dataChunk/editableSaver'),
		  'placement' => 'right',
		  )
		  ),
		  array(
		  'class' => 'editable.EditableColumn',
		  'name' => 'title_sv',
		  'editable' => array(
		  'url' => $this->createUrl('dataChunk/editableSaver'),
		  'placement' => 'right',
		  )
		  ),
		  array(
		  'class' => 'editable.EditableColumn',
		  'name' => 'title_de',
		  'editable' => array(
		  'url' => $this->createUrl('dataChunk/editableSaver'),
		  'placement' => 'right',
		  )
		  ),
		 */
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
	<?php echo Yii::t('crud', 'Exercises'); ?> </h2>

<div class="btn-group">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons' => array(
			array('label' => Yii::t('crud', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('slideshow_file_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
		),
	));
	?></div>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('exercises');
$this->widget('TbGridView', array(
	'id' => 'exercise-grid',
	'dataProvider' => $relatedSearchModel->search(),
	'filter' => count($model->exercises) > 1 ? $relatedSearchModel : null,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_en',
			'editable' => array(
				'url' => $this->createUrl('exercise/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'created',
			'editable' => array(
				'url' => $this->createUrl('exercise/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'modified',
			'editable' => array(
				'url' => $this->createUrl('exercise/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_es',
			'editable' => array(
				'url' => $this->createUrl('exercise/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_fa',
			'editable' => array(
				'url' => $this->createUrl('exercise/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_hi',
			'editable' => array(
				'url' => $this->createUrl('exercise/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_pt',
			'editable' => array(
				'url' => $this->createUrl('exercise/editableSaver'),
				'placement' => 'right',
			)
		),
		/*
		  array(
		  'class' => 'editable.EditableColumn',
		  'name' => 'title_sv',
		  'editable' => array(
		  'url' => $this->createUrl('exercise/editableSaver'),
		  'placement' => 'right',
		  )
		  ),
		  array(
		  'class' => 'editable.EditableColumn',
		  'name' => 'title_de',
		  'editable' => array(
		  'url' => $this->createUrl('exercise/editableSaver'),
		  'placement' => 'right',
		  )
		  ),
		 */
		array(
			'class' => 'TbButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('exercise/view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('exercise/update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('exercise/delete', array('id' => \$data->id))",
		),
	),
));
?>


<h2>
	<?php echo Yii::t('crud', 'Presentations'); ?> </h2>

<div class="btn-group">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons' => array(
			array('label' => Yii::t('crud', 'Create'), 'icon' => 'icon-plus', 'url' => array('presentation/create', 'Presentation' => array('slideshow_file_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
		),
	));
	?></div>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('presentations');
$this->widget('TbGridView', array(
	'id' => 'presentation-grid',
	'dataProvider' => $relatedSearchModel->search(),
	'filter' => count($model->presentations) > 1 ? $relatedSearchModel : null,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_en',
			'editable' => array(
				'url' => $this->createUrl('presentation/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'created',
			'editable' => array(
				'url' => $this->createUrl('presentation/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'modified',
			'editable' => array(
				'url' => $this->createUrl('presentation/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_es',
			'editable' => array(
				'url' => $this->createUrl('presentation/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_fa',
			'editable' => array(
				'url' => $this->createUrl('presentation/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_hi',
			'editable' => array(
				'url' => $this->createUrl('presentation/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title_pt',
			'editable' => array(
				'url' => $this->createUrl('presentation/editableSaver'),
				'placement' => 'right',
			)
		),
		/*
		  array(
		  'class' => 'editable.EditableColumn',
		  'name' => 'title_sv',
		  'editable' => array(
		  'url' => $this->createUrl('presentation/editableSaver'),
		  'placement' => 'right',
		  )
		  ),
		  array(
		  'class' => 'editable.EditableColumn',
		  'name' => 'title_de',
		  'editable' => array(
		  'url' => $this->createUrl('presentation/editableSaver'),
		  'placement' => 'right',
		  )
		  ),
		 */
		array(
			'class' => 'TbButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('presentation/view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('presentation/update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('presentation/delete', array('id' => \$data->id))",
		),
	),
));
?>

