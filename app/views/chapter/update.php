<?php
$this->breadcrumbs[Yii::t('crud', 'Chapters')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Chapter') ?> <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small></h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<h2>
	<?php echo Yii::t('crud', 'Editable Detail View') ?></h2>

<?php
$this->widget('EditableDetailView', array(
	'data' => $model,
	'url' => $this->createUrl('editableSaver'),
));
?>


<div class='well'>
	<div class='row'>
		<div class='span3'><?php
			$this->widget('bootstrap.widgets.TbButtonGroup', array(
				'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'buttons' => array(
					array('label' => 'sections', 'icon' => 'icon-list-alt', 'url' => array('section/admin')),
					array('icon' => 'icon-plus', 'url' => array('section/create', 'Section' => array('chapter_id' => $model->{$model->tableSchema->primaryKey}))),
				),
			));
			?></div><div class='span8'>
			<?php
			echo '<span class=label>CHasManyRelation</span>';
			if (is_array($model->sections))
			{

				echo CHtml::openTag('ul');
				foreach ($model->sections as $relatedModel)
				{

					echo '<li>';
					echo CHtml::link($relatedModel->title, array('section/view', 'id' => $relatedModel->id), array('class' => ''));

					echo '</li>';
				}
				echo CHtml::closeTag('ul');
			}
			?></div>
	</div> <!-- row -->
</div> <!-- well -->

<h2>
	<?php echo Yii::t('crud', 'Update Form') ?></h2>

<?php
$this->renderPartial('_form', array(
	'model' => $model));
?>
