<?php
$this->breadcrumbs[Yii::t('crud', 'Spreadsheet Files')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Spreadsheet File') ?> <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small></h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>

<?php
/*
  Code example to include an editable detail view:

  <h2>
  <?php echo Yii::t('crud','Editable Detail View')?></h2>

  <?php
  $this->widget('EditableDetailView', array(
  'data' => $model,
  'url' => $this->createUrl('editableSaver'),
  ));
  ?>

 */
?>


