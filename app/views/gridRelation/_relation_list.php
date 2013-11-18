<?php
$items = $model->$relation;
$relations = $model->relations();
$relationClassName = $relations[$relation][1];
$labels = DataModel::modelLabels();
$relationClassLabel = Yii::t('app', $labels[$relationClassName], 2);
$label = Yii::t('app', 'List of {models}', array('{models}' => $relationClassLabel));
$noItemsLabel = Yii::t('app', 'No {models}', array('{models}' => $relationClassLabel));

//TODO: Make this list sortable and nicer looking...
?>
<h3><?php echo Yii::t("model", $label); ?></h3>
<?php if ($items): ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <?php echo $item->itemLabel; ?>
                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Edit"),
                    "url" => array(lcfirst(get_class($item)) . "/continueAuthoring", "id" => $item->{$item->tableSchema->primaryKey}, "returnUrl" => Yii::app()->request->url),
                    "size" => "small",
                    "type" => "primary"
                ));
                ?>
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
