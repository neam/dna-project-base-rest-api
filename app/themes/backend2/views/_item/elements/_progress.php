<?php
/* @var $this ChapterController */
/* @var $execution ezcWorkflowDatabaseExecution */
?>

<?php
var_dump($model->getAttributes(), $model->qaState()->getAttributes());
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
                'percent' => 0,
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
                'percent' => 60,
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
                'percent' => 60,
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
                'percent' => 60,
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

        X% Completed<br/>
        X required fields missing<br/>

        Status: DRAFT

    </div>
</div>