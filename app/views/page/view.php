<?php
$this->breadcrumbs['Pages'] = array('index');
$this->breadcrumbs[] = $model->id;

if (!$this->menu)
	$this->menu = array(
		array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
		array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
		array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
		array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
		array('label' => Yii::t('app', 'List'), 'url' => array('index')),
	);
?>

<h1><?php echo Yii::t('app', 'View'); ?> Page <?php echo $model->id; ?></h1>

<div class="view">

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


</div>

<h2><?php echo CHtml::link(Yii::t('app', 'PageAssociations'), array('pageAssociation/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->pageAssociations))
		foreach ($model->pageAssociations as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->title, array('pageAssociation/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('pageAssociation/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('pageAssociation/create', 'PageAssociation' => array('page_id' => $model->{$model->tableSchema->primaryKey}))
	);
	?></p>