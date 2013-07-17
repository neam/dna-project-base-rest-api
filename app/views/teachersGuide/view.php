<?php
$this->breadcrumbs[Yii::t('crud', 'Teachers Guides')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Teachers Guide') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



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


<h2><?php echo CHtml::link(Yii::t('app', 'SectionContents'), array('sectionContent/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->sectionContents))
		foreach ($model->sectionContents as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->itemLabel, array('sectionContent/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('sectionContent/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('sectionContent/create', 'SectionContent' => array('teachers_guide_id' => $model->{$model->tableSchema->primaryKey}))
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

