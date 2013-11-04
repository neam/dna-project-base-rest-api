<?php
/* @var $this ChapterController */
/* @var $execution ezcWorkflowDatabaseExecution */
?>

<?php
//var_dump($model->getAttributes(), $model->qaState()->getAttributes());

$validationProgress = ($model->qaState()->draft_validation_progress + $model->qaState()->preview_validation_progress + $model->qaState()->public_validation_progress) / 3;
$evaluationProgress = 0; //($model->qaState()->draft_evaluation_progress + $model->qaState()->preview_evaluation_progress + $model->qaState()->public_evaluation_progress) / 3;
$publishingProgress = ($validationProgress + $evaluationProgress + $model->qaState()->approval_progress + $model->qaState()->proofing_progress) / 5;
$translationProgress = ($model->qaState()->translations_draft_validation_progress + $model->qaState()->translations_preview_validation_progress + $model->qaState()->translations_public_validation_progress + $model->qaState()->translations_approval_progress + $model->qaState()->translations_proofing_progress) / 5;

$requiredFieldsCount = count($model->qaStateBehavior()->qaAttributes("public"));
$requiredFieldsMissing = $requiredFieldsCount - round($requiredFieldsCount * $model->qaState()->public_validation_progress / 100);

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

<?php if ($this->action->id == "draft" || (strpos($this->action->id, "draft") !== false)): ?>

    <div class="row-fluid">
        <div class="span4">

            <?php
            $this->widget(
                'bootstrap.widgets.TbProgress',
                array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->qaState()->draft_validation_progress,
                )
            );
            ?>
        </div>
        <div class="span8">

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Title"),
                "type" => $this->action->id == "draftTitle" ? "inverse" : null,
                "size" => "small",
                "icon" => "icon-thumbs-up" . ($this->action->id == "draft" ? " icon-white" : null),
                "url" => array("draftTitle", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            ?>

        </div>
    </div>

<?php endif; ?>

<?php if ($this->action->id == "prepPublish" || (strpos($this->action->id, "prepPublish") !== false)): ?>

    <div class="row-fluid">
        <div class="span4">

            <?php
            $this->widget(
                'bootstrap.widgets.TbProgress',
                array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->calculateValidationProgress('step_title'),
                )
            );
            ?>
        </div>
        <div class="span8">

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Title"),
                "type" => $this->action->id == "prepPublishTitle" ? "inverse" : null,
                "size" => "small",
                "icon" => "icon-thumbs-up" . ($this->action->id == "draft" ? " icon-white" : null),
                "url" => array("prepPublishTitle", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            ?>

        </div>
    </div>

    <div class="row-fluid">
        <div class="span4">

            <?php
            $this->widget(
                'bootstrap.widgets.TbProgress',
                array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->calculateValidationProgress('step_thumbnail'),
                )
            );
            ?>
        </div>
        <div class="span8">

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Thumbnail"),
                "type" => $this->action->id == "prepPublishThumbnail" ? "inverse" : null,
                "size" => "small",
                "icon" => "icon-thumbs-up" . ($this->action->id == "publish" ? " icon-white" : null),
                "url" => array("prepPublishThumbnail", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            ?>

        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">

            <?php
            $this->widget(
                'bootstrap.widgets.TbProgress',
                array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->calculateValidationProgress('step_about'),
                )
            );
            ?>
        </div>
        <div class="span8">

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "About"),
                "type" => $this->action->id == "prepPublishAbout" ? "inverse" : null,
                "size" => "small",
                "icon" => "icon-thumbs-up" . ($this->action->id == "publish" ? " icon-white" : null),
                "url" => array("prepPublishAbout", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            ?>

        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">

            <?php
            $this->widget(
                'bootstrap.widgets.TbProgress',
                array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->calculateValidationProgress('step_teachers_guide'),
                )
            );
            ?>
        </div>
        <div class="span8">

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Teachers Guide"),
                "type" => $this->action->id == "prepPublishTeachersguide" ? "inverse" : null,
                "size" => "small",
                "icon" => "icon-thumbs-up" . ($this->action->id == "publish" ? " icon-white" : null),
                "url" => array("prepPublishTeachersguide", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            ?>

        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">

            <?php
            $this->widget(
                'bootstrap.widgets.TbProgress',
                array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->calculateValidationProgress('step_exercises'),
                )
            );
            ?>
        </div>
        <div class="span8">

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Exercise(s)"),
                "type" => $this->action->id == "prepPublishExercises" ? "inverse" : null,
                "size" => "small",
                "icon" => "icon-thumbs-up" . ($this->action->id == "publish" ? " icon-white" : null),
                "url" => array("prepPublishExercises", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            ?>

        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">

            <?php
            $this->widget(
                'bootstrap.widgets.TbProgress',
                array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->calculateValidationProgress('step_videos'),
                )
            );
            ?>
        </div>
        <div class="span8">

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Video"),
                "type" => $this->action->id == "prepPublishVideos" ? "inverse" : null,
                "size" => "small",
                "icon" => "icon-thumbs-up" . ($this->action->id == "publish" ? " icon-white" : null),
                "url" => array("prepPublishVideos", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            ?>

        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">

            <?php
            $this->widget(
                'bootstrap.widgets.TbProgress',
                array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->calculateValidationProgress('step_snapshots'),
                )
            );
            ?>
        </div>
        <div class="span8">

            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                "label" => Yii::t("model", "Snapshot(s)"),
                "type" => $this->action->id == "prepPublishSnapshots" ? "inverse" : null,
                "size" => "small",
                "icon" => "icon-thumbs-up" . ($this->action->id == "publish" ? " icon-white" : null),
                "url" => array("prepPublishSnapshots", "id" => $model->{$model->tableSchema->primaryKey})
            ));
            ?>

        </div>
    </div>
<?php endif; ?>

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
