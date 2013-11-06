<div class="control-group">
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
        <?php else: ?>
            <div><?php echo Yii::t("model", "No snapshots"); ?></div>
        <?php endif; ?>
        <?php
        /*
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add existing snapshot'),
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#viewModal',
            ),
        ), true);
        */
        ?><br>
        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Create new snapshot"),
            "url" => array("/snapshot/"),
            'icon' => 'icon-plus',
        ));
        ?>
    </div>
</div>

<?php #$this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'viewModal')); ?>
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
<?php #$this->endWidget(); ?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("snapshot"); ?>
</p>

