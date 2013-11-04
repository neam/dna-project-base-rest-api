<?php
$this->breadcrumbs[Yii::t('crud', 'Video Files')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array(
    'view',
    'id' => $model->{$model->tableSchema->primaryKey}
);
$this->breadcrumbs[] = Yii::t('crud', 'Translate');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Video File') ?>
    <small><?php echo Yii::t('crud', 'Translate Video File to ' . Yii::app()->language) ?>
        #<?php echo $model->id ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

Translation is not yet available.

<pre>

    <?php

    var_dump($execution->getWaitingFor());

    /*
    $definition = new VideoFileTranslationWorkflow();
    $definition->setWorkflow($workflow);

    $this->widget('yii-graphviz.widgets.Graph', array(
        'configuration' => $definition->getGraphvizSyntax(),
        'alt' => "My Alt Text on image",
        'title' => "My Image Title",
        'map' => false,
    ));

    echo $definition->getGraphvizSyntax();
    */

    ?>

</pre>
