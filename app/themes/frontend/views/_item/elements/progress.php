<?php
/* @var $this ChapterController */
?>

<div class="row-fluid">
    <h2>Progress</h2>
</div>

<div class="row-fluid">
    <div class="span4">

        %

    </div>
    <div class="span8">

        Step

    </div>

</div>

<?php
$steps = $model->flowSteps();
$stepCaptions = $model->flowStepCaptions();
?>

<?php if ($this->action->id == "draft" || (strpos($this->action->id, "draft") !== false)):

    foreach ($steps['draft'] as $step => $options) {
        $action = 'draft' . ucfirst(isset($options['action']) ? $options['action'] : $step);
        $caption = $stepCaptions[$step];
        $this->renderPartial("/_item/elements/_progress-item", compact("step", "caption", "options", "action", "model"));
    }

elseif ($this->action->id == "prepPreview" || (strpos($this->action->id, "prepPreview") !== false)):

    foreach (array_merge($steps['draft'], $steps['preview']) as $step => $options) {
        $action = 'prepPreview' . ucfirst(isset($options['action']) ? $options['action'] : $step);
        $caption = $stepCaptions[$step];
        $this->renderPartial("/_item/elements/_progress-item", compact("step", "caption", "options", "action", "model"));
    }

elseif ($this->action->id == "prepPublish" || (strpos($this->action->id, "prepPublish") !== false)):

    foreach (array_merge($steps['draft'], $steps['preview'], $steps['public']) as $step => $options) {
        $action = 'prepPublish' . ucfirst(isset($options['action']) ? $options['action'] : $step);
        $caption = $stepCaptions[$step];
        $this->renderPartial("/_item/elements/_progress-item", compact("step", "caption", "options", "action", "model"));
    }

elseif ($this->action->id == "edit" || (strpos($this->action->id, "edit") !== false)):

    foreach (array_merge($steps['draft'], $steps['preview'], $steps['public'], $steps['all']) as $step => $options) {
        $action = 'edit' . ucfirst(isset($options['action']) ? $options['action'] : $step);
        $caption = $stepCaptions[$step];
        $this->renderPartial("/_item/elements/_progress-item", compact("step", "caption", "options", "action", "model"));
    }

endif;
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
