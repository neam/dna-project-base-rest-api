<div class="row-fluid">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $progress,
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", $caption),
            "type" => $_GET['step'] == $step ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-" . $options['icon'] . ($this->action->id == $action ? " icon-white" : null),
            "url" => array($editAction, "id" => $model->{$model->tableSchema->primaryKey}, "step" => $step)
        ));
        ?>

    </div>
</div>