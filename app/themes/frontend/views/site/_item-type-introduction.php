<?php
$model = new $modelClass();
?>

<div class="pull-right">
    <?php
    $this->widget("bootstrap.widgets.TbButton", array(
        "label" => Yii::t("model", "Browse"),
        "size" => "",
        "icon" => "icon-forward",
        "url" => array(lcfirst($modelClass) . "/browse"),
        "visible" => Yii::app()->user->checkAccess("Item.Browse"),
    ));
    ?>
</div>


<h3><?php print Yii::t('model', $model->modelLabel, 2); ?></h3>

<div class="well">

    <?php
    echo CHtml::encode($model->itemDescription);
    ?>

</div>
<div class="clear"></div>