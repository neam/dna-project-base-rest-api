<?php
/* @var $this ChapterController */
?>

<?php
$steps = $model->flowSteps();
$stepCaptions = $model->flowStepCaptions();
?>

<?php

$targetStatus = $this->currentWorkflowTargetStatus();

foreach (array_merge($steps['draft'], $steps['preview'], $steps['public'], $steps['all']) as $step => $options) {
    $action = $targetStatus . ucfirst(isset($options['action']) ? $options['action'] : $step);
    $caption = $stepCaptions[$step];
    $targetStatusStepProgress = $model->calculateValidationProgress($targetStatus . "-step_" . $step);
    $stepProgress = $model->calculateValidationProgress("step_" . $step);
    $progress = $step == $targetStatus ? $targetStatusStepProgress : $stepProgress;
    $this->renderPartial("/_item/elements/_progress-item", compact("step", "caption", "options", "action", "model", "progress"));
}

?>

<?php /*
<div class="row-fluid">

    <div class="span12">

        <?php if ($this->action->id == "draft"): ?>
            <?php $publishingProgress = 100; ?>
            <?php $requiredFieldsMissing = "No"; ?>
        <?php endif; ?>

        <?php print $publishingProgress; ?>% Completed<br/>
        <?php print $requiredFieldsMissing; ?> required fields missing<br/>

        <!--
        Status: <?php $this->widget(
            'bootstrap.widgets.TbEditableField',
            array(
                'type' => 'select',
                'model' => $model->qaState(),
                'attribute' => 'status',
                'url' => $this->createUrl('/' . lcfirst($model->tableName()) . 'QaState/editableSaver'),
                'source' => array(
                    array("value" => null, "text" => "Empty"),
                    array("value" => "new", "text" => "New"),
                    array("value" => "draft", "text" => "Draft"),
                    array("value" => "preview", "text" => "Preview"),
                    array("value" => "public", "text" => "Public"),
                ),
            )
        ); ?>
        -->

    </div>
</div>

        */
?>
