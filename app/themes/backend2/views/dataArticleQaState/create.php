<?php
$this->setPageTitle(
    Yii::t('model', 'Data Article Qa State')
    . ' - '
    . Yii::t('crud', 'Create')
);

$this->breadcrumbs[Yii::t('model', 'Data Article Qa States')] = array('admin');
$this->breadcrumbs[] = Yii::t('crud', 'Create');
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('model', 'Data Article Qa State'); ?>
        <small><?php echo Yii::t('crud', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>