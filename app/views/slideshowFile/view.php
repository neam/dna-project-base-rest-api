<?php
$this->breadcrumbs[Yii::t('crud', 'Slideshow Files')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Slideshow File') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



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

<b><?php echo CHtml::encode($model->getAttributeLabel('original_media_id')); ?>:</b>
<?php echo CHtml::encode($model->original_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id')); ?>:</b>
<?php echo CHtml::encode($model->processed_media_id); ?>
<br />


<h2><?php echo CHtml::link(Yii::t('app', 'DataChunks'), array('dataChunk/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->dataChunks))
		foreach ($model->dataChunks as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->title, array('dataChunk/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('dataChunk/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('dataChunk/create', 'DataChunk' => array('slideshow_file_id' => $model->{$model->tableSchema->primaryKey}))
	);
	?></p><h2><?php echo CHtml::link(Yii::t('app', 'Exercises'), array('exercise/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->exercises))
		foreach ($model->exercises as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->title, array('exercise/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('exercise/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('exercise/create', 'Exercise' => array('slideshow_file_id' => $model->{$model->tableSchema->primaryKey}))
	);
	?></p><h2><?php echo CHtml::link(Yii::t('app', 'Presentations'), array('presentation/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->presentations))
		foreach ($model->presentations as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->title, array('presentation/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('presentation/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('presentation/create', 'Presentation' => array('slideshow_file_id' => $model->{$model->tableSchema->primaryKey}))
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
			'title',
			'created',
			'modified',
			array(
				'name' => 'original_media_id',
				'value' => ($model->originalMedia !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->originalMedia->title, array('p3Media/view', 'id' => $model->originalMedia->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			array(
				'name' => 'processed_media_id',
				'value' => ($model->processedMedia !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->processedMedia->title, array('p3Media/view', 'id' => $model->processedMedia->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
		),
	));
	?></p>

