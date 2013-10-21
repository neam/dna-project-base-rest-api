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

<div class="row">
    <h2>Progress</h2>
</div>

<div class="row">
    <div class="span4">

        %

    </div>
    <div class="span8">

        Step

    </div>

</div>

<div class="row">
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
            "label" => Yii::t("crud", "Draft"),
            "type" => $this->action->id == "draft" ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-pencil",
            "url" => array("draft", "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>
<div class="row">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $model->qaState()->preview_validation_progress,
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("crud", "Prepare for preshow"),
            "type" => $this->action->id == "prepPreshow" ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-edit",
            "url" => array("prepPreshow", "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>
<div class="row">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $evaluationProgress,
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("crud", "Evaluate"),
            "type" => $this->action->id == "evaluate" ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-comment",
            "url" => array("evaluate", "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>
<div class="row">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $model->qaState()->public_validation_progress,
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Prepare for publishing"),
            "type" => $this->action->id == "prepPublish" ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-edit",
            "url" => array("prepPublish", "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>
<div class="row">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $model->qaState()->approval_progress,
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("crud", "Review"),
            "type" => $this->action->id == "review" ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-check",
            "url" => array("review", "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>
<div class="row">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $model->qaState()->proofing_progress,
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Proofread"),
            "type" => $this->action->id == "proofRead" ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-certificate",
            "url" => array("proofRead", "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>
<div class="row">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $translationProgress,
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Translate"),
            "type" => $this->action->id == "translate" ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-globe",
            "url" => array("translate", "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>
<div class="row">
    <div class="span4">

        <?php
        $this->widget(
            'bootstrap.widgets.TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $publishingProgress,
            )
        );
        ?>
    </div>
    <div class="span8">

        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Publish"),
            "type" => $this->action->id == "publish" ? "inverse" : null,
            "size" => "small",
            "icon" => "icon-thumbs-up",
            "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey})
        ));
        ?>

    </div>
</div>

<div class="row">

    <div class="span12">

        <hr>

        <?php print $publishingProgress; ?>% Completed<br/>
        <?php print $requiredFieldsMissing; ?> required fields missing<br/>

        Status: <?php print $model->qaState()->status; ?>

    </div>
</div>