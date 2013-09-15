<?php
$this->breadcrumbs[Yii::t('crud', 'Video Files')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Translate');
$this->breadcrumbs[] = Yii::t('crud', 'Subtitles');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<div class="steps" style="float: right;">
    Here: steps in <?php echo $execution->workflow->name; ?>
</div>
<h1>
    <?php echo Yii::t('crud', 'Video File') ?>
    <small><?php echo Yii::t('crud', 'Translate Subtitles') ?> #<?php echo $model->id ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<div class="row">
    <div class="span8"> <!-- main inputs -->

        Subtitles translation ui - todo

    </div>
    <div class="span4"> <!-- translation workflow execution status -->

        <pre>

            <?php

            var_dump($execution->getWaitingFor());

            ?>

        </pre>

    </div>
</div>
