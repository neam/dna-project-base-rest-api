<?php
/* @var Controller|ItemController $this */
/* @var ActiveRecord|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<div class="required-workflow">
    <div class="workflow-content">
        <div class="workflow-text">
            <h3 class="workflow-title">
                <?php echo $this->workflowData['caption']; ?>
            </h3>
        </div>
        <div class="workflow-missing">
            <?php // todo: move this somewhere else ?>
            <?php $validationScenario = $this->workflowData['validationScenario']; ?>
            <?php $invalidFields = $model->calculateInvalidFields($validationScenario); ?>
            <?php if ($invalidFields > 0): ?>
                <span class="missing-text"><?php echo Yii::t('model', '* {invalidFields} required missing', array('{invalidFields}' => $invalidFields)); ?></span>
                <?php $nextStep = $this->nextFlowStep("$validationScenario-", $model); ?>
                <?php if ($invalidFields > 0 && empty($nextStep)): ?>
                    <?php throw new CException("The item's validation rules for $validationScenario are out of sync. Make sure that the step-based validation rules match those of the overall $validationScenario validation scenarios"); ?>
                <?php endif; ?>
                <?php if ($_GET['step'] != $nextStep): ?>
                    <div class="btn-group">
                        <?php echo CHtml::submitButton(
                            Yii::t('model', 'Next'),
                            array(
                                'class' => 'btn btn-primary',
                                'name' => 'next-required',
                            )
                        ); ?>
                        <input type="hidden" name="next-required-url" value="<?php echo CHtml::encode(
                           Yii::app()->createUrl(
                               lcfirst($this->modelClass) . '/' . $this->action->id,
                               array('id' => $model->id, 'step' => $nextStep)
                           )
                       ); ?>">
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="workflow-actions">
            <div class="btn-group">
                <?php foreach ($this->workflowData["flagTriggerActions"] as $action): ?>
                    <?php if ($action["requiredProgress"] < 100): ?>
                        <?php $this->widget(
                            '\TbButton',
                            array(
                                'label' => $action['label'],
                                'disabled' => true,
                            )
                        ); ?>
                    <?php else: ?>
                        <?php $this->widget(
                            '\TbButton',
                            array(
                                'label' => $action['label'],
                                'color' => 'success',
                                'url' => array($action['action'], 'id' => $model->{$model->tableSchema->primaryKey})
                            )
                        ); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="btn-group">
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'Cancel'),
                        'url' => array('cancel', 'id' => $model->{$model->tableSchema->primaryKey})
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>