<style>

    .flowbar .well .row-fluid div {
        line-height: 40px;
    }

    .flowbar .well h3, .flowbar .well h4 {
        margin: 0;
    }

    .flowbar .well {
        padding-top: 13px;
    }

    .required-missing {
        line-height: 40px;
        color: red;
    }


</style>

<div class="row-fluid flowbar">
    <div class="span12">

        <h1>
            <?php echo(empty($model->title) ? Yii::t('model', $this->modelClass) . " #" . $model->id : $model->title); ?>
            <small>Version: X</small>
            <small>Status: Y</small>
            <div class="btn-group pull-right">

                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Preview"),
                    "icon" => "icon-eye-open",
                    "url" => array("preview", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                ?>

            </div>

        </h1>
        <div class="well well-small">
            <div class="row-fluid">
                <div class="span3">
                    <h3>
                        <?php echo $workflowCaption; ?>
                    </h3>
                </div>
                <div class="span4">
                    <div class="pull-left" style="margin-right: 1em;">
                        <h4 class="required-missing">* N required missing</h4>
                    </div>
                    <div class="btn-group">

                        <?php
                        echo CHtml::submitButton(Yii::t('model', 'Next'), array(
                                'class' => 'btn btn-primary'
                            )
                        );
                        ?>

                    </div>

                </div>
                <div class="span2">

                </div>

                <div class="span3">
                    <div class="pull-right">
                        <div class="btn-group">

                            <?php

                            $actions = $this->itemActions($model);

                            foreach ($actions["flagTriggerActions"] as $action):
                                $this->widget("bootstrap.widgets.TbButton", array(
                                    "label" => $action["label"],
                                    "type" => $action["requiredProgress"] == 100 ? "success" : "error",
                                    "url" => array($action["action"], "id" => $model->{$model->tableSchema->primaryKey})
                                ));
                            endforeach;

                            ?>

                        </div>

                        <div class="btn-group">

                            <?php
                            $this->widget("bootstrap.widgets.TbButton", array(
                                "label" => Yii::t("model", "Cancel"),
                                "url" => array("edit", "id" => $model->{$model->tableSchema->primaryKey})
                            ));
                            ?>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
