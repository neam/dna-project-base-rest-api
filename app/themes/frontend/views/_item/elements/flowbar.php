<?php
$actions = $this->itemActions($model, $translateInto);
?>
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

        <?php
        // When in edit-views we consider ourselves outside any active workflow and instead offer buttons to start workflows
        if ($this->action->id == "edit"): ?>

            <div class="btn-toolbar">
                <div class="btn-group">
                    <?php

                    /*
                    if (!$model->qaState()->draft_saved) {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("crud", "Prepare to save"),
                            "type" => $this->action->id == "draft" ? "inverse" : null,
                            "icon" => "icon-pencil" . ($this->action->id == "draft" ? " icon-white" : null),
                            "url" => array("draft", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model))
                        ));
                    }
                    */
                    if (!$model->qaState()->previewing_welcome) {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("crud", "Prepare for testing"),
                            "type" => $this->action->id == "prepPreshow" ? "inverse" : null,
                            "icon" => "icon-pencil" . ($this->action->id == "" ? " icon-white" : null),
                            "url" => array("prepPreshow", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model))
                        ));
                    }
                    if (!$model->qaState()->candidate_for_public_status) {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("crud", "Prepare for publishing"),
                            "type" => $this->action->id == "prepPublish" ? "inverse" : null,
                            "icon" => "icon-pencil" . ($this->action->id == "prepPublish" ? " icon-white" : null),
                            "url" => array("prepPublish", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model))
                        ));
                    }

                    ?>
                </div>
                <div class="btn-group">
                    <?php

                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("crud", "Evaluate"),
                        "type" => $this->action->id == "evaluate" ? "inverse" : null,
                        "icon" => "icon-comment" . ($this->action->id == "evaluate" ? " icon-white" : null),
                        "url" => array("evaluate", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Review"),
                        "type" => $this->action->id == "review" ? "inverse" : null,
                        "icon" => "icon-check" . ($this->action->id == "review" ? " icon-white" : null),
                        "url" => array("review", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Proofread"),
                        "type" => $this->action->id == "proofRead" ? "inverse" : null,
                        "icon" => "icon-certificate" . ($this->action->id == "proofRead" ? " icon-white" : null),
                        "url" => array("proofRead", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Translations"),
                        "type" => $this->action->id == "translationOverview" ? "inverse" : null,
                        "icon" => "icon-globe" . ($this->action->id == "translationOverview" ? " icon-white" : null),
                        "url" => array("translationOverview", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    /*
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Publish"),
                        "type" => $this->action->id == "publish" ? "inverse" : null,
                        "icon" => "icon-thumbs-up" . ($this->action->id == "publish" ? " icon-white" : null),
                        "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    */
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Clone"),
                        "type" => $this->action->id == "clone" ? "inverse" : null,
                        "icon" => "icon-plus" . ($this->action->id == "clone" ? " icon-white" : null),
                        "url" => array("clone", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Remove"),
                        "type" => $this->action->id == "remove" ? "inverse" : null,
                        "icon" => "icon-eye-close" . ($this->action->id == "remove" ? " icon-white" : null),
                        "url" => array("remove", "id" => $model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Replace"),
                        "type" => $this->action->id == "replace" ? "inverse" : null,
                        "icon" => "icon-random" . ($this->action->id == "replace" ? " icon-white" : null),
                        "url" => array("replace", "id" => $model->{$model->tableSchema->primaryKey})
                    ));

                    ?>
                </div>
            </div>

        <?php else: ?>

            <div class="well well-small">
                <div class="row-fluid">
                    <div class="span3">
                        <h3>
                            <?php echo $workflowCaption; ?>
                        </h3>
                    </div>
                    <div class="span6">
                        <?php
                        $validationScenario = $this->currentValidationScenario();
                        $invalidFields = $model->calculateInvalidFields($validationScenario);
                        if ($invalidFields > 0):
                            ?>
                            <div class="pull-left" style="margin-right: 1em;">
                                <h4 class="required-missing">* <?php echo $invalidFields; ?> required missing</h4>
                            </div>
                            <?php
                            $nextStep = $this->nextFlowStep("$validationScenario-", $model);
                            if ($_GET['step'] != $nextStep): ?>
                                <div class="btn-group">

                                    <?php
                                    echo CHtml::submitButton(Yii::t('model', 'Go to next required step'), array(
                                            'class' => 'btn btn-primary',
                                            'name' => 'next-required',
                                        )
                                    );
                                    ?>

                                </div>
                            <?php endif; ?>

                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="span3">
                        <div class="pull-right">
                            <div class="btn-group">

                                <?php

                                foreach ($actions["flagTriggerActions"] as $action):
                                    if ($action["requiredProgress"] < 100) {
                                        $this->widget("bootstrap.widgets.TbButton", array(
                                            "label" => $action["label"],
                                            "type" => "",
                                            "disabled" => true,
                                        ));
                                    } else {
                                        $this->widget("bootstrap.widgets.TbButton", array(
                                            "label" => $action["label"],
                                            "type" => "success",
                                            "url" => array($action["action"], "id" => $model->{$model->tableSchema->primaryKey})
                                        ));
                                    }
                                endforeach;

                                ?>

                            </div>

                            <div class="btn-group">

                                <?php
                                $this->widget("bootstrap.widgets.TbButton", array(
                                    "label" => Yii::t("model", "Cancel"),
                                    "url" => array("cancel", "id" => $model->{$model->tableSchema->primaryKey})
                                ));
                                ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        <?php endif; ?>

    </div>
</div>
