<?php
$this->setPageTitle(
    Yii::t('model', 'Text Doc')
    . ' - '
    . Yii::t('crud', 'Create')
);

$this->breadcrumbs[Yii::t('model', 'Text Docs')] = array('admin');
$this->breadcrumbs[] = Yii::t('crud', 'Create');
?>

    <h1>
        <?php echo Yii::t('model', 'Text Doc'); ?>
        <small><?php echo Yii::t('crud', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>