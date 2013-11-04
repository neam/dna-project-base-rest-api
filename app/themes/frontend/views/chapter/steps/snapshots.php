<div class="controls">
    <?php if ($model->snapshots): ?>
        <ul>
            <?php foreach ($model->snapshots as $snapshot): ?>
                <li>
                    <?php echo $snapshot->title; ?>
                    <?php
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Delete relation"),
                        "url" => array("deleteEdge", "id" => $model->{$model->tableSchema->primaryKey}, "from" => $model->node()->id, "to" => $snapshot->node()->id, "returnUrl" => Yii::app()->request->url),
                        "size" => "small",
                        "type" => "danger"
                    ));
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php
    $this->widget("bootstrap.widgets.TbButton", array(
        "label" => Yii::t("model", "Create new snapshot"),
        "url" => array("/snapshot/")
    ));
    ?>
</div>

<h2>Choose snapshot to add</h2>
<?php
$allSnapshots = new Snapshot('search');
$this->widget(
    'bootstrap.widgets.TbExtendedGridView',
    array(
        'id' => 'snapshots_to_add',
        'type' => 'striped bordered',
        'dataProvider' => $allSnapshots->search(),
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'bulkActions' => array(
            'actionButtons' => array(),
            'checkBoxColumnConfig' => array(
                'name' => 'id'
            ),
        ),
        'columns' => array(
            array('name' => 'id', 'header' => 'Id'),
            array('name' => 'title', 'header' => 'Title'),
        )
    )
);
?>

<div class="alert alert-info">
    Hint: Lorem ipsum
</div>
