<?php
/** @var Controller|ItemController $this */
/** @var ActiveRecord|ItemTrait $model */
?>
<?php $workflowCaption = Yii::t('app', 'Evaluate'); ?>
<?php $this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . $workflowCaption
); ?>
<?php $this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index'); ?>
<?php $this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey}); ?>
<?php $this->breadcrumbs[] = $workflowCaption; ?>
<?php Html::assetsJqueryComments(); ?>
<?php $this->renderPartial(
    'view',
    array(
        'model' => $model,
        'workflowCaption' => $workflowCaption,
    )
); ?>
