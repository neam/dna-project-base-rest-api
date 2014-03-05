<?php
$this->breadcrumbs[] = Yii::t('model', 'Users');
$this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('account', 'Translations');
?>

<h1>

    <?php echo $model->profiles->first_name . " " . $model->profiles->last_name; ?>
    <small>
        <?php echo Yii::t('account', 'Translations') ?> <!--#<?php echo $model->id ?>-->
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<div class="alert alert-info">
    <h4>Work in progress</h4>
    This is where you will track your on-going translations.
</div>

