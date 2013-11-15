<?php
//TODO: Make this list sortable and nicer looking...
?>
<h3><?php echo Yii::t("model", $label); ?></h3>
<?php if ($items): ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <?php echo $item->title; ?>
                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Delete relation"),
                    "url" => array("deleteEdge", "id" => $model->{$model->tableSchema->primaryKey}, "from" => $model->node()->id, "to" => $item->node()->id, "returnUrl" => Yii::app()->request->url),
                    "size" => "small",
                    "type" => "danger"
                ));
                ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <div><?php echo Yii::t("model", $noItemsLabel); ?></div>
<?php endif; ?>
