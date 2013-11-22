<?php

$workflowCaption = Yii::t('app', 'Preview');

$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . $workflowCaption
);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = $workflowCaption;
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)); ?>

<?php $this->renderPartial("/_item/elements/flowbar", compact("model", "workflowCaption", "form", "translateInto")); ?>

<div class="row-fluid">
    <div class="span12">

        <?php
        $this->renderPartial('_view', array('data' => $model, 'preview' => true));
        ?>

    </div>
</div>
