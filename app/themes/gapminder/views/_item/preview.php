<?php /** @var $this CController */ ?>
<?php /** @var $model ActiveRecord */ ?>

<?php // TODO: wonder if this page should be refactored too ?>

<?php
$workflowCaption = Yii::t('app', 'Preview');

$this->setPageTitle(Yii::t('model', $this->modelClass) . ' - ' . $workflowCaption);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('continueAuthoring', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = $workflowCaption;

$this->renderPartial(
    'view',
    array(
        'preview' => true,
        'model' => $model,
    )
);

?>
