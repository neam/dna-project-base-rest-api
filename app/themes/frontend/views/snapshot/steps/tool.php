<div class="control-group">
    <div class="controls">
        <?php if ($model->tools): ?>
            <ul>
                <?php foreach ($model->tools as $tool): ?>
                    <li>
                        <?php echo $tool->title; ?>
                        <?php
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Delete relation"),
                            "url" => array("deleteEdge", "id" => $model->{$model->tableSchema->primaryKey}, "from" => $model->node()->id, "to" => $tool->node()->id, "returnUrl" => Yii::app()->request->url),
                            "size" => "small",
                            "type" => "danger"
                        ));
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div><?php echo Yii::t("model", "No tools"); ?></div>
        <?php endif; ?>
        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Create new tool"),
            "url" => array("/tool/")
        ));
        ?>
    </div>
</div>
<?php if ($model->getAttributeHint("tool")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("tool"); ?>
    </p>
<?php endif; ?>

<h2>Choose tool to add</h2>
<?php
$allTools = new Tool('search');
$this->widget(
    'bootstrap.widgets.TbExtendedGridView',
    array(
        'id' => 'tools_to_add',
        'type' => 'striped bordered',
        'dataProvider' => $allTools->search(),
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
