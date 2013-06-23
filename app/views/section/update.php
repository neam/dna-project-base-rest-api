<?php
$this->breadcrumbs[Yii::t('crud', 'Sections')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Section') ?> <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small></h1>

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
	<?php echo Yii::t('crud', 'Section Contents'); ?> </h2>

<div class="btn-group">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons' => array(
			array('label' => Yii::t('crud', 'Create'), 'icon' => 'icon-plus', 'url' => array('sectionContent/create', 'SectionContent' => array('section_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
		),
	));
	?></div>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('sectionContents');
$this->widget('TbGridView', array(
	'id' => 'sectionContent-grid',
	'dataProvider' => $relatedSearchModel->search(),
	'filter' => count($model->sectionContents) > 1 ? $relatedSearchModel : null,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'ordinal',
			'editable' => array(
				'url' => $this->createUrl('sectionContent/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'created',
			'editable' => array(
				'url' => $this->createUrl('sectionContent/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'modified',
			'editable' => array(
				'url' => $this->createUrl('sectionContent/editableSaver'),
				'placement' => 'right',
			)
		),
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
		array(
			'name' => 'video_file_id',
			'value' => 'CHtml::value($data,\'videoFile.title\')',
			'filter' => CHtml::listData(VideoFile::model()->findAll(), 'id', 'title'),
		),
		array(
			'name' => 'teachers_guide_id',
			'value' => 'CHtml::value($data,\'teachersGuide.title\')',
			'filter' => CHtml::listData(TeachersGuide::model()->findAll(), 'id', 'title'),
		),
		/*
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
		 */
		array(
			'class' => 'TbButtonColumn',
			'viewButtonIcon' => 'foo',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/delete', array('id' => \$data->id))",
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
