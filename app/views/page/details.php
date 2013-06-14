<?php
$this->breadcrumbs[Yii::t('crud', 'Pages')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Page') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

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
		),
	));
	?></p>


<h2>
	<?php echo Yii::t('crud', 'Relations') ?></h2>

<div class='well'>
	<div class='row'>
		<div class='span3'><?php
			$this->widget('bootstrap.widgets.TbButtonGroup', array(
				'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'buttons' => array(
					array('label' => 'pageAssociations', 'icon' => 'icon-list-alt', 'url' => array('pageAssociation/admin')),
					array('icon' => 'icon-plus', 'url' => array('pageAssociation/create', 'PageAssociation' => array('page_id' => $model->{$model->tableSchema->primaryKey}))),
				),
			));
			?></div><div class='span8'>
			<?php
			echo '<span class=label>CHasManyRelation</span>';
			if (is_array($model->pageAssociations))
			{

				echo CHtml::openTag('ul');
				foreach ($model->pageAssociations as $relatedModel)
				{

					echo '<li>';
					echo CHtml::link($relatedModel->title, array('pageAssociation/view', 'id' => $relatedModel->id), array('class' => ''));

					echo '</li>';
				}
				echo CHtml::closeTag('ul');
			}
			?></div>
	</div> <!-- row -->
</div> <!-- well -->
