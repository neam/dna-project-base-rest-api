<!--
<h1>
    Gapminder CMS
</h1>

<h2>
    Search
</h2>

<div class="alert alert-warning">
    TODO: Ability to search
</div>

<h2>
    Featured
</h2>

<div class="alert alert-warning">
    TODO: See featured items
</div>

<h2>
    Contents
</h2>
-->
<?php //foreach (DataModel::qaModels() as $modelClass => $table): ?>
<?php foreach (DataModel::goItemModels() as $modelClass => $table): ?>

    <?php if ($table == "exam_question_alternative") {
        continue;
    } ?>

    <?php
    $model = new $modelClass();
    ?>

    <div class="pull-right">
        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Browse"),
            "size" => "",
            "icon" => "icon-forward",
            "url" => array(lcfirst($modelClass) . "/index"),
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

<?php endforeach; ?>

<hr>

