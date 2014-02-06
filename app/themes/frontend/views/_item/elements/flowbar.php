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
        if ($this->action->id == "edit"): ?>

            <?php $this->renderPartial('/_item/elements/_action-buttons', compact('model')); ?>

        <?php elseif ($this->action->id != "preview" && $this->action->id != "view" && $this->action->id != "browse"): ?>

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