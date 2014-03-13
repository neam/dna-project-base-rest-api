<?php
$this->breadcrumbs[] = Yii::t('model', 'Users');
$this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('account', 'History');
?>

<h1>

    <?php echo $model->profile->first_name . " " . $model->profile->last_name; ?>
    <small>
        <?php echo Yii::t('account', 'History') ?> <!--#<?php echo $model->id ?>-->
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<div class="alert alert-info">
    <h4>Work in progress</h4>
    This is where you will track your changes and contributions over time.
</div>

<h2><?php echo Yii::t('history', 'Contribution history'); ?></h2>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_history-item',
));
?>

<h2><?php echo Yii::t('history', 'Sign-up'); ?></h2>

<b><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:</b>
<?php echo CHtml::encode($model->create_at); ?>
<br/>

<h2><?php echo Yii::t('history', 'Last visit'); ?></h2>

<b><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>:</b>
<?php echo CHtml::encode($model->lastvisit_at); ?>
<br/>

