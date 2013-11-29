<?php /** @var ActiveRecord|ItemTrait $model */ ?>
<?php /** @var Controller $this */ ?>

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
            <?php echo $model->itemLabel; ?><small><?php if ($this->action->id !== 'index') echo $model->itemDescriptionTooltip(); ?></small>
            <small>Version: <?php echo $model->version; ?></small>
            <small>Status: <?php echo Yii::t('statuses', $model->qaStateBehavior()->statusLabel); ?></small>
            <div class="pull-right">
                <div class="btn-group">

                    <?php

                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Go!'),
                        'icon' => 'icon-play',
                        'type' => '',
                        'url' => array('node/go', 'id' => $model->node()->id),
                        'htmlOptions' => array(
                            'target' => '_blank',
                        ),
                    ));

                    ?>

                </div>
                <div class='btn-group'>

                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Edit'),
                        'icon' => 'icon-edit',
                        'type' => $this->action->id != 'edit' ? 'primary' : 'inverse',
                        'url' => !empty($_GET['editingUrl']) ? $_GET['editingUrl'] : array('continueAuthoring', 'id' => $model->{$model->tableSchema->primaryKey}),
                    ));
                    if ($this->action->id == 'preview' || $this->action->id == 'index') {
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('model', 'View'),
                            'icon' => 'icon-eye-open',
                            'type' => $this->action->id != 'view' ? '' : 'inverse',
                            'url' => array('view', 'id' => $model->{$model->tableSchema->primaryKey}),
                        ));
                    } else {
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('model', 'Preview'),
                            'icon' => 'icon-eye-open',
                            'type' => $this->action->id != 'preview' ? '' : 'inverse',
                            'url' => array('preview', 'id' => $model->{$model->tableSchema->primaryKey}, 'editingUrl' => $this->action->id == 'view' ? null : Yii::app()->request->url),
                        ));
                    }
                    ?>
                </div>
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
                        "label" => Yii::t("model", "Translate"),
                        "type" => $this->action->id == "translationOverview" ? "inverse" : null,
                        "icon" => "icon-globe" . ($this->action->id == "translationOverview" ? " icon-white" : null),
                        "url" => array("translationOverview", "id" => $model->{$model->tableSchema->primaryKey})
                    ));

                    ?>
                </div>
                <div class="btn-group">
                    <?php

                    if (in_array($model->qaState()->status, array("public"))) {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Unpublish"),
                            "icon" => "icon-thumbs-down",
                            "url" => array("unpublish", "id" => $model->{$model->tableSchema->primaryKey})
                        ));
                    } elseif ($model->qaStateBehavior()->validStatus('public')) {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Publish"),
                            "icon" => "icon-thumbs-up",
                            "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey})
                        ));
                    } else {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Publish"),
                            "disabled" => true,
                            "icon" => "icon-thumbs-up",
                        ));
                    }

                    ?>
                </div>
                <div class="btn-group">
                    <?php

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

        <?php elseif ($this->action->id != "preview" && $this->action->id != "view" && $this->action->id != "index"): ?>

            <div class="well well-small">
                <div class="row-fluid">
                    <div class="span4">
                        <h3>
                            <?php echo $workflowCaption; ?>
                        </h3>
                    </div>
                    <div class="span5">
                        <?php
                        $validationScenario = $this->workflowData["validationScenario"];
                        $invalidFields = $model->calculateInvalidFields($validationScenario);
                        if ($invalidFields > 0):
                            ?>
                            <div class="pull-left" style="margin-right: 1em;">
                                <h4 class="required-missing">* <?php echo $invalidFields; ?> required missing</h4>
                            </div>
                            <?php
                            $nextStep = $this->nextFlowStep("$validationScenario-", $model);

                            // Sanity check
                            if ($invalidFields > 0 && empty($nextStep)) {
                                throw new CException("The item's validation rules for $validationScenario are out of sync. Make sure that the step-based validation rules match those of the overall $validationScenario validation scenarios");
                            }

                            if ($_GET['step'] != $nextStep): ?>
                                <div class="btn-group">

                                    <?php
                                    echo CHtml::submitButton(Yii::t('model', 'Next'), array(
                                            'class' => 'btn btn-primary',
                                            'name' => 'next-required',
                                        )
                                    );
                                    ?>
                                    <input type="hidden" name="next-required-url"
                                           value="<?php echo CHtml::encode(Yii::app()->createUrl(lcfirst($this->modelClass) . '/' . $this->action->id, array('id' => $model->id, 'step' => $nextStep))); ?>"/>

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

                                foreach ($this->workflowData["flagTriggerActions"] as $action):
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
