<?php
$this->breadcrumbs[Yii::t('crud', 'Video Files')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Translate');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Video File') ?>
    <small><?php echo Yii::t('crud', 'Translate') ?> #<?php echo $model->id ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

Choose language to translate into by using the menu in the lower left part of the screen.