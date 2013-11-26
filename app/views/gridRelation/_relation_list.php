<?php
$items = $model->$relation;
$noItemsLabel = Yii::t('app', 'No {models}', array('{models}' => $label));
?>
<h3><?php echo ucfirst(Yii::t("model", $label)); ?></h3>
<?php if ($items): ?>
    <ul>
        <?php foreach ($items as $item):
            if (get_class($item) == "Node") {
                $realItem = $item->item();
            } else {
                $realItem = $item;
            }
            $itemLabel = $realItem->itemLabel;
            $itemModel = lcfirst(get_class($realItem));
            ?>
            <li>
                <?php echo $itemLabel; ?>
                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Edit"),
                    "url" => array($itemModel . "/continueAuthoring", "id" => $realItem->{$realItem->tableSchema->primaryKey}, "returnUrl" => Yii::app()->request->url),
                    "size" => "small",
                    "type" => "primary"
                ));
                ?>
                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Delete relation"),
                    "url" => array("deleteEdge", "id" => $model->{$model->tableSchema->primaryKey}, "from" => $model->node()->id, "to" => $realItem->node_id, "returnUrl" => Yii::app()->request->url),
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
