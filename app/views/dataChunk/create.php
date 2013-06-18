<?php
$this->breadcrumbs[Yii::t('crud', 'Data Chunks')] = array('admin');
$this->breadcrumbs[] = Yii::t('crud', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Data Chunk') ?> <small><?php echo Yii::t('crud', 'Create') ?></small></h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->renderPartial('_form', array(
	'model' => $model,
	'buttons' => 'create'));
?>

