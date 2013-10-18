<?php
$this->setPageTitle(
    Yii::t('model', 'Ezc Workflow')
    . ' - '
    . Yii::t('crud', 'Create')
);

$this->breadcrumbs[Yii::t('model', 'Ezc Workflows')] = array('admin');
$this->breadcrumbs[] = Yii::t('crud', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('model', 'Ezc Workflow'); ?>
        <small><?php echo Yii::t('crud', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>