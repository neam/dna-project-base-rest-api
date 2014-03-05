<?php

$workflowCaption = Yii::t('app', 'Evaluate');

$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . $workflowCaption
);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = $workflowCaption;

// Include jquery.comments
Html::assetsJqueryComments();

?>

<?php
$this->renderPartial('view', array('model' => $model, 'workflowCaption' => $workflowCaption, 'evaluate' => true));
?>
