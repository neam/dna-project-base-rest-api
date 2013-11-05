<div class="row-fluid">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $model->calculateValidationProgress("step_".$step),
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", $caption),
            "type" => $this->action->id == $action ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-" . $options['icon'] . ($this->action->id == $action ? " icon-white" : null),
            "url" => array($action, "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>