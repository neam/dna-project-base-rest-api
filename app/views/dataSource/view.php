<?php
$this->breadcrumbs[Yii::t('crud', 'Data Sources')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Data Source') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
<?php echo CHtml::encode($model->title); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />


<h2><?php echo CHtml::link(Yii::t('app', 'DataChunks'), array('dataChunk/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->dataChunks))
		foreach ($model->dataChunks as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->title_en, array('dataChunk/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('dataChunk/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('dataChunk/create', 'DataChunk' => array('data_source_id' => $model->{$model->tableSchema->primaryKey}))
	);
	?></p><h2><?php echo CHtml::link(Yii::t('app', 'SpreadsheetFiles'), array('spreadsheetFile/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->spreadsheetFiles))
		foreach ($model->spreadsheetFiles as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->title_en, array('spreadsheetFile/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('spreadsheetFile/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('spreadsheetFile/create', 'SpreadsheetFile' => array('data_source_id' => $model->{$model->tableSchema->primaryKey}))
	);
	?></p>
<h2>
	<?php echo Yii::t('crud', 'Data') ?></h2>

<p>
	<?php
	$this->widget('TbDetailView', array(
		'data' => $model,
		'attributes' => array(
			'id',
			'title_en',
			'created',
			'modified',
			'title_es',
			'title_fa',
			'title_hi',
			'title_pt',
			'title_sv',
			'title_de',
		),
	));
	?></p>

