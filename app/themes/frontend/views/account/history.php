<?php
$this->breadcrumbs[Yii::t('model', 'Accounts')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo $model->profiles->first_name . " " . $model->profiles->last_name; ?>
        <small>
            <?php echo Yii::t('model', 'History') ?> <!--#<?php echo $model->id ?>-->
        </small>

    </h1>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<div class="row">
    <div class="span12">
        <b><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:</b>
        <?php echo CHtml::encode($model->create_at); ?>
        <br/>

        <b><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>:</b>
        <?php echo CHtml::encode($model->lastvisit_at); ?>
        <br/>
    </div>
</div>

