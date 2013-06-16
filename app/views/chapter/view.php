<?php
$this->breadcrumbs[Yii::t('crud', 'Chapters')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Chapter') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
<?php echo CHtml::encode($model->title); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug')); ?>:</b>
<?php echo CHtml::encode($model->slug); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />


<h2><?php echo CHtml::link(Yii::t('app', 'Sections'), array('section/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->sections))
		foreach ($model->sections as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->title, array('section/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('section/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('section/create', 'Section' => array('chapter_id' => $model->{$model->tableSchema->primaryKey}))
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
			'slug',
			'created',
			'modified',
		),
	));
	?></p>

