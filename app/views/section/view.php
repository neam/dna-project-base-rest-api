<?php
$this->breadcrumbs[Yii::t('crud', 'Sections')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Section') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('chapter_id')); ?>:</b>
<?php echo CHtml::encode($model->chapter_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
<?php echo CHtml::encode($model->title); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug')); ?>:</b>
<?php echo CHtml::encode($model->slug); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('ordinal')); ?>:</b>
<?php echo CHtml::encode($model->ordinal); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('menu_label')); ?>:</b>
<?php echo CHtml::encode($model->menu_label); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<?php /*
  <b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
  <?php echo CHtml::encode($model->modified); ?>
  <br />

 */ ?>

<h2><?php echo CHtml::link(Yii::t('app', 'SectionContents'), array('sectionContent/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->sectionContents))
		foreach ($model->sectionContents as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->ordinal, array('sectionContent/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('sectionContent/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('sectionContent/create', 'SectionContent' => array('section_id' => $model->{$model->tableSchema->primaryKey}))
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
			array(
				'name' => 'chapter_id',
				'value' => ($model->chapter !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->chapter->title_en, array('chapter/view', 'id' => $model->chapter->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			'title_en',
			'slug_en',
			'ordinal',
			'menu_label_en',
			'created',
			'modified',
			'slug_es',
			'title_es',
			'slug_fa',
			'title_fa',
			'slug_hi',
			'title_hi',
			'slug_pt',
			'title_pt',
			'slug_sv',
			'title_sv',
			'slug_de',
			'title_de',
			'menu_label_es',
			'menu_label_fa',
			'menu_label_hi',
			'menu_label_pt',
			'menu_label_sv',
			'menu_label_de',
		),
	));
	?></p>

