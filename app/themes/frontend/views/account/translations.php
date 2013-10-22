<?php
$this->breadcrumbs[] = Yii::t('model', 'Users');
$this->breadcrumbs[] = $model->username;
$this->breadcrumbs[] = Yii::t('account', 'Translations');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo $model->profiles->first_name . " " . $model->profiles->last_name; ?>
    <small>
        <?php echo Yii::t('account', 'Translations') ?> <!--#<?php echo $model->id ?>-->
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

