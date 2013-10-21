<?php
$this->breadcrumbs[Yii::t('model', 'Accounts')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo $model->profiles->first_name." ".$model->profiles->last_name; ?>
        <small>
            <?php echo Yii::t('model', 'History') ?> <!--#<?php echo $model->id ?>-->
        </small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>