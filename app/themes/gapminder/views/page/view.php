<?php
/**
 * @var PageController $this
 * @var Page $model
 */
?>

<?php $this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse'); ?>
<?php $this->renderPartial('/_item/elements/flowbar', compact('model')); ?>

<div class="<?php echo $this->getCssClasses($model); ?>">
    <div class="after-flowbar">
        <div class="content">
            <?php echo $model->about; ?>
        </div>

    </div>
</div>
