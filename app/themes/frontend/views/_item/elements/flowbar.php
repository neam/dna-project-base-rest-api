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

<div class="row flowbar">
    <div class="span12">

        <h1>
            <?php echo $model->itemLabel; ?>
            <small><?php if ($this->action->id !== 'browse') {
                    echo $this->itemDescriptionTooltip();
                } ?></small>
            <small>Version: <?php echo $model->version; ?></small>
            <small>Status: <?php echo Yii::t('statuses', $model->qaStateBehavior()->statusLabel); ?></small>
            <?php if ($this->action->id != 'evaluate'): ?>

                <div class="pull-right">
                    <div class='btn-group'>

                        <?php
                        if ($this->action->id === "preview" || $this->action->id === "browse") {
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'label' => Yii::t('model', 'Edit'),
                                'icon' => 'icon-edit',
                                'type' => $this->action->id != 'edit' ? 'primary' : 'inverse',
                                'url' => !empty($_GET['editingUrl']) ? $_GET['editingUrl'] : array('continueAuthoring', 'id' => $model->{$model->tableSchema->primaryKey}),
                                'visible' => Yii::app()->user->checkAccess('Item.Edit'),
                            ));
                        }
                        if ($this->action->id == 'browse') {
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'label' => Yii::t('model', 'View'),
                                'icon' => 'icon-eye-open',
                                'type' => $this->action->id != 'view' ? '' : 'inverse',
                                'url' => array('view', 'id' => $model->{$model->tableSchema->primaryKey}),
                            ));
                        } elseif ($this->action->id == 'edit') {
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'label' => Yii::t('model', 'Preview'),
                                'icon' => 'icon-eye-open',
                                'type' => $this->action->id != 'preview' ? '' : 'inverse',
                                'url' => array('preview', 'id' => $model->{$model->tableSchema->primaryKey}, 'editingUrl' => $this->action->id == 'view' ? null : Yii::app()->request->url),
                                'visible' => Yii::app()->user->checkAccess('Item.Preview'),
                            ));
                        }
                        ?>

                    </div>
                </div>

            <?php endif; ?>

        </h1>

        <?php
        // When in edit-views we consider ourselves outside any active workflow and instead offer buttons to start workflows
        if ($this->action->id == "edit" || $this->action->id == "browse"): ?>

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
                            "url" => array("prepPreshow", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
                            "visible" => Yii::app()->user->checkAccess('Item.PrepPreshow'),
                        ));
                    }
                    if (!$model->qaState()->candidate_for_public_status) {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("crud", "Prepare for publishing"),
                            "type" => $this->action->id == "prepPublish" ? "inverse" : null,
                            "icon" => "icon-pencil" . ($this->action->id == "prepPublish" ? " icon-white" : null),
                            "url" => array("prepPublish", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
                            "visible" => Yii::app()->user->checkAccess('Item.PrepPublish'),
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
                        "url" => array("evaluate", "id" => $model->{$model->tableSchema->primaryKey}, "step" => $this->firstFlowStep($model)),
                        "visible" => Yii::app()->user->checkAccess('Item.Evaluate'),
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Review"),
                        "type" => $this->action->id == "review" ? "inverse" : null,
                        "icon" => "icon-check" . ($this->action->id == "review" ? " icon-white" : null),
                        "url" => array("review", "id" => $model->{$model->tableSchema->primaryKey}),
                        "visible" => Yii::app()->user->checkAccess('Item.Review'),
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Proofread"),
                        "type" => $this->action->id == "proofRead" ? "inverse" : null,
                        "icon" => "icon-certificate" . ($this->action->id == "proofRead" ? " icon-white" : null),
                        "url" => array("proofRead", "id" => $model->{$model->tableSchema->primaryKey}),
                        "visible" => Yii::app()->user->checkAccess('Item.Proofread'),
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Translate"),
                        "type" => $this->action->id == "translationOverview" ? "inverse" : null,
                        "icon" => "icon-globe" . ($this->action->id == "translationOverview" ? " icon-white" : null),
                        "url" => array("translationOverview", "id" => $model->{$model->tableSchema->primaryKey}),
                        "visible" => Yii::app()->user->checkAccess('Item.Translate'),
                    ));

                    ?>
                </div>
                <div class="btn-group">
                    <?php

                    if (in_array($model->qaState()->status, array("public"))) {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Unpublish"),
                            "icon" => "icon-thumbs-down",
                            "url" => array("unpublish", "id" => $model->{$model->tableSchema->primaryKey}),
                            "visible" => Yii::app()->user->checkAccess('Item.Publish'),
                        ));
                    } elseif ($model->qaStateBehavior()->validStatus('public')) {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Publish"),
                            "icon" => "icon-thumbs-up",
                            "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey}),
                            "visible" => Yii::app()->user->checkAccess('Item.Publish'),
                        ));
                    } else {
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Publish"),
                            "disabled" => true,
                            "icon" => "icon-thumbs-up",
                            "visible" => Yii::app()->user->checkAccess('Item.Publish'),
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
                        "url" => array("clone", "id" => $model->{$model->tableSchema->primaryKey}),
                        "visible" => Yii::app()->user->checkAccess('Item.Clone'),
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Remove"),
                        "type" => $this->action->id == "remove" ? "inverse" : null,
                        "icon" => "icon-eye-close" . ($this->action->id == "remove" ? " icon-white" : null),
                        "url" => array("remove", "id" => $model->{$model->tableSchema->primaryKey}),
                        "visible" => Yii::app()->user->checkAccess('Item.Remove'),
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Replace"),
                        "type" => $this->action->id == "replace" ? "inverse" : null,
                        "icon" => "icon-random" . ($this->action->id == "replace" ? " icon-white" : null),
                        "url" => array("replace", "id" => $model->{$model->tableSchema->primaryKey}),
                        "visible" => Yii::app()->user->checkAccess('Item.Replace'),
                    ));

                    ?>
                </div>
            </div>

        <?php elseif ($this->action->id != "preview" && $this->action->id != "view" && $this->action->id != "index"): ?>

            <div class="well well-small">
                <div class="row-fluid">
                    <div class="span4">
                        <h3>
                            <?php echo $this->workflowData["caption"]; ?>
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

        <?php if (!empty($requiredCounts) && $requiredCounts['remaining'] > 0): ?>
            <div class="required-counts">
                <div class="row-fluid">
                    <div class="span5 offset3">
                        <span class="missing">
                            <?php echo Yii::t('app', '* <em id="remaining-count">{remaining}</em> required fields missing.', array(
                                '{remaining}' => $requiredCounts['remaining'],
                            )); ?>
                        </span>
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('button', 'Next'),
                            'type' => TbHtml::BUTTON_COLOR_PRIMARY,
                            'url' => '#',
                            'htmlOptions' => array(
                                'id' => 'next-required',
                            ),
                        )); ?>
                    </div>
                    <!--
                    <div class="span4 text-right">
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('button', 'Translation Done'),
                        'type' => TbHtml::BUTTON_COLOR_DEFAULT,
                        'url' => '#',
                        'htmlOptions' => array(
                            'id' => 'translation-done',
                        ),
                    )); ?>
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('button', 'Cancel'),
                        'type' => TbHtml::BUTTON_COLOR_DEFAULT,
                        'url' => '#',
                        'htmlOptions' => array(
                            'id' => 'translation-cancel',
                        ),
                    )); ?>
                    </div>
                    -->
                </div>
            </div>

            <?php publishJs('/themes/frontend/js/flowbar-form-controls.js', CClientScript::POS_END); ?>
        <?php endif; ?>
    </div>
</div>