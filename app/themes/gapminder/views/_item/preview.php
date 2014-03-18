<?php /** @var Controller|ItemController $this */ ?>
<?php /** @var ActiveRecord|ItemTrait $model */ ?>
<?php $workflowCaption = Yii::t('app', 'Preview'); ?>
<?php $this->setPageTitle(Yii::t('model', $this->modelClass) . ' - ' . $workflowCaption); ?>
<?php $this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index'); ?>
<?php $this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('continueAuthoring', 'id' => $model->{$model->tableSchema->primaryKey}); ?>
<?php $this->breadcrumbs[] = $workflowCaption; ?>
<?php $this->renderPartial(
    'view',
    array(
        'preview' => true,
        'model' => $model,
    )
); ?>
